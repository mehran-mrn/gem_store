<?php
Route::get('UploadTest', 'Mehran\UploadMe\Http\Controllers\UploadMeController@index')->defaults('_config', ['view' => 'UploadMe::Redirect.index'])->name('UploadMe.index');
