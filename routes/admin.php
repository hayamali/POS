<?php
Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
	], function () {
		Route::group(['prefix' => 'admin'], function () {
			Route::get('', function () {
				return view('dashboard.index');
			});

			Route::resource('users', 'UserController');
		});
	});

//Route::prefix('admin')->name('dashboard.')->group(function()
//{
//    Route::get('', function()
//    {
//        return 'This Is Dashboard';
//    });
//});
