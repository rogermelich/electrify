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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
    Route::get('graphs', function () {
        $data = [];
        return view('graphs', $data);
    })->name('graphs');

    Route::get('reports', function () {
        $data = [];
        return view('reports', $data);
    })->name('reports');

    Route::post('export/maxdaterange', 'ExcelController@maxdaterange');
    Route::post('export/mindaterange', 'ExcelController@mindaterange');
    Route::post('export/avgdaterange', 'ExcelController@avgdaterange');

    Route::get('graph/actualmonth', 'GraphController@graphjsonactualmonth');
    Route::get('graph/summonth', 'GraphController@graphjsonsummonth');
    Route::get('graph/summonthyear', 'GraphController@graphjsonsummonthyear');
    Route::get('graph/sumyears', 'GraphController@graphjsonsumyears');



    Route::get('/user/profile', [
        'middleware' => 'auth',
        'uses' => 'ProfileController@show'
    ]);
    Route::post('/user/profile/edit', 'ProfileController@edit');

});
