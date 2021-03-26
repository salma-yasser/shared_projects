<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|register_adult
*/

Route::group(['middleware' => ['auth']], function () {
	Route::resource("feedback","FeedbackController");
	Route::get('/home', function () {
	    return view('home');
	});
});

Route::group(['middleware' => ['auth','customer']], function () {
	Route::get("allcourses","CourseController@allcourses"); 
	Route::get("customercourses/{key}","CourseController@customercourses"); 
	Route::get("allcamps","CustomerController@allcamps"); 
	Route::get("customercamps","CustomerController@customercamps"); 
	Route::get("customerconsultation","CustomerController@customerconsultation"); 
	Route::get("allconsultation","CustomerController@allconsultation"); 
	
	Route::get('/error', function()
	{
	   return view('errors');
	});

	Route::get("user_programs/{key}","ProgramController@user_programs");
	Route::get("view_course/{key}","ProgramController@view_course");

}); 

	Route::group(['middleware' => ['auth','admin']], function () {
		Route::resource("course_menus","CourseMenuController"); 
	Route::resource("menus","MenuController");
	Route::post("new_customer","UserController@create"); 
	Route::get("customers_user/{key}", function () {
	    return view('users.create');
	}); 
	Route::post("customers_adult","CustomerController@customers_adult"); 
	Route::get("/adult_application_create","AdultController@createApplication"); 
	Route::post("/adult_application_store","AdultController@storeApplication")->name("adult.application.store"); 
	Route::get("/kid_application_create","KidController@createApplication"); 
	Route::post("/kid_application_store","KidController@storeApplication")->name("kid.application.store"); 

	Route::get('/register_adult', function () {
		//$howKnows = App\HowKnow::all();
		//$jobs=App\Job::orderBy("id","asc")->get();,compact("howKnows","jobs");
	    return view('customers.register_adult');
	}); 
	Route::resource("users","UserController"); 
	Route::resource("customers","CustomerController"); 
	Route::resource("kids","KidController"); 
	Route::resource("departments","DepartmentController");
	Route::resource("parents","ParentController");
	Route::resource("kid_parents","KidParentController");
	Route::resource("jobs","JobController");
	Route::resource("adults","AdultController");
	Route::resource("adult_jobs","AdultJobController");
	Route::resource("courses","CourseController"); 
	Route::resource("favorites","FavoriteController");
	Route::resource("programs","ProgramController");
	Route::get("course_programs/{key}","ProgramController@course_programs");


	Route::resource("roles","RoleController");
	Route::resource("employees","EmployeeController"); 
	Route::resource("program_employees","ProgramEmployeeController");
	Route::resource("department_employees","DepartmentEmployeeController");
	Route::resource("customer_programs","CustomerProgramController");
	Route::get("customer_program/{key}","CustomerProgramController@listbyProgram");
	Route::get("how_know_customers/{key}","CustomerController@listByHowKnow");
	Route::resource("how_knows","HowKnowController");
	Route::get('/dashboard', function () {
	    return view('welcome');
	});
	Route::get('/page-error', function()
	{
	   return view('error-admin');
	});
	Route::resource("levels","LevelController");
	Route::resource("lectures","LectureController");
	Route::resource("program_levels","ProgramLevelController");
	Route::resource("lecture_customer_programs","LectureCustomerProgramController");
	//Route::get('/home', 'HomeController@index');
});
Auth::routes();
Route::get('/', function()
	{
	   return view('auth.login');
	});
Route::get('logout', array('uses' => 'HomeController@logout'));