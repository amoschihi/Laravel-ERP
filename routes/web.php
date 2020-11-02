<?php

use App\Account;
use App\LedgerHelper;

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
// Route::get('/', 'ApplicantController@home');

Route::get('/', function() {
	return view('welcome');
});
Route::post('notification/get','NotificationController@get');
Route::post('notification/read','NotificationController@read');
Route::post('notification/send','NotificationController@send');

//Resources
Route::middleware(['locked'])->group(function () {

	Route::resources([
		'admin/applicants' => 'ApplicantController',
		'admin/menu_management' => 'MenuController',
		'admin/submenu_management' => 'SubmenuController',
		'admin/academics' => 'AcademicController',
		'admin/students' => 'StudentController',
		'admin/profile' => 'ProfileController',
		'admin/studentAjax' => 'StudentAjaxController',
		'admin/units' => 'UnitsController',
		'admin/agents' => 'AgentController',
		'admin/incidents' => 'incidentsController',
		'admin/fees_management' => 'FeesManagementController',
		'admin/roles_privileges' => 'RolesPrivilegesController',
		'admin/user_management' => 'UserManagementController'
	]);
});

//Ajax Resource for Academics
Route::post('admin/academics/course','AcademicController@course')->name('new.course');
Route::post('admin/academics/college','AcademicController@college')->name('new.college');
Route::post('admin/academics/school','AcademicController@school')->name('new.school');
Route::post('admin/academics/department','AcademicController@department')->name('new.department');
Route::post('admin/academics/mode','AcademicController@mode')->name('new.mode');
Route::post('admin/academics/year','AcademicController@year')->name('new.year');
Route::post('admin/academics/academic','AcademicController@academic')->name('new.academic');
Route::post('admin/academics/semester','AcademicController@semester')->name('new.semester');
Route::post('admin/academics/level','AcademicController@level')->name('new.level');
Route::post('admin/academics/major','AcademicController@major')->name('new.major');
Route::post('admin/academics/admtype','AcademicController@admtype')->name('new.admtype');
Route::post('admin/academics/unit','AcademicController@unit')->name('new.unit');
Route::get('/manage/course/classInfo','AcademicController@showClassInformation')->name('showClassInformation');
Route::get('manage/course/showDepartment','AcademicController@showDepartment')->name('showDepartment');
Route::get('manage/course/showCourse','AcademicController@showCourse')->name('showCourse');
Route::get('manage/course/showUnits','AcademicController@showUnits')->name('showUnits');
Route::post('manage/course/updateClassInfo','AcademicController@updateClassInfo')->name('updateClassInfo');
Route::get('manage/course/editClass','AcademicController@editClass')->name('editClass');
Route::post('manage/course/deleteClass','AcademicController@deleteClass')->name('deleteClass');

//Fees Management
Route::get('admin/fees_management/go/to/payment', 'FeesManagementController@payment')->name('student.payment');
Route::post('admin/fees_management/save/payment', 'FeesManagementController@save_payment')->name('save.payment');
Route::get('admin/fees_management/extra/pay','FeesManagementController@pay')->name('extra.pay');
Route::post('admin/fees_management/extra/payment','FeesManagementController@extraPay')->name('extra.payment');

Route::get('admin/fees_management/print/invoice/{receipt_id}','FeesManagementController@printInvoice')->name('print.invoice');

//Students
Route::post('admin/students/registerunit','AcademicController@registerunit')->name('new.registerunit');
Route::post('admin/students/newincident','AcademicController@newincident')->name('new.incident');
Route::post('admin/students/photo','StudentController@uploadPhoto')->name('upload.photo');
Route::post('admin/students/updateStatus','StudentController@updateStatus')->name('updateStatus');
Route::post('admin/studentAjax/delete','StudentAjaxController@delete');
Route::post('admin/studentAjax/editGrades','StudentAjaxController@editGrades')->name('edit.selectedUnits');
Route::post('admin/studentAjax/editIncidents','StudentAjaxController@editIncidents')->name('edit.selectedincidents');
Route::post('admin/studentAjax/getSlip','StudentAjaxController@getSlip')->name('get.slip');
Route::post('admin/studentAjax/getTranscript','StudentAjaxController@getTranscript')->name('get.transcript');

Route::post('admin/units/delete','UnitsController@delete');
Route::post('admin/incidents/delete','incidentsController@delete');

Route::post('admin/applicants/delete','ApplicantController@delete');
Route::post('admin/applicants/reject','ApplicantController@reject')->name('applicant.reject');
Route::post('admin/applicants/register','ApplicantController@register')->name('applicant.register');
Route::post('admin/applicants/generate','ApplicantController@generate')->name('applicant.generate');
Route::post('admin/applicants/departments','ApplicantController@departments')->name('load.departments');
Route::post('admin/applicants/courses','ApplicantController@courses')->name('load.courses');
Route::post('admin/applicants/approve','ApplicantController@approve')->name('applicant.approve');
Route::get('admin/students_list','ReportController@getStudentList');
Route::get('admin/students_list/show','ReportController@showStudentInfo')->name('showStudentInfo');
Route::get('admin/fees_report','ReportController@getFeeReport')->name('getFeeReport');
Route::get('admin/fees_report/show','ReportController@showFeeReport')->name('showFeeReport');

