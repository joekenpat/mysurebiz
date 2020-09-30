<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 12/10/18
 * Time: 10:22 PM
 */

namespace App\General;


use App\Models\CourseBusinessCategory;
use App\Models\LibraryBusinessCategory;

class FetchModel
{
    public static function GetCourseCategories()
    {
        return CourseBusinessCategory::
                join('business_categories', 'business_categories.id',
                    'course_business_categories.business_category_id')
                ->select('course_business_categories.course_id', 'business_categories.name')
                ->get();
    }

    public static function GetLibraryCategories()
    {
        return LibraryBusinessCategory::
            join('business_categories', 'business_categories.id',
                'library_business_categories.business_category_id')
            ->select('library_business_categories.library_id', 'business_categories.name')
            ->get();
    }
}