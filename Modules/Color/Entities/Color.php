<?php

namespace Modules\Color\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use Translatable;

    protected $table = 'color__colors';
    public $translatedAttributes = [];
    protected $fillable = ['name','code','status'];
}
