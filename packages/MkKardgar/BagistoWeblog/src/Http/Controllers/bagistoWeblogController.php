<?php

namespace MkKardgar\BagistoWeblog\Http\Controllers;


use http\Env\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Validator;
use Mehran\UploadMe\Http\Medias;
use MkKardgar\BagistoWeblog\Models\MkKardgarWeblogCategory;
use MkKardgar\BagistoWeblog\Models\MkKardgarWeblogPost;
use MkKardgar\BagistoWeblog\Models\MkKardgarWeblogPostCategory;

class bagistoWeblogController extends Controller
{
    protected $_config;

    public function __construct()
    {
        $this->_config = request('_config');
    }

    public function index()
    {
        return view($this->_config['view']);

    }

    public function categoryIndex()
    {
        return view($this->_config['view']);
    }

    public function categoryAdd()
    {
        return view($this->_config['view']);

    }

    public function categoryEdit($id)
    {
        $category = MkKardgarWeblogCategory::find($id);
        return view($this->_config['view'], compact('category'));
    }

    public function categoryUpdate($id, \Illuminate\Http\Request $request)
    {
        $category = MkKardgarWeblogCategory::find($id);
        $rules = array(
            'categoryName' => ['required', 'min:2', 'max:255'],
        );
        $validate = validator($request->all(), $rules);
        if ($validate->valid()) {
            $category->category_name = $request['categoryName'];
            $category->slug = $request['slug'];
            $category->description = $request['description'];
            $category->save();
            session()->flash('success', 'دسته بندی ' . $request['categoryName'] . ' ویرایش گردید.');
            return \redirect()->route('bagistoweblog.category.index');
        }

    }

    public function categoryDelete($id)
    {
        dd($id);
    }

    public function categoryStore(\Illuminate\Http\Request $request)
    {
        $rules = array(
            'categoryName' => ['required', 'min:2', 'max:255'],
        );
        $validate = validator($request->all(), $rules);
        if ($validate->valid()) {
            MkKardgarWeblogCategory::create(
                [
                    'category_name' => $request['categoryName'],
                    'slug' => $request['slug'],
                    'description' => $request['description'],
                    'lang' => 'fa'
                ]
            );
            session()->flash('success', 'دسته بندی ' . $request['categoryName'] . ' به سیستم اضافه گردید.');
            return \redirect()->route('bagistoweblog.category.index');
        }

    }

    public function add()
    {
        $categories = MkKardgarWeblogCategory::all();
        return view($this->_config['view'], compact('categories'));
    }

