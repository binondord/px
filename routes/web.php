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

#Auth::routes();

#Route::get('/home', 'HomeController@index');
