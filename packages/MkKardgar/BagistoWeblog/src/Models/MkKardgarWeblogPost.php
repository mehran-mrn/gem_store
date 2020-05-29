<?php

namespace MkKardgar\BagistoWeblog\Models;

use Illuminate\Database\Eloquent\Model;
use Mehran\UploadMe\Http\Medias;
use MkKardgar\BagistoWeblog\Contracts\PostCategory as PostCategories;


class MkKardgarWeblogPost extends Model implements PostCategories
{
    //
    protected $guarded=[];

    public function category()
    {
        return $this->hasMany('MkKardgar\BagistoWeblog\Models\MkKardgarWeblogPostCategory','post_id','id');
    }

    public function media()
    {
        return $this->hasOne(Medias::class,'id','image_url');
    }

    public function comments()
    {
        return $this->hasMany('MkKardgar\BagistoWeblog\Models\MkKardgarWeblogPostComment','post_id','id')->where('approved','=',1);
    }
}
