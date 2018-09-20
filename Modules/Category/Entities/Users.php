<?php

namespace Modules\Category\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use Translatable;

    protected $table = 'Users';
    public $translatedAttributes = [];
    protected $fillable = [];
    public function category(){
        return $this->belongsTo('Modules\Category\Entities\Category');
    }
}
