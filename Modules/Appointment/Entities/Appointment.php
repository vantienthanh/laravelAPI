<?php

namespace Modules\Appointment\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use Translatable;

    protected $table = 'appointment__appointments';
    public $translatedAttributes = [];
    protected $fillable = [];
}
