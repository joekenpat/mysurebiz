<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 5/7/19
 * Time: 11:14 AM
 */

namespace App\General;


use App\Models\Library;
use Illuminate\Support\Facades\Storage;

class LibraryHandler {

	public function getCourseLibraries($courseId)
	{
		return Library::where([['course_id', $courseId], ['lesson_id', null]])->get();
	}

	public function getLessonLibraries($lessonId)
	{
		$libraries = Library::where('lesson_id', $lessonId)->get();
		foreach ($libraries as $library){
			$library['file_size'] = $this->getFileSize($library->file);
		}
		return $libraries;
	}

	public function getFileSize($file)
	{
		$size = Storage::disk('local')->size($file);
		return General::humanFileSize($size);
	}
}