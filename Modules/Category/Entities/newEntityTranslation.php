<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;

class newEntityTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'category__newentity_translations';
}
