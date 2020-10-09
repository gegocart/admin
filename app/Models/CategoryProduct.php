<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Category;

class CategoryProduct extends Model
{
    protected $table = 'category_product';

    protected $fillable=['product_id','category_id'];

    //  public function productcategoryrelation()
    // {
    //     return $this->belongsTo(Product::class);
    // }

    // public function categoryrelation()
    // {
    //     return $this->belongsTo(Category::class);
    // }

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category','category_id','id');
    }

    
}
