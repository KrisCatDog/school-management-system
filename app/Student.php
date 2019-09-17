<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($value) {
            $value->user->delete();
        });
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function class()
    {
        return $this->belongsTo(MyClass::class);
    }
}
