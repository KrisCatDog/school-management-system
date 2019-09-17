<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MyClass extends Model
{
    protected $table = 'classes';

    protected $guarded = [];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
