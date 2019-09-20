<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $guarded = [];


    public function getCreatedAtAttribute($value)
    {
        return date('m-d', strtotime($value));
    }

    public function getStatusAttribute($value)
    {
        return [
            1 => '<i class="fas fa-check text-success"></i>',
            2 => '<b class="text-info">S</b>',
            3 => '<i class="fas fa-times text-danger"></i>',
        ][$value];
    }

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
