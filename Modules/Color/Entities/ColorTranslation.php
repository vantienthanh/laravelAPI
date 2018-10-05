<?php

namespace Modules\Color\Entities;

use Illuminate\Database\Eloquent\Model;

class ColorTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'color__color_translations';
}
