<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function getStatusAttribute($value)
    {
        return [
            1 => 'Attend',
            2 => 'Sick',
            3 => 'Absent',
        ][$value];
    }
}
