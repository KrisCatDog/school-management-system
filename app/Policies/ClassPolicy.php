<?php

namespace App\Policies;

use App\User;
use App\MyClass;
use Illuminate\Auth\Access\HandlesAuthorization;

class ClassPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any my classes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the my class.
     *
     * @param  \App\User  $user
     * @param  \App\MyClass  $myClass
     * @return mixed
     */
    public function view(User $user, MyClass $myClass)
    {
        //
    }

    /**
     * Determine whether the user can create my classes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->role_id != 2;
    }

    /**
     * Determine whether the user can update the my class.
     *
     * @param  \App\User  $user
     * @param  \App\MyClass  $myClass
     * @return mixed
     */
    public function update(User $user, MyClass $myClass)
    {
        return $user->role_id != 2;
    }

    /**
     * Determine whether the user can delete the my class.
     *
     * @param  \App\User  $user
     * @param  \App\MyClass  $myClass
     * @return mixed
     */
    public function delete(User $user, MyClass $myClass)
    {
        return $user->role_id == 1;
    }

    /**
     * Determine whether the user can restore the my class.
     *
     * @param  \App\User  $user
     * @param  \App\MyClass  $myClass
     * @return mixed
     */
    public function restore(User $user, MyClass $myClass)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the my class.
     *
     * @param  \App\User  $user
     * @param  \App\MyClass  $myClass
     * @return mixed
     */
    public function forceDelete(User $user, MyClass $myClass)
    {
        //
    }
}
