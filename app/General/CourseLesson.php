<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 12/4/18
 * Time: 12:36 AM
 */

namespace App\General;


use App\Http\ViewComposers\Lessons;
use App\Models\Course;
use App\Models\CourseBusinessCategory;
use App\Models\CoursePeriod;
use App\Models\CourseProgress;
use App\Models\Lesson;
use App\Models\Library;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class CourseLesson {
	use CourseHandler, TrainingHandler;

//    public static function isCourseEnded($courseId, $lessonCount)
//    {
//        $courseCreationDate = self::getCourseStartedAt($courseId);
//        $coursePeriod = CourseLessonOperator::getCoursePeriodInMonths($lessonCount);
//        $courseEndDate = strtotime("{$courseCreationDate} + {$coursePeriod} months");
//        $today = strtotime("today");
//
//        return $today > $courseEndDate;
//    }
	public static function getCourseStartedAt( $courseId, $userId = null ) {
		$userId         = $userId ?? Auth::id();
		$courseProgress = CourseProgress::where( [
			[ 'course_id', $courseId ],
			[ 'user_id', $userId ]
		] )->select( 'created_at' )->first();

		return $courseProgress ? $courseProgress->created_at : null;
	}

	public static function getNoOfEligibleLessons( $courseId = null ) {
		$now       = Carbon::now();
		$startedAt = $courseId ? self::getCourseStartedAt( $courseId )
			: ( new CourseLesson() )->getTrainingStartedAt( Auth::id() );
		if ( ! $startedAt ) {
			return 0;
		}
		$monthDiff   = $startedAt->diffInMonths( $now );
		$noOfLessons = ( (int) ( $monthDiff / Auth::user()->lesson_duration ) ) + 1;

		return $noOfLessons;
	}

	public static function lessonCount( $courseId ) {
		return Lesson::where( 'course_id', $courseId )->count();
	}

	public static function getIncompleteLessons( $courseid ) {
		// Getting Lesson Progress report
		$progressReport = ( new Lessons )->LessonsWithCourseId( $courseid );
		$lessons        = $progressReport['lessons'];
		$incomplete     = [];
		foreach ( $lessons as $lesson ) {
			if ( ! $lesson->start || ! $lesson->video_progress || ! $lesson->assignment_progress ) {
				$incomplete[] = [ 'id' => $lesson->id, 'title' => $lesson->title ];
			}
		}

		return [
			"incomplete"               => $incomplete,
			"courseAssignmentProgress" => $progressReport['courseAssignmentProgress']
		];
	}

	public static function getAllUserLessons() {
		return Lesson::join( 'courses', 'courses.id', 'lessons.course_id' )
		             ->join( 'courses_progress', 'courses_progress.course_id', 'courses.id' )
		             ->where( 'courses_progress.user_id', Auth::id() )
		             ->select( 'lessons.id as lesson_id', 'courses.id as course_id' )->get();
	}

	public static function daysKeepReport( $user = null ) {
		$user = $user ?? Auth::user();
		//Get get all lessons of current user in all courses
		$noOfDays = $user->getUserPeriodInDays();
		//No of days payed payed
		$totalPayments = Payment::where( 'user_id', $user->id )->sum( 'amount' );

		if ( $user->isEmployeeFirst() ) {
			$noOfdaysPayed = 0;
		} else {
			$noOfdaysPayed = floor($totalPayments / $user->pennywise);
		}

		return [
			'totalPayments' => $totalPayments,
			'noOfDays'      => $noOfDays,
			'noOfdaysPayed' => $noOfdaysPayed
		];
	}

	/**
	 * Gets all subscribed courses and progress report of a user
	 * @return array
	 */
	public static function SubscribedCoursesAndProgress( $UserId ) {
		$userHandler = new UserHandler( $UserId );

		$subscribedCourses = $userHandler->allLessonCourseQuery()
		                                 ->leftJoin( 'lessons_progress', function ( $join ) use ( $UserId ) {
			                                 $join->on( 'lessons_progress.lesson_id', 'lessons.id' )
			                                      ->where( 'lessons_progress.user_id', $UserId );
		                                 } )
		                                 ->select( 'courses.url', 'courses.title', 'courses_progress.completed',
			                                 'courses_progress.assignment as course_assignment', 'courses_progress.id as courses_progress_id',
			                                 'courses.id', 'lessons.id as lesson_id', 'lessons_progress.start',
			                                 'lessons_progress.video', 'lessons_progress.assignment as lesson_assignment' )
		                                 ->get();

		$subscribedCoursesArr = [];
		/**
		 * For completion percentage calculation,
		 * Lessons have 3 points each.
		 * final training action step has 2 points
		 * complete project has 1 point
		 */
		$courseIdCheck = null;
		$i             = 0;
		foreach ( $subscribedCourses as $u ) {
			if ( $courseIdCheck !== $u->id ) {
				$subscribedCoursesArr[ $i ] = (object) [
					'id'              => $u->id,
					'url'             => $u->url,
					'title'           => $u->title,
					'completed'       => $u->completed,
					'points'          => $u->course_assignment * 2,
					'no_lessons'      => null,
					'isCourseStarted' => $u->courses_progress_id ? true : false,
				];
				$i ++;
			}

			//Calculate total lesson points nd number of lessons
			$subscribedCoursesArr[ $i - 1 ]->points     += $u->start + $u->video + $u->lesson_assignment;
			$subscribedCoursesArr[ $i - 1 ]->no_lessons = $u->lesson_id ? $subscribedCoursesArr[ $i - 1 ]->no_lessons + 1
				: $subscribedCoursesArr[ $i - 1 ]->no_lessons;
			$courseIdCheck                              = $u->id;
		}
		/**
		 * Calculate percentage
		 */
		foreach ( $subscribedCoursesArr as $u ) {
			$percentage    = $u->completed ??
			                 $u->points / ( ( $u->no_lessons * 3 ) + 3 );
			$u->percentage = (int) ( $percentage * 100 );
			$u->color      = $u->percentage >= 50 ? 'green' : '#dd7532';
		}

		return $subscribedCoursesArr;
	}

	public static function getVideoEmbedUrl( $videoId ) {
		return 'https://www.youtube.com/embed/' . $videoId;
	}

	public static function getCourseValidation() {
		return [
			'title'               => 'required|max:255',
			'business_category'   => 'required|array',
			'business_category.*' => 'exists:business_categories,id',
			'note'                => 'required_without:video',
			'video_id'            => 'required_without:note',
			'video'               => 'required_without:note',
			'materials'           => 'sometimes',
			'action_step_note'    => 'sometimes',
			'period'              => 'required|array',
			'period.*'            => Rule::in( ( new CourseLesson() )->period ),
		];
	}

	private function prepareCourseRequest( Request $request ) {
		if ( $request->video ) {
			$request->video = CourseLesson::getVideoEmbedUrl( $request->video_id );
		}
		/**
		 * File upload
		 */
		//For Cover Image
		if ( $request->hasFile( 'cover_image' ) ) {
			//Check file exist and get unique filename
			$uniqueFileName = General::FileName( $request->cover_image, 'public', 'cover_images' );
			$request->image = $request->file( 'cover_image' )->storeAs(
				'cover_images', $uniqueFileName, 'public'
			);
		}

		if ( $request->hasFile( 'action_step_file' ) ) {
			$uniqueFileName      = General::FileName( $request->action_step_file, 'local', 'assignments' );
			$request->assignment = $request->file( 'action_step_file' )->storeAs(
				'assignments', $uniqueFileName, 'local'
			);
		}

		return $request;
	}

	public function CreateCourse( Request $request ) {
		$request = $this->prepareCourseRequest( $request );

		$url = General::UrlSlug( $request->title );

		//Insert into Course table
		$course = Course::create( [
			'users_id'        => Auth::user()->id,
			'title'           => $request->title,
			'start_date'      => $request->start_date,
			'note'            => $request->note ?? null,
			'cover_image'     => $request->image,
			'video'           => $request->video ?? null,
			'assignment_note' => $request->action_step_note ?? null,
			'assignment_doc'  => $request->assignment ?? null,
			'url'             => $url
		] );

		return $this->updateCourseCategoryAndLibrary( $request, $course );
	}

	public function EditCourse( Request $request ) {
		$request = $this->prepareCourseRequest( $request );

		//Update Course table
		$course             = Course::where( 'id', $request->id )->first();
		$course->title      = $request->title;
		$course->start_date = $request->start_date;
		$course->note       = $request->note ?? null;
		if ( $request->hasFile( 'cover_image' ) ) {
			$course->cover_image = $request->image;
		}
		$course->video           = $request->video ?? null;
		$course->assignment_note = $request->action_step_note ?? null;
		if ( $request->hasFile( 'action_step_file' ) ) {
			$course->assignment_doc = $request->assignment ?? null;
		}
		$course->save();

		//Course business Category
		CourseBusinessCategory::where( 'course_id', $course->id )->delete();
		CoursePeriod::where( 'course_id', $course->id )->delete();

		return $this->updateCourseCategoryAndLibrary( $request, $course );
	}

	private function updateCourseCategoryAndLibrary( Request $request, Course $course ) {
		//For course Materials
		if ( $request->hasFile( 'materials' ) ) {
			foreach ( $request->materials as $material ) {
				$uniqueFileName  = General::FileName( $material, 'local', 'library' );
				$materialName    = $material->storeAs(
					'library', $uniqueFileName, 'local'
				);
				$materialNames[] = $materialName;
			}
		}
		//Save in Course Business Category table
		foreach ( $request->business_category as $value ) {
			$businessCategories[] = new CourseBusinessCategory( [
				'business_category_id' => $value
			] );
		}

		$course->BusinessCategories()->saveMany( $businessCategories );

		//Save in Course Period table
		foreach ( $request->period as $value ) {
			$period[] = new CoursePeriod( [
				'period' => $value
			] );
		}
		$course->Period()->saveMany( $period );

		//Save in library table
		if ( $request->hasFile( 'materials' ) ) {
			foreach ( $materialNames as $singleMaterial ) {
				$library[] = new Library( [
					'user_id'   => Auth::user()->id,
					'lesson_id' => null,
					'file'      => $singleMaterial
				] );
			}
			$course->libraries()->saveMany( $library );
		}

		return response()->json( [ "message" => "successful" ], 201 );
	}
}