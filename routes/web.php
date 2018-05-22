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
    return redirect('/login');
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

    Route::prefix('export')->group(function () {
        Route::post('maxdaterange', 'ExcelController@maxdaterange');
        Route::post('mindaterange', 'ExcelController@mindaterange');
        Route::post('avgdaterange', 'ExcelController@avgdaterange');
        Route::post('totaldaydaterange', 'ExcelController@totaldaydaterange');
    });

    Route::prefix('graph')->group(function () {
        Route::get('actualmonth', 'GraphController@graphjsonactualmonth');
        Route::get('summonth', 'GraphController@graphjsonsummonth');
        Route::get('summonthyear', 'GraphController@graphjsonsummonthyear');
        Route::get('sumyears', 'GraphController@graphjsonsumyears');
    });


    Route::get('/user/profile', [
        'middleware' => 'auth',
        'uses' => 'ProfileController@show'
    ]);
    Route::post('/user/profile/edit', 'ProfileController@edit');
    Route::post('/pricekw/edit', 'PricekWController@price_kw_update');

    Route::prefix('password')->group(function () {
        Route::get('change', 'ProfileController@password')->name('password.change');
        Route::patch('change', 'ProfileController@password_update');
    });

});
