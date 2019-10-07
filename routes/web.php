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

Route::get('/', 'PagesController@index');

Route::post('/', 'PagesController@lang');

//Route::get('/language/{locale}', function ($locale) {
    /*$xd = App::getLocale();
    echo $xd;
    App::setLocale($locale);
    $xd = App::getLocale();
    //echo __('files.homeTitle');
    //$locale = App::getLocale();
    echo $xd;
    //dd($locale);
    return redirect('mierda');*/
//});
/*Route::get('/mierda', function() {
    echo App::getLocale();
});*/

Route::resource('/companies', 'CompanyController');

Route::resource('/employees', 'EmployeeController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
