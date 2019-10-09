<?php
Route::get('test', 'Mehran\PayMe\Http\Controllers\PayMeController@index')->defaults('_config', ['view' => 'PayMe::Redirect.index'])->name('PayMe.index');
