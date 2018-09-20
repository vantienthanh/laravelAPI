<?php

namespace Modules\Post\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;

class Post extends Model
{
    use Translatable;

    protected $table = 'post__posts';
    public $translatedAttributes = [];
    protected $fillable = [];
    public function category(){
        return $this->belongsTo(Category::class,"category_id","id");
    }
}
