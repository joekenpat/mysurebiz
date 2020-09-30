<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

//Front end routes
Route::match(['post', 'get'], '{type}/register/{ref_by?}',
    'Auth\RegistrationController@index')->name('reg');

Route::get('/{refcode}/verify/{code}', 'Auth\RegistrationController@VerifyUser')
    ->name('verify');

Route::get(
	'ebook_cover_images/{file_name}', 'ebook\EbookController@GetCoverImage'
);

//Frontend route ends

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Auth::routes();

Route::get('register', function () {
    return redirect()->route('login');
});

//Route::get('/home', 'HomeController@index')->name('home');

Route::match(['post', 'get'], 'login', 'LoginController@index')->name('login');

Route::post('resend-verification-email', 'LoginController@ResendEmailVerification')->name('resend-verification');

//File restriction routes

Route::group(['middleware' => ['auth', 'fileauth']], function () {
    Route::get('files/{any}', 'LibraryController@FileHandler')->where('any', '.*')->name('libraryfile');
});

/**
 * Ebook
 */
Route::get('ebooks', 'ebook\EbookController@GetAll')->name('ebooks');
Route::get('ebooks/{ebook_id}', 'ebook\EbookController@Get')->name('ebook');
Route::get('ebooks/{ebook_id}/checkout', 'ebook\EbookController@Checkout')->name('ebook-checkout');
Route::post('/ebook/pay', 'ebook\EbookSalesController@Initialize')->name('ebook-initialize');
Route::post('/ebook/pay/callback', 'ebook\EbookSalesController@Callback')->name('ebook-callback');
Route::view('/ebook/payment/response', 'ebook.payment-response')->name('ebook-payment-response');
Route::match(['post','get'],'/ebook/{ebook_id}/resend', 'ebook\EbookController@Resend')->name('ebook-resend');

/**
 * Ebook Ends here
 */

Route::group(['middleware' => 'AdminAuth'], function(){

    Route::group(['prefix' => 'admin'], function(){

    Route::post('ebooks/create', 'ebook\EbookController@Create')->name('create-ebook');
    Route::get('ebooks/create', 'ebook\EbookController@GetCreate')->name('get-create-ebook');
    Route::match(['post','get'],'ebooks/{id}/edit', 'ebook\EbookController@Edit')->name('ebook-edit');
    Route::match(['get','post'],'ebooks', 'ebook\AdminEbookController@GetAll')->name('admin-ebooks');
    Route::delete('ebooks', 'ebook\AdminEbookController@Manage')->name('manage-ebooks');
    Route::match(['post', 'get'],'ebooks/sales', 'ebook\EbookSalesController@GetAll')->name('ebook-sales');

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/addcourse', 'CourseController@AddCourse')->name('addcourse');
    Route::get('/addlesson', 'LessonController@AddLesson')->name('addlesson');
    Route::match(['post', 'get'], '/welcome_note/edit', 'WelcomeNoteController@Edit')->name('edit-welcome-note');
    Route::get('courses/{business_category_id}', 'ManageCoursesController@index')->name('courses');
    Route::get('course/{id}', 'CourseController@ViewCourseAdmin')->name('course-page');
    Route::get('course/{id}/edit', 'CourseController@Edit')->name('course-edit');
    Route::get('lesson/{id}', 'LessonController@ViewLessonAdmin')->name('lesson-page');
    Route::get('lesson/{id}/edit', 'LessonController@Edit')->name('lesson-edit');
    Route::get('user/{id}', 'UserController@index')->name('user-page');
    Route::match(['get', 'post'],'manage-account/{type?}', 'ManageAccountController@Index')->name('manage-account');
    Route::post('manage-account-by-type', 'ManageAccountController@searchByType')->name('mg-type');
    Route::get('phone-numbers/{type}/{status}', 'ManageAccountController@getPhoneNumbers')->name('get-numbers');
    Route::get('phone-numbers-batch/{type}/{batch_id}', 'ManageAccountController@getPhoneNumbersByBatch')->name('get-numbers-by-batch');
    Route::get('courses/{courseCategory}/{status}/{courseId}', 'ManageCoursesController@UsersCompletedProgressCourse')->name('courses/{$courseCategory}/{$status}/{courseId}');
    Route::match(['get', 'post'], 'library', 'LibraryController@index')->name('library');
    Route::get('messages', 'MessagesController@index')->name('adminmessages');
    Route::match(['get', 'post'], 'sendemail', 'SendEmailController@index')->name('sendemail');
    Route::get('addlibrary', 'LibraryController@AddLibrary')->name('addlibrary');
    Route::get('assignments/{business_category_id}', 'AssignmentController@index')->name('assignments');
    Route::get('assignment/{category}/{id}', 'AssignmentController@AssignmentPage')->name('assignments-page');
    Route::get('assignmentfile/{path}', 'AssignmentController@AssignmentFile')->where('path', '.*')->name('assignmentfile');
    Route::get('notifications', 'NotificationController@index')->name('notifications');
    Route::match(['post', 'get'],'payments/{type?}', 'PaymentController@index')->name('payments');
    Route::delete('deletemessage', 'MessagesController@Delete')->name('adminDeleteMessage');
    Route::get('batches', 'BatchController@index')->name('batches');
    Route::match(['get', 'post'], 'batch/create', 'BatchController@Create')->name('create-batch');
    Route::match(['get', 'post'], 'batch/edit/{id}', 'BatchController@Edit')->name('edit-batch');
    });
//    Route::get('storage/*', 'LibraryController@StudentFiles');

    Route::post('createcourse', 'CourseController@CreateCourse');
    Route::post('createlesson', 'LessonController@CreateLesson');
    Route::post('createlibrary', 'LibraryController@Create');
    Route::delete('deletecourse', 'ManageCoursesController@Delete');
    Route::delete('deletelesson', 'ManageLessonsController@Delete');
    Route::delete('deletelessonassignment', 'ManageLessonsController@DeleteAssignment');
    Route::delete('deletecoverimage', 'ManageCoursesController@DeleteCoverImage');
    Route::delete('deletematerial', 'ManageLibraryController@Delete');
    Route::delete('deletecourseassignment', 'ManageCoursesController@DeleteCourseAssignment');
    Route::post('updatecourse', 'ManageCoursesController@Update');
    Route::post('updatelesson', 'ManageLessonsController@Update');
    Route::post('activateuser', 'ManageAccountController@ActivateUser');
    Route::delete('deleteuser', 'ManageAccountController@DeleteUser');
    Route::post('updateuserstatus', 'ManageAccountController@UpdateUserStatus');
    Route::delete('deletelibrary', 'LibraryController@Delete');
    Route::post('scoreassignment', 'AssignmentController@ScoreAssignment');

});

