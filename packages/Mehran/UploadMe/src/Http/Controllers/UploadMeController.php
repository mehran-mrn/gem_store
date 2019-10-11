<?php

namespace Mehran\UploadMe\Http\Controllers;

use Mehran\UploadMe\Http\Medias;

class UploadMeController extends Controller
{
    protected $_config;

    public function __construct()
    {
        $this->_config = request('_config');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $medias = Medias::all();
        return view($this->_config['view'], compact('medias'));
    }

    public function store()
    {
        $this->validate(request(), [
            'title' => 'string|required',
            'channel_id' => 'required',
            'image.*' => 'required|mimes:jpeg,bmp,png,jpg',
            'content' => 'required'
        ]);

        $result = $this->save(request()->all());

        Medias::create(
            [
                'url' => $result['path'],
                'name' => '',
                'path' => $result['path'],
                'org_name' => $result['org_name'],
                'type' => $result['type'],
                'title' => $result['title'],
                'description' => $result['content']
            ]
        );
        if ($result)
            session()->flash('success', 'فایل با موفقیت آپلود شد.');
        else
            session()->flash('success', trans('admin::app.settings.sliders.created-fail'));
        return redirect()->route('UploadMe.index');

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

    public function destroy($id)
    {
        $media = Medias::find($id);
        if($media->id)
            $media->delete();
        session()->flash('success', 'فایل مورد نظر حذف گردید.');
        return redirect()->route($this->_config['redirect']);

    }

    public function show($id)
    {
        $media = Medias::find($id);
        return redirect()->to('storage/'.$media['url']);
    }
}