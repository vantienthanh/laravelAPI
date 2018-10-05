<?php

namespace Modules\Category\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class newEntity extends Model
{
    use Translatable;

    protected $table = 'category__newentities';
    public $translatedAttributes = [];
    protected $fillable = [];
}
