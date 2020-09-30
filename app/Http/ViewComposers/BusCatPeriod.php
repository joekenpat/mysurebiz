<?php
/**
 * Created by PhpStorm.
 * User: manchidede
 * Date: 4/29/19
 * Time: 2:15 PM
 */

namespace App\Http\ViewComposers;


use App\General\CourseHandler;
use App\Models\BusinessCategory;
use Illuminate\View\View;

class BusCatPeriod {
	use CourseHandler;

	public function compose(View $view)
	{
		$businessCategories = BusinessCategory::select('id', 'name')->get();
		return $view->with([
			'businessCategories' => $businessCategories,
			'period' => $this->period
		]);
	}
}