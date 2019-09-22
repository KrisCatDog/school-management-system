<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * Mass assignment.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * Role with users relation (1 to 1)
     */
    public function users()
    {
        return $this->hasOne(User::class);
    }
}
