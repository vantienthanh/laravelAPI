<?php

namespace Modules\Appointment\Entities;

use Illuminate\Database\Eloquent\Model;

class AppointmentTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'appointment__appointment_translations';
}
