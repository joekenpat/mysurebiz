<?php

namespace App\Http\Controllers;

use App\General\CourseLesson;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\Lesson;
use Illuminate\Support\Facades\Storage;
use App\General\General;
use App\Models\Library;
use Auth;

class ManageLessonsController extends Controller
{
    //Deleting Lessons

    public function Delete(Request $request)
    {
        $lesson = Lesson::findOrFail($request->id);

        if($lesson->assignment_doc){
            Storage::disk('local')->delete($lesson->assignment_doc);
        }

        //Delete libraries

        $libraries = $lesson->libraries;

        foreach ($libraries as $library){
            if($library->file){
                Storage::disk('local')->delete($library->file);
            }
            $library->delete();
        }
        //finally delete lesson
        $lesson->delete();

        return response()->json(['message'=> 'successful'], 201);
    }

    public function DeleteAssignment(Request $request)
    {
        $lesson = Lesson::where('id', $request->id)->first();
        Storage::disk('local')->delete($lesson->assignment_doc);
        $lesson->assignment_doc = null;
        $lesson->save();
    }

    public function Update(Request $request)
    {

        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'course' => 'required',
            'video_id' => 'required_without:note',
            'video' => 'required_without:note',
            'note' => 'required_without:video',
            'materials'=> 'sometimes',
            'action_step_note' => 'sometimes',
            'action_step_file' => 'sometimes'
        ]);

	    if($request->video){
		    $request->video = CourseLesson::getVideoEmbedUrl($request->video_id);
	    }
        //file Uploads

        //file Uploads
        $courseAudience = Course::where('id', $request->course)->firstOrFail();

        //For course Materials

        if ($request->hasFile('materials')) {
            foreach($request->materials as $material){
                $uniqueFileName = General::FileName($material, 'local', 'library');
                $materialName = $material->storeAs(
                    'library', $uniqueFileName, 'local'
                );
//                $materialName = explode("/", $path)[2];
                $materialNames[] = $materialName;
            }
        }

        if ($request->hasFile('action_step_file')) {
            $uniqueFileName = General::FileName($request->action_step_file, 'local', 'assignments');
            $assignment = $request->file('action_step_file')->storeAs(
                'assignments', $uniqueFileName, 'local'
            );
        }

        //Update Lesson table

        $lesson = Lesson::where('id', $request->id)->first();
        $lesson->title = $request->title;
        $lesson->course_id = $request->course;
        $lesson->note = $request->note ?? null;
        $lesson->video = $request->video ?? null;
        $lesson->assignment_note = $request->action_step_note ?? null;
        if ($request->hasFile('action_step_file')) {
            $lesson->assignment_doc = $assignment ?? null;
        }
        $lesson->save();
        //Insert into Library table
        if($request->hasFile('materials')){
            foreach ($materialNames as $singleMaterial){
                Library::create([
                    'user_id' => Auth::user()->id,
                    'course_id' => $request->course,
                    'lesson_id' => $lesson->id,
                    'file' => $singleMaterial
                ]);
            }
        }
    }
}
