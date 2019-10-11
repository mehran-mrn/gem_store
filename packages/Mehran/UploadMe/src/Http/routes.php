<?php
Route::get('UploadTest', 'Mehran\UploadMe\Http\Controllers\UploadMeController@index')->defaults('_config', ['view' => 'UploadMe::index'])->name('UploadMe.index');
Route::post('upload/store', 'Mehran\UploadMe\Http\Controllers\UploadMeController@store')->name('UploadMe.store');
Route::post('upload/delete/{id}', 'Mehran\UploadMe\Http\Controllers\UploadMeController@destroy')->name('UploadMe.delete');
Route::get('upload/show/{id}', 'Mehran\UploadMe\Http\Controllers\UploadMeController@show')->name('UploadMe.show');



