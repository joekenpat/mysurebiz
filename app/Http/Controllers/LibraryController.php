<?php

namespace App\Http\Controllers;

use App\General\FetchModel;
use App\General\General;
use App\Models\Library;
use App\Models\LibraryBusinessCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Auth;
use Illuminate\Support\Facades\DB;

class LibraryController extends Controller
{
    public function index(Request $request)
    {
        //For post requests

        if($request->isMethod('post')){

            $searchValues = preg_split('/\s+/', $request->searchQuery, -1, PREG_SPLIT_NO_EMPTY);
            $libraries = Library::where(function ($q) use ($searchValues) {
                foreach ($searchValues as $value) {
                    $q->orWhere('file', 'like', "%{$value}%");
                }
            })->leftJoin('courses', 'library.course_id', 'courses.id')
                ->leftJoin('lessons', 'lessons.id', 'library.lesson_id')
                ->select('courses.id as course_id',
                    'courses.title', 'library.file', 'library.id as library_id',
                    'lessons.title as lesson_title', 'lessons.id as lesson_id')
                ->get();
        }else{
            $libraries = db::table('library')
                ->leftJoin('courses', 'library.course_id', 'courses.id')
                ->leftJoin('lessons', 'lessons.id', 'library.lesson_id')
//                ->leftJoin('course_business_categories', 'courses.id',
//                    'course_business_categories.course_id')
//                ->leftJoin('library_business_categories', 'library.id',
//                    'library_business_categories.library_id')
                ->select('courses.id as course_id',
                    'courses.title', 'library.file', 'library.id as library_id',
                    'lessons.title as lesson_title', 'lessons.id as lesson_id')
                ->get();
        }

        $allCategoriesCourse = FetchModel::GetCourseCategories();
        $allCategoriesLibrary = FetchModel::GetLibraryCategories();

        // For Non post requests
        $uniqueCourses = $libraries->filter(function($value){
            return $value->course_id != null;
        })->unique('course_id');

        //All libraries not attached to any course
        $generalLibrary = $libraries->filter(function($value){
            return $value->course_id == null && $value->lesson_id == null;
        });

        //all unique courses and general library
        $uniqueLibrary = $uniqueCourses->concat($generalLibrary);

        //Unique lessons
        $uniqueLessons = $libraries->filter(function($value){
            return $value->lesson_id != null;
        })->unique('lesson_id');

        return view('library', [
            'allCategoriesCourse' => $allCategoriesCourse,
            'allCategoriesLibrary' => $allCategoriesLibrary,
            'uniqueLibrary' => $uniqueLibrary,
            'libraries'=> $libraries,
//            'uniqueLibrary' => $uniqueLibrary,
            'uniqueLessons' => $uniqueLessons,
            'generalLibrary' => $generalLibrary,
            'title' => 'Library'
        ]);
    }

    private function fileDownload($path)
    {
        $fileExists = Storage::disk('local')->exists($path);
        if($fileExists){
            return Storage::disk('local')->download($path);
        }
        abort(404);
    }

    public function FileHandler($path)
    {
        return $this->fileDownload($path);
    }

//    public function ArtisansFiles($path)
//    {
//        return $this->fileDownload('artisans/'.$path);
//    }
//    public function EmployeesFiles($path)
//    {
//        return $this->fileDownload('employees/'.$path);
//    }

    public function Delete(Request $request)
    {
        $request->validate([
            'id' => 'required'
        ]);

        $library = Library::where('id', $request->id)->firstOrFail();
        Storage::disk('local')->delete($library->file);
        $library->delete();
    }

    public function AddLibrary(Request $request)
    {
        Return view('addlibrary');
    }

    public function Create(Request $request)
    {
        $request->validate([
            'business_category' => 'required|array',
            'business_category.*' => 'exists:business_categories,id',
            'materials'=> 'required'
        ]);

        //file Uploads
//        $storagePath = General::getFilePath($request->audience);
        //For course Materials

        if ($request->hasFile('materials')) {

            //Upload and save library
            foreach($request->materials as $material){
                $uniqueFileName = General::FileName($material, 'local', '/library');
                $materialName = $material->storeAs('/library', $uniqueFileName, 'local');
                //Insert into Library table

                $library = Library::create([
                    'user_id' => Auth::user()->id,
                    'file' => $materialName
                ]);

                //Save in Library business Categories
                $library->BusinessCategories()->saveMany(
                    self::BusinessCategories($request->business_category)
                );
            }
        }

    }

    private function BusinessCategories($business_category)
    {
        foreach ($business_category as $value){
            $businessCategories[] = new LibraryBusinessCategory([
                'business_category_id' => $value
            ]);
        }
        return $businessCategories;
    }
}
