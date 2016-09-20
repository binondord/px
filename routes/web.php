<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/step', 'HomeController@step');
Route::post('/step', 'HomeController@submitStep');

$pages = [
    'contact-us',
    'faq',
    'how-to-apply',
    'study-materials',
    'about',
    'privacy-policy',
    'terms-of-service'
];

foreach($pages as $page)
{
    Route::get($page, 'HomeController@displaypage');
}

Route::group(['prefix' => 'v1'], function () {
    Route::get('step1', 'HomeController@v1step1');
    Route::get('step2', 'HomeController@v1step2');
    Route::get('step3', 'HomeController@v1step3');
    Route::get('step4', 'HomeController@v1step4');
    Route::post('step4', 'HomeController@submitStep');
});

Route::group(['prefix' => 'v2'], function () {
    Route::get('step', 'HomeController@v2step');
    Route::post('step', 'HomeController@submitStep');
});

Route::group(['prefix' => 'v3'], function () {
    Route::get('step', 'HomeController@v3step');
});

Route::group(['middleware' => 'auth'], function () {
    Route::resource('submissions', 'SubmissionsController');
    Route::resource('messages', 'MessagesController');
    Route::resource('users', 'UsersController');

    Route::get('/admin','AdminController@index');

    Route::get('/users/changepasswd/{userid}','UsersController@showChangePasswd');
    Route::post('/users/changepasswd/{userid}','UsersController@saveChangePasswd');

    /*
     * Messages
     */

    Route::get('/api/all-messages','ApiController@getAllMessages');
    Route::get('/api/message/{message_id}','ApiController@getMessage');

    /*
     * Submissions
     */

    Route::get('/api/all-submissions','ApiController@getAllSubmissions');
    Route::get('/api/submission/{submission_id}','ApiController@getSubmission');

    /*
     * Users
     */

    Route::get('/api/all-users','ApiController@getAllUsers');
    Route::get('/api/user/{user_id}','ApiController@getUser');
});

Auth::routes();
