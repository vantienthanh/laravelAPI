<?php

namespace Modules\Category\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Post\Entities\Post;

class Category extends Model
{
    use Translatable;

    protected $table = 'category__categories';
    public $translatedAttributes = [];
    protected $fillable = ["name"];
//    public function category(){
//        return $this->belongsTo("Modules\Category\Entities\Category",'parent_id');
//    }

    public function parent()
    {
        return $this->belongsTo("Modules\Category\Entities\Category",'parent_id', 'id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public  function users (){
        return $this->belongsTo('Modules\Category\Entities\Users');
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }
}
