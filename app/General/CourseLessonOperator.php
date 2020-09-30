<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 12/3/18
 * Time: 1:47 PM
 */

namespace App\General;


use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class CourseLessonOperator
{
    public static function getCoursePeriodInMonths($lessonCount){
        return (($lessonCount) * Auth::user()->lesson_duration);
    }
    public static function getCoursePeriodInDays($courseId, $lessonCount){
        $coursePeriodInMonths = self::getCoursePeriodInMonths($lessonCount);

        $courseStartDate = CourseLesson::getCourseStartedAt($courseId);
        $courseEndDate = (new Carbon($courseStartDate))->addMonths($coursePeriodInMonths);
        return $courseStartDate->diffInDays($courseEndDate);
    }
    public static function CourseDuration($lessonCount)
    {
        $period = self::getCoursePeriodInMonths($lessonCount);
        $month = $period % 12;
        $monthAbbrev = ($month == 1)?" month":(($month > 1)?" months":"");
        $year = (int) ($period/12);
        $yearAbbrev = ($month == 1)?" year":(($month > 1)?" years":"");
        $year = ($year ? ($year.$yearAbbrev) : "");
        $month = ($month?($month.$monthAbbrev):"");
        return $year.$month;
    }
}