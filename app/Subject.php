<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    /**
     * Mass assignment.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Subject with teachers relation (1 to m)
     */
    public function teachers()
    {
        return $this->belongsToMany(Teacher::class);
    }

    public function scores()
    {
        return $this->hasMany(Score::class);
    }
}
