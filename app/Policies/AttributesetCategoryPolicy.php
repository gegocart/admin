<?php

namespace App\Policies;

use App\Models\User;
use App\Models\AttributesetCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class AttributesetCategoryPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the attributeset category.
     *
     * @param  \App\Models\User  $user
     * @param  \App\AttributesetCategory  $attributesetCategory
     * @return mixed
     */
    public function view(User $user, AttributesetCategory $attributesetCategory)
    {
        return true;
    }

    /**
     * Determine whether the user can create attributeset categories.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the attributeset category.
     *
     * @param  \App\Models\User  $user
     * @param  \App\AttributesetCategory  $attributesetCategory
     * @return mixed
     */
    public function update(User $user, AttributesetCategory $attributesetCategory)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the attributeset category.
     *
     * @param  \App\Models\User  $user
     * @param  \App\AttributesetCategory  $attributesetCategory
     * @return mixed
     */
    public function delete(User $user, AttributesetCategory $attributesetCategory)
    {
        return false;
    }

    /**
     * Determine whether the user can restore the attributeset category.
     *
     * @param  \App\Models\User  $user
     * @param  \App\AttributesetCategory  $attributesetCategory
     * @return mixed
     */
    public function restore(User $user, AttributesetCategory $attributesetCategory)
    {
        return false;
    }

    /**
     * Determine whether the user can permanently delete the attributeset category.
     *
     * @param  \App\Models\User  $user
     * @param  \App\AttributesetCategory  $attributesetCategory
     * @return mixed
     */
    public function forceDelete(User $user, AttributesetCategory $attributesetCategory)
    {
        return false;
    }
}
