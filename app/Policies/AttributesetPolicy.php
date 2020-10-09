<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Attributeset;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttributesetPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the attributeset.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Attributeset  $attributeset
     * @return mixed
     */
    public function view(User $user, Attributeset $attributeset)
    {
        //
    }

    /**
     * Determine whether the user can create attributesets.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the attributeset.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Attributeset  $attributeset
     * @return mixed
     */
    public function update(User $user, Attributeset $attributeset)
    {
        //
    }

    /**
     * Determine whether the user can delete the attributeset.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Attributeset  $attributeset
     * @return mixed
     */
    public function delete(User $user, Attributeset $attributeset)
    {
        //
    }

    /**
     * Determine whether the user can restore the attributeset.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Attributeset  $attributeset
     * @return mixed
     */
    public function restore(User $user, Attributeset $attributeset)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the attributeset.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Attributeset  $attributeset
     * @return mixed
     */
    public function forceDelete(User $user, Attributeset $attributeset)
    {
        //
    }
}
