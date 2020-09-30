<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\User;
use Auth;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

	    /**
	     * Paginate a standard Laravel Collection.
	     *
	     * @param int $perPage
	     * @param int $total
	     * @param int $page
	     * @param string $pageName
	     * @return array
	     */
	    Collection::macro('paginate', function($perPage, $total = null, $page = null, $pageName = 'page') {
		    $page = $page ?: LengthAwarePaginator::resolveCurrentPage($pageName);
		    return new LengthAwarePaginator(
			    $this->forPage($page, $perPage),
			    $total ?: $this->count(),
			    $perPage,
			    $page,
			    [
				    'path' => LengthAwarePaginator::resolveCurrentPath(),
				    'pageName' => $pageName,
			    ]
		    );
	    });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('*', function ($view){
            if(Auth::check()){
                $viewName = $view->getName();
            if ($viewName != 'login' && $viewName != 'storage.*') {
                $user = Auth::User()->select('first_name', 'last_name', 'role', 'image')->where('id', Auth::id())->first();
                $view->with('user', $user);
            }
            }

        });
    }
}