//Users Controllers
//Route::get('/command', function () {
//    $exitCode = Artisan::call('db:seed');
//    return $exitCode;
//});

//Both users and Admins Routes
Route::group(['middleware' => 'auth'], function (){

    Route::match(['post', 'get'], '/change-password', 'users\SettingsController@ChangePassword')
        ->name('userschangepassword');

    Route::group(['middleware' => 'message'], function (){
	    Route::get('message/{id}', 'general\MessageController@ViewMessage')->name('usersmessage');
    });
    Route::get('welcome-note', 'WelcomeNoteController@View')->name('welcome_note');
	Route::group(['middleware' => ['ensureEmployeesPennywiseSet']], function(){
		Route::get('/payments/{user_id?}', 'users\PaymentController@PaymentReport')->name('userspayment');
	});
});

//Users Routes
Route::group(['middleware' => 'users'], function(){
	Route::group(['middleware' => ['ensureEmployees']], function(){

		Route::group(['middleware' => ['ensureEmployeesPennywiseNotSet']], function(){
			Route::match(['post', 'get'], '/set-pennywise', 'users\PennywiseController@Set')->name('setpennywise');
		});

		Route::group(['middleware' => ['ensureEmployeesPennywiseSet']], function(){
			Route::get('/set-pennywise/success', 'users\PennywiseController@Success')->name('setpennywisesuccess');
		});

	});
    Route::get('/course/{name}', 'users\CourseController@ViewCourse')->name('userscourse');

    //to be taken outside
    Route::get('/courses', 'users\CourseController@ViewCourses')->name('userscourses');
    Route::get('notifications', 'users\NotificationController@index')->name('usersnotifications');
	Route::get('messages', 'general\MessageController@index')->name('usersmessages');
	Route::delete('deletemessage', 'general\MessageController@DeleteUserMessage')->name('usersDeleteMessage');
	Route::put('messagetracker/{id}', 'general\MessageController@TrackMessage')->name('messagetracker');

    Route::get('/dashboard', 'users\DashboardController@index')->name('usersdashboard');

	Route::group(['middleware' => ['ensureEmployeesPennywiseSet']], function(){
		Route::get('/keeptoken', 'users\PaymentController@index')->name('addfunds');
		Route::post('/pay', 'users\PaymentController@redirectToGateway')->name('pay');
	});
    Route::get('/payment/callback', 'users\PaymentController@handleGatewayCallback');
    Route::get('/library', 'users\LibraryController@index')->name('userslibrary');
    Route::get('/payment-response', function (){
        if(!Session::has('message')){
            return redirect()->route('usersdashboard');
        }
        return view('users.payment-response');
    })->name('paymentresponse');

    Route::get('/incompletelessons/{courseid}', function ($courseid){
        return view('users.incompletelessons', ['courseid' => $courseid]);
    })->name('incompletelessons');

    //Route::post('/pay', 'users\PaymentController@redirectToGateway')->name('pay');
	Route::post('/pay', 'users\RavePaymentController@initialize')->name('pay');
	Route::post('/rave/callback', 'users\RavePaymentController@callback')->name('callback');

    Route::put('notifications/track', 'users\NotificationController@Update');

    Route::group(['middleware' => ['coursesubscription', 'lessonperiodcheck']], function(){
        Route::group(['middleware' => 'previouslessoncompletion'], function(){
            Route::get('/lesson/{id}', 'users\LessonController@ViewLesson')->name('userslesson');
        });
        Route::put('/videotracker/{id}', 'users\LessonController@VideoTracker');
        Route::post('/submitassignment/lesson/{id}', 'users\LessonController@SubmitAssignment');
        Route::post('/submitfinalproject/{courseid}', 'users\LessonController@SubmitFinalAssignment');
        Route::get('/finalproject/{courseid}', 'users\LessonController@FinalProject')->name('finalproject');
        Route::get('/complete/{courseid}', 'users\CourseController@CompleteCourse')->name('completecourse');
    });
});
