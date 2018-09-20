<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;

class PostTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'post__post_translations';
}
