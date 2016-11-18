<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*Route::get('/','UserController@index');
Route::post('/add','UserController@add');
Route::get('/show','UserController@show');
Route::get('/del','UserController@del');
Route::get('/edit','UserController@edit');
Route::post('/edit_to','UserController@edit_to');
Route::post('/show','UserController@show');
Route::get('uploads/index','UploadsController@index');
Route::post('/add','UploadsController@add');
Route::get('uploads/excel','UploadsController@excel');
Route::post('excel','UploadsController@excel');
Route::get('/show','UploadsController@show');
Route::get('login/index','LoginController@index');
//Route::get('power/index','PowerController@index');
Route::post('login/index','LoginController@index');
Route::get('power/show','PowerController@show');
Route::post('power/apply','PowerController@apply');
Route::get('power/list1','PowerController@list1');
Route::get('power/show2','PowerController@show2');
Route::get('power/yes','PowerController@yes');
Route::get('power/no','PowerController@no');
Route::get('power/show3','PowerController@show3');
//Route::get('/','AdminController@index');
Route::get('login','PortController@login');*/
//项目
Route::get('/index','LoginController@index');
Route::get('/login','LoginController@login');
Route::get('/','IndexController@index');
Route::get('/report','IndexController@report');
Route::get('/green','IndexController@green');
Route::get('/arrive','IndexController@arrive');
Route::get('/delay','IndexController@delay');
Route::get('/mustknow','IndexController@mustknow');
Route::get('/data','IndexController@data');
Route::get('/notice','IndexController@notice');
Route::get('/ask','IndexController@ask');
Route::get('/userCenter','IndexController@userCenter');
Route::get('/entrance','IndexController@entrance');
Route::get('/route','IndexController@route');
Route::get('/userInfo','IndexController@userInfo');
Route::get('/changepsw','IndexController@changepsw');
Route::get('/dormBook','IndexController@dormBook');
Route::get('/addUserInfo','IndexController@addUserInfo');
Route::get('/addDormInfo','IndexController@addDormInfo');
Route::get('/question','IndexController@question');
Route::get('/askList','IndexController@askList');
Route::get('/addDelay','IndexController@addDelay');
Route::get('/addGreen','IndexController@addGreen');
Route::get('/reportCard','IndexController@reportCard');
Route::get('/uploaDate','IndexController@uploaDate');
Route::any('/uploadDate','IndexController@uploadDate');
Route::get('/quiz','IndexController@quiz');
Route::get('/addQuiz','IndexController@addQuiz');
Route::get('/myQuestion','IndexController@myQuestion');
Route::get('/questionList','IndexController@questionList');
Route::get('/answer','IndexController@answer');
Route::get('/change','IndexController@change');
Route::get('/mustList','IndexController@mustList');
Route::get('/inform','IndexController@inform');
Route::get('/noticeDetail','IndexController@noticeDetail');
Route::get('/img','IndexController@img');
Route::get('/desc','IndexController@desc');
Route::get('/news','IndexController@news');
Route::get('/homePage','IndexController@homePage');

/*
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
