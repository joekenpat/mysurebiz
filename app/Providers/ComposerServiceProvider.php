<?php

namespace App\Providers;

use App\Models\BusinessCategory;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //bind business categories to registration views
        View::composer(
            ['front-end.student.register', 'front-end.artisan.register', 'editcourse', 'addlibrary',
	            'front-end.employee.register','addcourse', 'layouts.template', 'dashboard', 'sendemail'],
            'App\Http\ViewComposers\BusCatPeriod'
        );


        View::composer(
            ['users.finalproject', 'users.lesson', 'users.incompletelessons',
                'users.complete-course', 'users.course'],
            'App\Http\ViewComposers\Lessons'
        );

        View::composer(
            ['layouts.sidebarcontents', 'users.change-password', 'users.partials.course-card',
                'users.dashboard', 'users.library', 'users.courses', 'users.payment-report',
                'users.payment', 'users.course', 'users.payment-response'],
            'App\Http\ViewComposers\SubscribedCourseReport'
        );
//Look into
        View::composer(
            'layouts.template',
            'App\Http\ViewComposers\AdminNotifications'
        );

        View::composer(
            'notifications',
            'App\Http\ViewComposers\AdminNotifications@NotificationsView'
        );

        //Users views
        View::composer(
            'layouts.userstemplate',
            'App\Http\ViewComposers\UserNotifications'
        );

        View::composer(
            ['users.notifications'],
            'App\Http\ViewComposers\UserNotifications@NotificationsView'
        );
	    View::composer(
		    ['layouts.userstemplate', 'users.messages'],
		    'App\Http\ViewComposers\UserMessages@MessagesView'
	    );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
