<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webkul\Category\Models\Category;
use Webkul\Category\Models\CategoryTranslation;
use Webkul\Product\Models\Product;
use Webkul\Product\Models\ProductFlat;

class SitemapController extends Controller
{
    //

    public function index()
    {
        $articles = Product::all()->first();
        $categories = Category::all()->first();
        return response()->view('hiraloa::sitemap.index', [
            'products' => $articles,
            'categories' => $categories,
        ])->header('Content-Type', 'text/xml');
    }

    public function products()
    {

        $product = Product::all();
        return response()->view('hiraloa::sitemap.products', [
            'products' => $product,
        ])->header('Content-Type', 'text/xml');
    }
    public function categories()
    {
        $category = CategoryTranslation::all();
        return response()->view('hiraloa::sitemap.categories', [
            'categories' => $category,
        ])->header('Content-Type', 'text/xml');
    }

    public function tags()
    {
        $tags = ProductFlat::all();
        return response()->view('hiraloa::sitemap.tags', [
            'tags' => $tags,
        ])->header('Content-Type', 'text/xml');
    }


}
