<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MkKardgar\BagistoWeblog\Models\MkKardgarWeblogPost;
use Webkul\Category\Models\Category;
use Webkul\Category\Models\CategoryTranslation;
use Webkul\Product\Models\Product;
use Webkul\Product\Models\ProductFlat;

class SitemapController extends Controller
{
    //

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->first();
        $categories = CategoryTranslation::with('cat')->orderBy('id', 'desc')->first();
        $tags = ProductFlat::orderBy('id', 'desc')->first();
        $posts = MkKardgarWeblogPost::orderBy('id', 'desc')->first();
        return response()->view('hiraloa::sitemap.index', [
            'products' => $products,
            'categories' => $categories,
            'tags' => $tags,
            'posts' => $posts
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
        $category = CategoryTranslation::with('cat')->get();
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

    public function posts()
    {
        $posts = MkKardgarWeblogPost::all();
        return response()->view('hiraloa::sitemap.blog', [
            'posts' => $posts,
        ])->header('Content-Type', 'text/xml');
    }


}
