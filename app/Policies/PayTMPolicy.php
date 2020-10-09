<?php

namespace App\Policies;

use App\Models\User;
use App\Models\PayTM;
use Illuminate\Auth\Access\HandlesAuthorization;

class PayTMPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the pay t m.
     *
     * @param  \App\Models\User  $user
     * @param  \App\PayTM  $payTM
     * @return mixed
     */
    public function view(User $user, PayTM $payTM)
    {
     return true;   
    }

    /**
     * Determine whether the user can create pay t ms.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the pay t m.
     *
     * @param  \App\Models\User  $user
     * @param  \App\PayTM  $payTM
     * @return mixed
     */
    public function update(User $user, PayTM $payTM)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the pay t m.
     *
     * @param  \App\Models\User  $user
     * @param  \App\PayTM  $payTM
     * @return mixed
     */
    public function delete(User $user, PayTM $payTM)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the pay t m.
     *
     * @param  \App\Models\User  $user
     * @param  \App\PayTM  $payTM
     * @return mixed
     */
    public function restore(User $user, PayTM $payTM)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the pay t m.
     *
     * @param  \App\Models\User  $user
     * @param  \App\PayTM  $payTM
     * @return mixed
     */
    public function forceDelete(User $user, PayTM $payTM)
    {
        return false;
    }
}
