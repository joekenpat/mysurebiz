<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 10/31/18
 * Time: 10:36 AM
 */

namespace App\Http\ViewComposers;


use App\General\CourseLesson;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SubscribedCourseReport {

	public function compose( View $view ) {
		$arr = ["isLoggedIn" => Auth::check()];

		if ( ! Auth::check() ) {
			$view->with($arr);
			return;
		}

		$subscribedCoursesArr = isset( $view->getData()['subscribedCoursesArr'] ) ?
			$view->getData()['subscribedCoursesArr'] :
			CourseLesson::SubscribedCoursesAndProgress( Auth::id() );
		$view->with( array_merge([
			'subscribedCourses' => $subscribedCoursesArr
		], $arr) );
	}
}