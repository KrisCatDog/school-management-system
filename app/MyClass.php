<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyClass extends Model
{
    protected $table = 'classes';

    /**
     * Mass assignment.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Class with students relation (1 to m)
     */
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }

    /**
     * Class with teachers relation (m to m)
     */
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }
}
