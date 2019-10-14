<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
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
            $value->subjects()->detach();
            $value->classes()->detach();
        });
    }

    /** 
     * Teacher with user relation (1 to 1)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /** 
     * Teachers with subjects relation (m to m)
     */
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    /** 
     * Teachers with classes relation (m to m)
     */
    public function classes()
    {
        return $this->belongsToMany(MyClass::class, 'class_teacher', 'teacher_id', 'class_id');
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
