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

Route::get('/sitemap.xml', 'SitemapController@index');
Route::get('/sitemap.xml/products','SitemapController@products');
Route::get('/sitemap.xml/categories','SitemapController@categories');
Route::get('/sitemap.xml/tags','SitemapController@tags');
Route::get('/sitemap.xml/posts','SitemapController@posts');