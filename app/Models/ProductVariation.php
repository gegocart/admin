<?php

namespace App\Models;

use App\Cart\Money;
use App\Models\Collections\ProductVariationCollection;
use App\Models\Product;
use App\Models\ProductVariationType;
use App\Models\AttributeProduct;
use App\Models\Traits\HasPrice;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 
  
class ProductVariation extends Model
{
    use HasPrice,SoftDeletes;  

    protected $table = 'product_variations';
    protected $with=['product'];
      // protected $fillable=['product_id','attribute_id','position','imagepath','thumbnailimage'];

    public function getPriceAttribute($value)
    {
        if ($value === null) {
            return $this->product->price;
        }

        return new Money($value);
    }

    public function getPricesAttribute($value)
    {
        if ($value === null) {
            return $this->product->price;
        }
        return $value;
    
    }

    public function minStock($count)
    {
        return min($this->stockCount(), $count);
    }

    public function priceVaries()
    {
       return $this->price->amount() !== $this->product->price->amount();
    }

    public function quantity()
    {
        return $this->quantity;
    }

    public function inStock()
    {
        return $this->stockCount() > 0;
    }

    public function stockCount()
    {
        return $this->stock->sum('pivot.stock');
    }



    public function type()
    {
        //previous
        // return $this->hasOne(ProductVariationType::class, 'id', 'product_variation_type_id');
         return $this->hasOne('App\Models\Attribute', 'id', 'attribute_id');
    }



    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function stocks()
    {
        return $this->hasMany(Stock::class);
    }

    public function stock()
    {
        return $this->belongsToMany(
            ProductVariation::class, 'product_variation_stock_view'
        )
            ->withPivot([
                'stock',
                'in_stock'
            ]);
    }

    public function newCollection(array $models = [])
    {
        return new ProductVariationCollection($models);
    }

    public function attribute()
    {
        return $this->belongsTo('App\Models\Attribute', 'attribute_id', 'id');
    }

    public function attributeproduct()
    {
        return $this->belongsTo('App\Models\AttributeProduct', 'attribute_product_id', 'id');
    }

   
}
