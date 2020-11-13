<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', 'authenticateController@loginPage');
Route::post('/signin', 'authenticateController@signIn');

//.............dashboard....................................
Route::group(['middleware' => ['auth']], function() {

    Route::get('/dashboard', [
        'uses' => 'dashboardController@dashboard',
        'as' => 'dashboard',
    ]);

//................... user information............
    Route::get('/createUser', 'userController@createUser');

    Route::post('/createUser', 'userController@createUserId');
    Route::get('showUser', 'userController@showUser');
    Route::get('deleteUser/{id}', 'userController@deleteUser');
    Route::get('passwordPage', 'userController@getPassPage');
    Route::post('passwordPage', 'userController@changePassword');

//.....................................authentication............

    Route::get('/logout', 'authenticateController@getLogout');

//.....................................student Route.....................................................

    Route::get('dashboard/student/create', 'studentController@showStdRecord');
    Route::post('dashboard/student/create', 'studentController@createStdRecord');

    Route::get('dashboard/student/edit', 'studentController@showEditPage');
    Route::get('dashboard/student/edit/{id}', 'studentController@editStudentRecord');
    Route::post('dashboard/student/edit/update/{id}', 'studentController@updateStudentRecord');


    Route::get('dashboard/student/delete', 'studentController@showDeletePage');
    Route::get('dashboard/student/delete/{id}', 'studentController@deleteStudentRecord');
    Route::get('dashboard/student/View/search', 'studentController@viewSearchStudentPage');
    Route::post('dashboard/student/View/search', 'studentController@viewStudentPage');
//Route::get('dashboard/student/View', 'studentController@');

//...............................Course Route..........................................................

    Route::get('/dashboard/course/create', 'courseController@showCourseCreateForm');
    Route::post('/dashboard/course/create', 'courseController@createCourseRecord');

    Route::get('/dashboard/course/edit', 'courseController@ShowCourseEditPage');
    Route::get('/dashboard/course/edit/{id}', 'courseController@courseUpDatePage');
    Route::post('/dashboard/course/edit/{id}', 'courseController@showCourseUpdatePage');

    Route::get('/dashboard/course/delete', 'courseController@ShowCoursedeletePage');
    Route::get('/dashboard/course/delete/{id}', 'courseController@courseDelete');
    Route::get('/dashboard/course/view/search', 'courseController@searchView');
    Route::post('/dashboard/course/view/search', 'courseController@View');
//Route::get('/dashboard/course/view', 'courseController@viewCoursePage');


//.................................Grade Sheet.........................................................

    Route::get('/dashboard/gradeSheet/create', 'gradeSheetController@GradeSheetInfo');
    Route::post('/dashboard/gradeSheet/create', 'gradeSheetController@createGradeSheet');
    Route::post('/dashboard/gradeSheet/create/mark', 'gradeSheetController@createGradeSheetMark');

    Route::get('dashboard/gradeSheet/edit/search', 'gradeSheetController@searchEdit');
    Route::post('dashboard/gradeSheet/edit/search', 'gradeSheetController@editPage');
    Route::post('/dashboard/gradeSheet/update', 'gradeSheetController@update');
    Route::get('/dashboard/gradeSheet/view/search', 'gradeSheetController@viewInfo');
    Route::post('dashboard/gradeSheet/view', 'gradeSheetController@view');
    Route::get('/dashboard/gradeSheet/print/search', 'gradeSheetController@printSearch');
    Route::post('/dashboard/gradeSheet/print', 'gradeSheetController@printPage');
    Route::get('/dashboard/gradeSheet/print/{id1}/{id2}', 'gradeSheetController@print_process');
    Route::get('/dashboard/gradeSheet/printPage/{id1}/{id2}', 'gradeSheetController@printButton');


//..............................Notice............................................

    Route::get('/dashboard/notice/create', 'noticeController@createNotice');
    Route::post('/dashboard/notice/create', 'noticeController@createNoticeProcess');

    Route::get('/dashboard/notice/delete', 'noticeController@showDeletePage');
    Route::get('/dashboard/notice/delete/{id}', 'noticeController@noticeDelete');

    Route::get('/dashboard/notice/view', 'noticeController@viewNoticePage');

//............................Mark.....................................

    Route::get('dashboard/mark/create', 'totalmarkController@createTotalmarkPage');
    Route::post('dashboard/mark/create', 'totalmarkController@createTotalmark');


    Route::get('dashboard/mark/edit', 'totalmarkController@showEditTotalmark');
    Route::get('dashboard/mark/edit/{id}', 'totalmarkController@editTotalmark');
    Route::post('dashboard/mark/edit/{id}', 'totalmarkController@updateTotalmark');

    Route::get('/dashboard/mark/delete', 'totalmarkController@showDeletePage');
    Route::get('/dashboard/mark/delete/{id}', 'totalmarkController@markDelete');


//............................. Tabulation Sheet............................

    Route::get('/dashboard/tabulationSheet/search', 'tabulationController@search');
    Route::post('/dashboard/tabulationSheet/search', 'tabulationController@create');
    Route::post('/dashboard/tabulationSheet/create', 'tabulationController@createPage');
    Route::get('/dashboard/tabulationSheet/printSearch', 'tabulationController@printSearch');
    Route::post('/dashboard/tabulationSheet/print', 'tabulationController@printPage');
    Route::get('print/{id}', 'tabulationController@print_process');
    Route::get('/dashboard/tabulationSheet/print/{id}', 'tabulationController@printButton');
    Route::get('/dashboard/tabulation/view/search', 'tabulationController@searchView');
    Route::post('/dashboard/tabulation/view/search', 'tabulationController@View');
});