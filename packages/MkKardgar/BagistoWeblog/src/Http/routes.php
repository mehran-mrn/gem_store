<?php

Route::group(['middleware' => ['web']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('bagistoblog/post/index', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@index')->defaults('_config', ['view' => 'bagistoweblog::post.index'])->name('bagistoweblog.post.index');
        Route::get('bagistoblog/post/create', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@add')->defaults('_config', ['view' => 'bagistoweblog::post.create'])->name('bagistoweblog.post.create');
        Route::post('bagistoblog/post/store', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@store')->name('bagistoweblog.post.store');
        Route::get('bagistoblog/post/edit/{id}', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@edit')->defaults('_config', ['view' => 'bagistoweblog::post.edit'])->name('bagistoweblog.post.edit');
        Route::post('bagistoblog/post/update/{id}', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@update')->name('bagistoweblog.post.update');
        Route::post('/bagistoblog/post/delete/{id}', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@destroy')->name('bagistoweblog.post.delete');



        Route::get('bagistoblog/comment/index', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@commentIndex')->defaults('_config', ['view' => 'bagistoweblog::comment.index'])->name('bagistoweblog.comment.index');
        Route::get('bagistoblog/comment/create', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@commentAdd')->defaults('_config', ['view' => 'bagistoweblog::comment.create'])->name('bagistoweblog.comment.create');
//        Route::post('bagistoblog/comment/store', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@commentStore')->name('bagistoweblog.comment.store');
        Route::get('bagistoblog/comment/edit/{id}', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@commentEdit')->defaults('_config', ['view' => 'bagistoweblog::comment.edit'])->name('bagistoweblog.comment.edit');
        Route::post('bagistoblog/comment/update/{id}', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@commentUpdate')->name('bagistoweblog.comment.update');
        Route::get('/bagistoblog/comment/delete/{id}', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@commentDestroy')->name('bagistoweblog.comment.delete');


        Route::get('bagistoblog/category/index', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@categoryIndex')->defaults('_config', ['view' => 'bagistoweblog::category.index'])->name('bagistoweblog.category.index');
        Route::get('bagistoblog/category/add', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@categoryAdd')->defaults('_config', ['view' => 'bagistoweblog::category.create'])->name('bagistoweblog.category.add');
        Route::post('bagistoblog/category/store', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@categoryStore')->name('bagistoweblog.category.store');
        Route::get('bagistoblog/category/edit/{id}', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@categoryEdit')->defaults('_config', ['view' => 'bagistoweblog::category.edit'])->name('bagistoweblog.category.edit');
        Route::post('bagistoblog/category/update/{id}', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@categoryUpdate')->name('bagistoweblog.category.update');
        Route::get('bagistoblog/category/delete/{id}', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@categoryDelete')->name('bagistoweblog.category.delete');
    });

    Route::get('/blog', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@blog')->defaults('_config', ['view' => 'hiraloa::blog.index'])->name('bagistoweblog.blog.index');
    Route::get('/blog/{slug}/', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@blogShow')->defaults('_config', ['view' => 'hiraloa::blog.show'])->name('bagistoweblog.blog.show');
    Route::post('/blog/comment/store', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@commentStore')->name('bagistoweblog.comment.store');


    Route::post('/blog/search/', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@search')->defaults('_config', ['view' => 'hiraloa::blog.index'])->name('bagistoweblog.post.search');
    Route::get('/blog/category/{slug}', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@category')->defaults('_config', ['view' => 'hiraloa::blog.index'])->name('bagistoweblog.post.category');
    Route::get('/blog/archive/{year}/{month}', '\MkKardgar\BagistoWeblog\Http\Controllers\bagistoWeblogController@archive')->defaults('_config', ['view' => 'hiraloa::blog.index'])->name('bagistoweblog.post.archive');

});
?>