Route::get('admin/settings', 'SettingController@index');
Route::get('admin/settings/icons', 'SettingController@icons')->name('view.icons');
Route::post('admin/settings/newicon', 'SettingController@saveIcon')->name('new.icon');
Route::get('back','SettingController@back');
Route::post('admin/settings/update','SettingController@updateNotifications')->name('update.notifications');
Route::post('admin/menu_management/sortMenus','MenuController@sortMenus');
Route::get('admin/menu_management/sort/menu','MenuController@sort')->name('menu.sort');
Route::post('admin/menu_management/menu/sortAll','MenuController@sortAll')->name('menu.sortAll');
Route::post('admin/menu_management/hideOrUnhide','MenuController@hideOrUnhide');
Route::post('admin/submenu_management/hideOrUnhide','SubmenuController@hideOrUnhide');
Route::post('admin/submenu_management/nestMenu','SubmenuController@nestMenu');
Route::post('admin/settings/create','SettingController@create');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Testing Maatwebsite
Route::get('exportPDF', 'MaatwebsiteController@exportPDF');
Route::get('importExport', 'MaatwebsiteController@importExport');
Route::get('downloadExcel/{type}', 'MaatwebsiteController@downloadExcel');
Route::post('admin/import/applicant', 'MaatwebsiteController@importExcel')->name('import.applicant');
Route::post('admin/import/icons', 'MaatwebsiteController@importIcons')->name('import.icons');

/* Admin Routes */
Route::get('admin/home', 'AdminController@index');
Route::get('admin/dashboard', 'Admin\FinanceController@index');
Route::get('admin', 'InstructorController@index');
Route::get('admin/login', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Admin\LoginController@login');
Route::get('admin/{user}/role', function(App\Admin $user){
	$roles = $user->role;
	return view('admin.role', compact('roles'));
});
Route::post('admin/role', 'Admin\LoginController@role')->name('admin.role');
Route::post('admin/password/email','Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
Route::get('admin/password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin/password/reset', 'Admin\ResetPasswordController@reset');
Route::get('admin/password/reset/{token}','Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');
Route::resource('admin/lockscreen','Admin\LockscreenController');
Route::post('admin/password/change','Admin\ChangePasswordController@showChangeRequestForm')->name('admin.password.change.request');
Route::get('admin/comments','Admin\AdminController@showComments');
Route::get('admin/view/comments/{comment_id}','Admin\AdminController@showComments')->name('admin.comment');
Route::post('admin/load/comments','Admin\AdminController@fetchComments')->name('fetchComments');
Route::post('admin/insert/comments','Admin\AdminController@insertComment')->name('insertComment');
// Route::get('admin/contact','Admin\AdminController@showContactForm')->name('admin.contact');
Route::get('admin/about','Admin\AdminController@showAboutForm');
Route::get('admin/change_password','Admin\ChangePasswordController@showChangeForm');

Route::get('verifyEmail','Auth\RegisterController@verifyEmail')->name('verifyEmail');
Route::get('verify/{email}/{verifyToken}','Auth\RegisterController@sendEmailDone')->name('sendEmailDone');

//Agent routes
Route::get('agent/login','Agent\AgentController@showLoginForm')->name('agent.login');
Route::get('admin/messaging','AdminController@message');

//Ledger Entries
Route::group([
	'middleware' => ['auth:admin','finance','locked'],
	'as'=>'Ledger::',
	'prefix'=>'admin/ledger_entries/{account}',
	], function($account) use ($router){ // implicit binding for account

		// bind account to Model\Account
		$router->model('account', Account::class);
		Route::get('', function($account){
			
			$stats = LedgerHelper::accountStats($account);

			if(Request::ajax()){
				return $stats;
			}

			view()->addLocation(__DIR__ . '/views');

			return view('finance.ledger', compact('account', 'stats'));
		});

		Route::post('', function($account){
			$transaction = LedgerHelper::record(Request::all(), $account);

			if(isset($transaction['error']))
				return $transaction;

			return LedgerHelper::accountStats($account);
		});

		Route::get('summary', function($account){
			return LedgerHelper::summary($account);
		});

		Route::get('transactions', function($account){
			return LedgerHelper::transactions($account);
		});		

		Route::get('accountStats', function($account){
			return LedgerHelper::accountStats($account);
		});
});


//Student portal routes
Route::middleware(['auth'])->group(function () {
	Route::get('news','Student\StudentController@newsIndex');
	Route::get('main_details','Student\StudentController@detailsIndex');
	Route::get('main_details/{student_id}/edit','Student\StudentController@detailsEdit');
	Route::post('main_details/{student_id}','Student\StudentController@detailsUpdate');
	Route::get('other_details','Student\StudentController@detailsIndex');
	Route::get('unit_registration','Student\StudentController@unitsIndex');
	Route::get('transcripts','Student\StudentController@transcriptsIndex');
	Route::get('exam_results','Student\StudentController@resultsIndex');
	Route::get('programmes','Student\StudentController@programmes');
	Route::get('fees_structure','Student\StudentController@feesStructure');
	Route::get('fees_status','Student\StudentController@feesStatus');
	Route::get('receipts','Student\StudentController@receipt');
});
