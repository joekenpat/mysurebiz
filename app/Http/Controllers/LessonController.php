<?php

namespace App\Http\Controllers;

use App\General\CourseLesson;
use Illuminate\Http\Request;
use App\General\General;
use App\Models\Lesson;
use App\Models\Library;
use App\Models\Course;
use Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class LessonController extends Controller
{
    public function AddLesson()
    {
        $courses = Course::select('id','title')->get();
        return view('addlesson', ['courses' => $courses]);
    }

    public function CreateLesson(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'course' => 'required|exists:courses,id',
            'video_id' => 'required_without:note',
            'note' => 'required_without:video',
            'materials'=> 'sometimes',
            'action_step_note' => 'sometimes',
            'action_step_file' => 'sometimes'
        ]);

	    if($request->video){
		    $request->video = CourseLesson::getVideoEmbedUrl($request->video_id);
	    }

        //file Uploads

        //For course Materials

        if ($request->hasFile('materials')) {
            foreach($request->materials as $material){
                $uniqueFileName = General::FileName($material, 'local', 'library');
                $materialName = $material->storeAs(
                   'library', $uniqueFileName, 'local'
                );
                $materialNames[] = $materialName;
            }
        }

        if ($request->hasFile('action_step_file')) {
            $uniqueFileName = General::FileName($request->action_step_file, 'local', 'assignments');
            $assignment = $request->file('action_step_file')->storeAs(
                'assignments', $uniqueFileName, 'local'
            );
        }
        //Insert into Lesson table
        $LessonId = Lesson::create([
            'users_id' => Auth::user()->id,
            'course_id' => $request->course,
            'title' => $request->title,
            'note' => $request->note ?? null,
            'video' => $request->video ?? null,
            'assignment_note' => $request->action_step_note ?? null,
            'assignment_doc' => $assignment ?? null
        ])->id;

        //Insert into Library table
        if($request->hasFile('materials')){
            foreach ($materialNames as $singleMaterial){
                Library::create([
                    'user_id' => Auth::user()->id,
                    'course_id' => $request->course,
                    'lesson_id' => $LessonId,
                    'file' => $singleMaterial
                ]);
            }
        }
    }
    public function ViewLessonAdmin($id)
    {
        $lesson = DB::table('lessons')
            ->leftJoin('users', 'lessons.users_id', '=', 'users.id')
            ->where('lessons.id', $id)
            ->select('lessons.*', 'users.first_name', 'users.last_name', 'users.id as users_id')
            ->first();

        $size = Storage::disk('local')->size($lesson->assignment_doc);
        $lesson->assignment_doc_size = General::humanFileSize($size);

//        Fetch other lessons
        $otherLessons = Lesson::where([ ['course_id', $lesson->course_id], ['id', '!=', $lesson->id] ])->get();

        $course = Course::where('id', $lesson->course_id)->first();

        $libraries = Library::where('lesson_id', $lesson->id)->get();

        foreach ($libraries as $library){
            $size = Storage::disk('local')->size($library->file);
            $library['file_size'] = General::humanFileSize($size);
        }
        return view('single_lesson_page', ['course' => $course,
            'lesson' => $lesson,
            'libraries' => $libraries,
            'otherLessons' => $otherLessons]);

    }
    public function Edit($id)
    {
        $lesson = Lesson::where('id', $id)->first();
        if(!$lesson){
            abort(404);
        }

        $currentCourseId = $lesson->course()->first()->id;
        $courses = Course::all();
        $libraries = Library::where(['lesson_id' => $id])->get();
        return view('editlesson', ['lesson' => $lesson, 'libraries' => $libraries,
            'currentCourseId' => $currentCourseId, 'courses' => $courses]);
    }
}
