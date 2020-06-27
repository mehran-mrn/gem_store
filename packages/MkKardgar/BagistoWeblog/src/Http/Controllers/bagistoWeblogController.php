<?php

namespace MkKardgar\BagistoWeblog\Http\Controllers;

use App\Rules\RecaptchaV3;
use Illuminate\Routing\Controller;
use Mehran\UploadMe\Http\Medias;
use MkKardgar\BagistoWeblog\Models\MkKardgarWeblogCategory;
use MkKardgar\BagistoWeblog\Models\MkKardgarWeblogPost;
use MkKardgar\BagistoWeblog\Models\MkKardgarWeblogPostCategory;
use MkKardgar\BagistoWeblog\Models\MkKardgarWeblogPostComment;
use Webkul\Customer\Repositories\CustomerRepository;

class bagistoWeblogController extends Controller
{
    protected $_config;

    protected $customer;

    public function __construct(CustomerRepository $customer)
    {
        $this->_config = request('_config');
        $this->customer = auth()->guard('customer')->user();

    }

    public
    function index()
    {
        return view($this->_config['view']);

    }

    public
    function categoryIndex()
    {
        return view($this->_config['view']);
    }

    public
    function categoryAdd()
    {
        return view($this->_config['view']);

    }

    public
    function categoryStore(\Illuminate\Http\Request $request)
    {
        $v = \Illuminate\Support\Facades\Validator::make($request->all(),
            [
                'categoryName' => ['required', 'min:2', 'max:255'],
                'slug' => ['required', 'unique:mk_kardgar_weblog_categories,slug'],
            ]);
        if ($v->fails()) {
            return redirect()->route('bagistoweblog.category.add')
                ->withErrors($v)
                ->withInput();
        } else {
            MkKardgarWeblogCategory::create(
                [
                    'category_name' => trim($request['categoryName']),
                    'slug' => trim($request['slug']),
                    'description' => trim($request['description']),
                    'lang' => 'fa'
                ]
            );
            session()->flash('success', 'دسته بندی ' . $request['categoryName'] . ' به سیستم اضافه گردید.');
            return \redirect()->route('bagistoweblog.category.index');
        }

    }

    public
    function categoryEdit($id)
    {
        $category = MkKardgarWeblogCategory::find($id);
        return view($this->_config['view'], compact('category'));
    }

    public
    function categoryUpdate($id, \Illuminate\Http\Request $request)
    {
        $category = MkKardgarWeblogCategory::find($id);
        $v = \Illuminate\Support\Facades\Validator::make($request->all(),
            [
                'categoryName' => ['required', 'min:2', 'max:255'],
                'slug' => ['required', 'unique:mk_kardgar_weblog_categories,slug,' . $id],
            ]);
        if ($v->fails()) {
            return redirect()->back()
                ->withErrors($v)
                ->withInput();
        } else {
            $category->category_name = trim($request['categoryName']);
            $category->slug = trim($request['slug']);
            $category->description = trim($request['description']);
            $category->save();
            session()->flash('success', 'دسته بندی ' . $request['categoryName'] . ' ویرایش گردید.');
            return \redirect()->route('bagistoweblog.category.index');
        }

    }

    public
    function categoryDelete($id)
    {
        dd($id);
    }

    public
    function add()
    {
        $categories = MkKardgarWeblogCategory::all();
        return view($this->_config['view'], compact('categories'));
    }

