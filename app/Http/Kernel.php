<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
     * @var array
     */
    protected $middleware = [
        \App\Http\Middleware\CheckForMaintenanceMode::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
        \App\Http\Middleware\TrustProxies::class,
    ];

    /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
            'throttle:60,1',
            'bindings',
        ],
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'AdminAuth' => \App\Http\Middleware\AdminAuthentication::class,
        'fileauth' => \App\Http\Middleware\FileAccessAuthentication::class,
        'users' => \App\Http\Middleware\UsersAuthentication::class,
        'notcommenced' => \App\Http\Middleware\NotCommencedUsers::class,
        'coursesubscription' => \App\Http\Middleware\CourseSubscription::class,
        'usercoursecategory' => \App\Http\Middleware\UserCourseCategory::class,
        'lessonperiodcheck' => \App\Http\Middleware\LessonPeriodCheck::class,
        'message' => \App\Http\Middleware\Message::class,
        'previouslessoncompletion' => \App\Http\Middleware\PreviousLessonCompletion::class,
        'ensureEmployees' => \App\Http\Middleware\ensureEmployees::class,
        'ensureEmployeesPennywiseNotSet' => \App\Http\Middleware\ensureEmployeesPennywiseNotSet::class,
        'ensureEmployeesPennywiseSet' => \App\Http\Middleware\ensureEmployeesPennywiseSet::class,
//        'employeeauth' => \App\Http\Middleware\EmployeesAuthentication::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'bindings' => \Illuminate\Routing\Middleware\SubstituteBindings::class,
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
    ];
}
