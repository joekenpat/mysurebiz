<?php

namespace App\Http\Controllers;

use App\General\General;
use App\Models\Assignment;
use App\Models\BusinessCategory;
use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AssignmentController extends Controller
{
    public function index($business_category_id)
    {
        $courses = Assignment::join('courses', 'courses.id', 'assignments.course_id')
            ->leftJoin('lessons', 'assignments.lesson_id', 'lessons.id')
            ->join('course_business_categories', 'course_business_categories.course_id',
                'assignments.course_id')
            ->where('course_business_categories.business_category_id', $business_category_id)
            ->select('courses.id', 'courses.title', 'assignments.score', 'assignments.user_id',
                'lessons.id as lesson_id', 'lessons.title as lesson_title')
            ->get();
        $onlyCourses = $courses->unique('id');
        return view('assignments', [
            'courses' => $courses,
            'type' => ucfirst(BusinessCategory::where('id', $business_category_id)->firstOrFail()->name),
            'onlyCourses' => $onlyCourses]);
    }

    public function AssignmentPage(Request $request, $category, $id)
    {
        $isScored = $request->scored;
        if(strtolower($category) == "course"){
            $course = Course::where('id', $id)
                    ->select('id', 'title')
                    ->firstOrFail();
            $assignments = Assignment::where('assignments.course_id', $course->id)
                    ->leftJoin('users', 'assignments.user_id', 'users.id')
                    ->whereNull('assignments.lesson_id')
                    ->when($isScored, function ($query) {
                        return $query->whereNotNull('assignments.score');
                    })
                    ->when($isScored === 0, function ($query) {
                        return $query->whereNull('assignments.score');
                    })
                    ->select('users.email', 'assignments.id', 'assignments.score',
                        'assignments.file', 'assignments.user_id')
                    ->paginate(10);
        }elseif (strtolower($category) == "lesson"){
            $lesson = Lesson::where('id', $id)
                ->select('id', 'title')
                ->firstOrFail();
            $assignments = Assignment::where('assignments.lesson_id', $lesson->id)
                ->leftJoin('users', 'assignments.user_id', 'users.id')
                ->when($isScored, function ($query) {
                    return $query->whereNotNull('assignments.score');
                })
                ->when($isScored == 0, function ($query) {
                    return $query->whereNull('assignments.score');
                })
                ->select('users.email', 'assignments.id', 'assignments.score',
                    'assignments.file', 'assignments.user_id')
                ->paginate(10);
        }else{
            abort(404);
        }
//        dd($assignments);
        return view('assignment-page', [
            'type' => ucwords($category),
            'assignments' => $assignments,
            'value' => $course ?? $lesson
        ]);
    }

    public function AssignmentFile($path)
    {
        $fileExists = Storage::disk('local')->exists($path);
        if($fileExists){
            return Storage::disk('local')->download($path);
        }
        abort(404);
    }

    public function ScoreAssignment(Request $request)
    {
            $allAssignmentIds = collect($request->id);
            $allScores = $allAssignmentIds->combine($request->score);

            foreach ($allScores as $id => $score){
                Assignment::where('id', $id)->update([
                    'score' => $score
                ]);
            }
            return response()->json(['message' => 'Ok']);
    }
}