    public
    function store(\Illuminate\Http\Request $request)
    {


        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => ['required', 'min:2', 'max:255'],
            'slug' => ['unique:mk_kardgar_weblog_posts,slug'],
            'subtitle' => ['required', 'min:2', 'max:255'],
            'meta_description' => ['required', 'min:2', 'max:255'],
            'post_body' => ['required', 'min:2'],
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
                    'slug' => trim($request['slug']),
                    'title' => trim($request['title']),
                    'subtitle' => trim($request['subtitle']),
                    'meta_description' => trim($request['meta_description']),
                    'post_body' => trim($request['post_body']),
                    'image_url' => $mediaID['id'],
                    'is_published' => trim($request['status']),
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

    public
    function edit($id)
    {
        $post = MkKardgarWeblogPost::with('category', 'media')->find($id);
        $categories = MkKardgarWeblogCategory::all();
        return view($this->_config['view'], compact('post', 'categories'));
    }

    public
    function update($id, \Illuminate\Http\Request $request)
    {
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
            'title' => ['required', 'min:2', 'max:255'],
            'slug' => ['unique:mk_kardgar_weblog_posts,slug,' . $id],
            'subtitle' => ['required', 'min:2', 'max:255'],
            'meta_description' => ['required', 'min:2', 'max:255'],
            'post_body' => ['required', 'min:2'],
        ]);
        if ($validator->fails()) {
            return redirect()->route('bagistoweblog.post.edit', ['id' => $id])
                ->withErrors($validator)
                ->withInput();
        } else {
            $post = MkKardgarWeblogPost::find($id);
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

    public
    function destroy($id)
    {
        $post = MkKardgarWeblogPost::find($id);
        MkKardgarWeblogPostCategory::where('post_id', $id)->delete();
        $post->delete();
        return response()->json(['message' => false], 400);
    }


    public
    function commentIndex()
    {
        return view($this->_config['view']);
    }

    public
    function commentAdd()
    {
        return view($this->_config['view']);
    }

    public
    function commentStore(\Illuminate\Http\Request $request)
    {
        $post = MkKardgarWeblogPost::find($request['post_id']);
        if (isset($post['id'])) {
            if (\auth()->guard()->check()) {
                $customerID = auth()->guard('customer')->user()->id;
            } else {
                $customerID = 0;
            }
            $validate = \Illuminate\Support\Facades\Validator::make($request->all(),
                [
                    'post_id' => ['required'],
                    'comment' => ['required', 'min:5', 'max:255'],
                    'author_name' => ['required', 'min:2', 'max:255'],
                    'g-recaptcha-response' => ['required', new RecaptchaV3],

                ]
            );
            if ($validate->fails()) {
                return \redirect()->back()->withErrors($validate);
            } else {
                MkKardgarWeblogPostComment::create(
                    [
                        'post_id' => $request['post_id'],
                        'user_id' => $customerID,
                        'ip' => '',
                        'author_name' => $request['author_name'],
                        'comment' => $request['comment'],
                        'approved' => 0,
                        'author_email' => $request['author_email'],
                        'author_website' => $request['author_website'],
                        'author_mobile' => '',

                    ]
                );
                session()->flash('success', 'نظر شما با موفقیت ثبت گردید. بعد از بازبینی در سایت نمایش داده خواهد شد.');
                return \redirect()->route('bagistoweblog.blog.show', ['slug' => $post['slug']]);
            }
        }

    }

    public
    function commentEdit($id)
    {
        $comment = MkKardgarWeblogPostComment::find($id);
        $response = MkKardgarWeblogPostComment::where('parent_id', $comment['id'])->get();
        return view($this->_config['view'], compact('comment', 'response'));
    }

    public
    function commentUpdate($id, \Illuminate\Http\Request $request)
    {
        $comment = MkKardgarWeblogPostComment::find($id);
        if (isset($request['response']) && $request['response'] != "") {
            MkKardgarWeblogPostComment::create(
                [
                    'post_id' => $comment['post_id'],
                    'user_id' => 0,
                    'ip' => '',
                    'author_name' => "مدیر سایت",
                    'comment' => $request['response'],
                    'approved' => 1,
                    'author_email' => "info@mycubic.ir",
                    'author_website' => "mycubid.ir",
                    'author_mobile' => '',
                    'parent_id' => $id
                ]
            );
        }
        $comment->approved = $request['status'];
        $comment->save();
        session()->flash('success', 'عملیات با موفقیت انجام پذیرفت.');
        return \redirect()->route('bagistoweblog.comment.index');

    }

    public
    function commentDestroy($id)
    {
        $comment = MkKardgarWeblogPostComment::find($id);
        $comment->delete();
        session()->flash('success', 'پاسخ مورد نظر حذف گردید.');
        return \redirect()->back();
    }


    public
    function save($data)
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

    public
    function blog()
    {
        $posts = MkKardgarWeblogPost::with('media', 'category', 'comments')->paginate(6);
        return view($this->_config['view'], compact('posts'));
    }

    public function blogShow($slug)
    {
        $post = MkKardgarWeblogPost::with('media', 'category')->where('slug', $slug)->first();
        $categories = MkKardgarWeblogCategory::all();
        $lastPost = MkKardgarWeblogPost::with('media')->where('id', '!=', $post['id'])->limit(5)->orderBy('id', 'desc')->get();
        return view($this->_config['view'], compact('post', 'categories', 'lastPost'));
    }

    public function search(\Illuminate\Http\Request $request)
    {
        $posts = MkKardgarWeblogPost::where('post_body', 'like', '%' . $request['search'] . '%')->with('media', 'category', 'comments')->paginate(6);
        $search = $request['search'];
        return view($this->_config['view'], compact('posts', 'search'));
    }

    public function category($slug)
    {
        $cat = MkKardgarWeblogCategory::where('slug', $slug)->first();
        if (isset($cat['id'])) {
            $postsIDs = MkKardgarWeblogPostCategory::where('category_id', $cat['id'])->pluck('post_id');
            $posts = MkKardgarWeblogPost::whereIn('id', $postsIDs)->paginate(6);
            $category = $cat['category_name'];
            return view($this->_config['view'], compact('posts', 'category'));
        }
    }

    public function archive($year, $month)
    {

        $timeStamp = jmktime('', '', '', $month, 1, $year);
        dd($timeStamp);
        $lastDay = jdate('t', $timeStamp);
        dd($lastDay);
        $startDate = $year . "-" . $month . "-" . "01";
        $endDate = $year . "-" . $month . "-" . "01";
        $cat = MkKardgarWeblogCategory::where('slug', $slug)->first();
        if (isset($cat['id'])) {
            $postsIDs = MkKardgarWeblogPostCategory::where('category_id', $cat['id'])->pluck('post_id');
            $posts = MkKardgarWeblogPost::whereIn('id', $postsIDs)->paginate(6);
            $category = $cat['category_name'];
            return view($this->_config['view'], compact('posts', 'category'));
        }
    }

    function str_slug_persian($title, $separator = '-')
    {
        $title = trim($title);
        $title = mb_strtolower($title, 'UTF-8');

        $title = str_replace('‌', $separator, $title);

        $title = preg_replace(
            '/[^a-z0-9_\s\-اآؤئبپتثجچحخدذرزژسشصضطظعغفقكکگلمنوةيإأۀءهی۰۱۲۳۴۵۶۷۸۹٠١٢٣٤٥٦٧٨٩]/u',
            '',
            $title
        );

        $title = preg_replace('/[\s\-_]+/', ' ', $title);
        $title = preg_replace('/[\s_]/', $separator, $title);
        $title = trim($title, $separator);

        return $title;
    }

}

?>