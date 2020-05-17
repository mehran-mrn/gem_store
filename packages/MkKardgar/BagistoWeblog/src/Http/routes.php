<?php

Route::group(['middleware' => ['web']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('bagistoblog/index', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@index')->defaults('_config', ['view' => 'bagistoweblog::index'])->name('bagistoweblog.index');
    });
});
?>