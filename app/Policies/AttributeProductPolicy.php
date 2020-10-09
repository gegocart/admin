<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AttributeProduct;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttributeProductPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the attribute product.
     *
     * @param  \App\Models\User  $user
     * @param  \App\AttributeProduct  $attributeProduct
     * @return mixed
     */
    public function view(User $user, AttributeProduct $attributeProduct)
    {
        return true;
    }

    /**
     * Determine whether the user can create attribute products.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the attribute product.
     *
     * @param  \App\Models\User  $user
     * @param  \App\AttributeProduct  $attributeProduct
     * @return mixed
     */
    public function update(User $user, AttributeProduct $attributeProduct)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the attribute product.
     *
     * @param  \App\Models\User  $user
     * @param  \App\AttributeProduct  $attributeProduct
     * @return mixed
     */
    public function delete(User $user, AttributeProduct $attributeProduct)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the attribute product.
     *
     * @param  \App\Models\User  $user
     * @param  \App\AttributeProduct  $attributeProduct
     * @return mixed
     */
    public function restore(User $user, AttributeProduct $attributeProduct)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the attribute product.
     *
     * @param  \App\Models\User  $user
     * @param  \App\AttributeProduct  $attributeProduct
     * @return mixed
     */
    public function forceDelete(User $user, AttributeProduct $attributeProduct)
    {
        return false;
    }
}
