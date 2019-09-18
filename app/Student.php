<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    /** 
     * Model event for Teacher model
     */
    protected static function boot()
    {
        parent::boot();

        static::deleted(function ($value) {
            $value->user->delete();
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
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
