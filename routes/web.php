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
/*
Route::get('/', 'HomeController@index');
Route::get('/step', 'HomeController@step');
Route::post('/step', 'HomeController@submitStep');
*/
$pages = [
    'contact-us',
    'faq',
    'how-to-apply',
    'study-materials',
    'about',
    'privacy-policy',
    'terms-of-service',
    'checkout'
];
/*
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

*/
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


$routes = [
    '/',
    'contact',
    'terms',
    'privacy',
    'step',
    'checkout'
];

$states = [
    'HI'=>'hawaii',
    'AK'=>'alaska',
    'FL'=>'florida',
    'SC'=>'south-carolina',
    'GA'=>'georgia',
    'AL'=>'alabama',
    'NC'=>'north-carolina',
    'TN'=>'tennessee',
    'RI'=>'rhode-island',
    'CT'=>'connecticut',
    'MA'=>'massachusetts',
    'ME'=>'maine',
    'NH'=>'new-hampshire',
    'VT'=>'vermont',
    'NY'=>'new-york',
    'NJ'=>'new-jersey',
    'PA'=>'pennsylvania',
    'DE'=>'delaware',
    'MD'=>'maryland',
    'WV'=>'west-virginia',
    'KY'=>'kentucky',
    'OH'=>'ohio',
    'MI'=>'michigan',
    'WY'=>'wyoming',
    'MT'=>'montana',
    'ID'=>'Idaho',
    'WA'=>'washington',
    'TX'=>'texas',
    'CA'=>'california',
    'AZ'=>'arizona',
    'NV'=>'nevada',
    'UT'=>'utah',
    'CO'=>'colorado',
    'NM'=>'new-mexico',
    'OR'=>'oregon',
    'ND'=>'north-dakota',
    'SD'=>'south-dakota',
    'NE'=>'nebraska',
    'IA'=>'iowa',
    'MS'=>'mississippi',
    'IN'=>'indiana',
    'IL'=>'illinois',
    'MN'=>'minnesota',
    'WI'=>'wisconsin',
    'MO'=>'missouri',
    'AR'=>'arkansas',
    'OK'=>'oklahoma',
    'KS'=>'kansas',
    'LA'=>'louisiana',
    'VA'=>'virginia'
];

foreach($states as $state)
{
    array_push($routes, $state.'-post-office-jobs');
}

if(!function_exists('setRoute')) {
    function setRoute($data)
    {
        array_map(function ($r) {
            switch ($r) {
                case 'step':
                case 'checkout':
                    Route::get($r, 'SiteController@serve');
                    Route::post($r, 'SiteController@serve');
                    break;
                default:
                    Route::get($r, 'SiteController@serve');
                    break;
            }
        }, $data);
    }
}

setRoute($routes);

Route::group(['prefix'=>'v{version}'],function() use($routes){
    setRoute($routes);
});