<?php

Route::group(['middleware' => ['web']], function () {
    Route::prefix('Zarinpal/standard')->group(function () {

        Route::get('/redirect', 'Mehran\Zarinpal\Http\Controllers\StandardController@redirect')->name('Zarinpal.standard.redirect');

        Route::get('/success', 'Mehran\Zarinpal\Http\Controllers\StandardController@success')->name('Zarinpal.standard.success');

        Route::get('/cancel', 'Mehran\Zarinpal\Http\Controllers\StandardController@cancel')->name('Zarinpal.standard.cancel');
    });
});

Route::get('Zarinpal/standard/ipn', 'Mehran\Zarinpal\Http\Controllers\StandardController@ipn')->name('Zarinpal.standard.ipn');

Route::post('Zarinpal/standard/ipn', 'Mehran\Zarinpal\Http\Controllers\StandardController@ipn')->name('Zarinpal.standard.ipn');
