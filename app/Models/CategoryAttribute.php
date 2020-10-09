<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class CategoryAttribute extends Model
{
    protected $table = 'attribute_category';

    public function category_attribute()
    {
       return $this->belongsToMany(Category::class);
    }
}
