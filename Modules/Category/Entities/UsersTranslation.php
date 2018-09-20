<?php

namespace Modules\Category\Entities;

use Illuminate\Database\Eloquent\Model;

class UsersTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'category__users_translations';
}