    public function store(\Illuminate\Http\Request $request)
    {


        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => ['required', 'min:2', 'max:255'],
            'subtitle' => ['required', 'min:2', 'max:255'],
            'meta_description' => ['required', 'min:2', 'max:255'],
            'post_body' => ['required', 'min:2', 'max:255'],
        ]);
        if ($validator->fails()) {
            return redirect()->route('bagistoweblog.post.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $mediaID = 0;
            if (isset($request['image'])) {
                $result = $this->save(request()->all());
                $mediaID = Medias::create(
                    [
                        'url' => $result['path'],
                        'name' => '',
                        'path' => $result['path'],
                        'org_name' => $result['org_name'],
                        'type' => $result['type'],
                        'title' => $request['title'],
                        'description' => 'weblog'
                    ]);
            }
            $post = MkKardgarWeblogPost::create(
                [
                    'user_id' => 1,
                    'slug' => $request['slug'],
                    'title' => $request['title'],
                    'subtitle' => $request['subtitle'],
                    'meta_description' => $request['meta_description'],
                    'post_body' => $request['post_body'],
                    'image_url' => $mediaID['id'],
                    'is_published' => $request['status'],
                    'lang' => 'fa'
                ]
            );
            if (isset($request['category'])) {
                foreach ($request['category'] as $cat) {
                    MkKardgarWeblogPostCategory::create(
                        [
                            'post_id' => $post['id'],
                            'category_id' => $cat
                        ]
                    );
                }
            }
            return \redirect()->route('bagistoweblog.post.index');
        }

    }

    public function edit($id)
    {
        $post = MkKardgarWeblogPost::with('category', 'media')->find($id);
        $categories = MkKardgarWeblogCategory::all();
        return view($this->_config['view'], compact('post', 'categories'));
    }

    public function update($id, \Illuminate\Http\Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => ['required', 'min:2', 'max:255'],
            'subtitle' => ['required', 'min:2', 'max:255'],
            'meta_description' => ['required', 'min:2', 'max:255'],
            'post_body' => ['required', 'min:2', 'max:255'],
        ]);
        $post = MkKardgarWeblogPost::find($id);
        if ($validator->fails()) {
            return redirect()->route('bagistoweblog.post.create')
                ->withErrors($validator)
                ->withInput();
        } else {
            $mediaID = 0;
            $result = $this->save(request()->all());
            if (isset($result['path'])) {
                $mediaID = Medias::create(
                    [
                        'url' => $result['path'],
                        'name' => '',
                        'path' => $result['path'],
                        'org_name' => $result['org_name'],
                        'type' => $result['type'],
                        'title' => $request['title'],
                        'description' => 'weblog'
                    ]);
                $post->image_url = $mediaID['id'];

            }
            $post->slug = $request['slug'];
            $post->title = $request['title'];
            $post->subtitle = $request['subtitle'];
            $post->meta_description = $request['meta_description'];
            $post->post_body = $request['post_body'];
            $post->is_published = $request['status'];
            $post->save();

            MkKardgarWeblogPostCategory::where('post_id', $id)->delete();
            if (isset($request['category'])) {
                foreach ($request['category'] as $cat) {
                    MkKardgarWeblogPostCategory::create(
                        [
                            'post_id' => $post['id'],
                            'category_id' => $cat
                        ]
                    );
                }
            }
            return \redirect()->route('bagistoweblog.post.index');
        }
    }

    public function destroy($id)
    {
        $post = MkKardgarWeblogPost::find($id);
        MkKardgarWeblogPostCategory::where('post_id', $id)->delete();
        $post->delete();
        return response()->json(['message' => false], 400);

    }



    public function commentIndex()
    {
        return view($this->_config['view']);
    }

    public function commentAdd()
    {
        return view($this->_config['view']);

    }

    public function commentEdit($id)
    {
        $category = MkKardgarWeblogCategory::find($id);
        return view($this->_config['view'], compact('category'));
    }

    public function commentUpdate($id, \Illuminate\Http\Request $request)
    {
        $category = MkKardgarWeblogCategory::find($id);
        $rules = array(
            'categoryName' => ['required', 'min:2', 'max:255'],
        );
        $validate = validator($request->all(), $rules);
        if ($validate->valid()) {
            $category->category_name = $request['categoryName'];
            $category->slug = $request['slug'];
            $category->description = $request['description'];
            $category->save();
            session()->flash('success', 'دسته بندی ' . $request['categoryName'] . ' ویرایش گردید.');
            return \redirect()->route('bagistoweblog.category.index');
        }

    }

    public function commentyDelete($id)
    {
        dd($id);
    }

    public function commentStore(\Illuminate\Http\Request $request)
    {
        $rules = array(
            'categoryName' => ['required', 'min:2', 'max:255'],
        );
        $validate = validator($request->all(), $rules);
        if ($validate->valid()) {
            MkKardgarWeblogCategory::create(
                [
                    'category_name' => $request['categoryName'],
                    'slug' => $request['slug'],
                    'description' => $request['description'],
                    'lang' => 'fa'
                ]
            );
            session()->flash('success', 'دسته بندی ' . $request['categoryName'] . ' به سیستم اضافه گردید.');
            return \redirect()->route('bagistoweblog.category.index');
        }

    }

    public function save($data)
    {
//        $channelName = $this->channel->find($data['channel_id'])->name;

        $dir = 'files';

        $uploaded = false;
        $org_name = false;
        $name = false;
        $type = false;
        $image = false;

        if (isset($data['image'])) {
            $image = $first = array_first($data['image'], function ($value, $key) {
                if ($value)
                    return $value;
                else
                    return false;

            });
        }


        if ($image != false) {
            $org_name = $image->getClientOriginalName();
            $type = $image->getClientMimeType();
            $uploaded = $image->store($dir);
            unset($data['image'], $data['_token']);
        }

        if ($uploaded) {
            $data['org_name'] = $org_name;
            $data['path'] = $uploaded;
            $data['type'] = $type;
        } else {
            unset($data['image']);
        }

        return $data;
    }

}

?>