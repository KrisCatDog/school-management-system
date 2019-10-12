<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /**
     * Mass assignment.
     *
     * @var array
     */
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

    /**
     * Student with user relation (1 to 1)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Student with attendances relation (1 to m)
     */
    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    /**
     * Student with class relation (1 to 1)
     */
    public function class()
    {
        return $this->belongsTo(MyClass::class);
    }

    public function getPhotoAttribute($value)
    {
        if (request()->is('storage*')) {
            return asset('storage/' . $value);
        } else {
            return $value;
        }
    }
}
