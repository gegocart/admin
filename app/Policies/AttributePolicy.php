<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Attribute;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttributePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the attribute.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Attribute  $attribute
     * @return mixed
     */
    public function view(User $user, Attribute $attribute)
    {
        return true;
    }

    /**
     * Determine whether the user can create attributes.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the attribute.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Attribute  $attribute
     * @return mixed
     */
    public function update(User $user, Attribute $attribute)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the attribute.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Attribute  $attribute
     * @return mixed
     */
    public function delete(User $user, Attribute $attribute)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the attribute.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Attribute  $attribute
     * @return mixed
     */
    public function restore(User $user, Attribute $attribute)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the attribute.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Attribute  $attribute
     * @return mixed
     */
    public function forceDelete(User $user, Attribute $attribute)
    {
        return false;
    }
}
