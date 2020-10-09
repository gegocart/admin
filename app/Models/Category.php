<?php

namespace App\Models;

use App\Models\Product;
use App\Models\CategoryProduct;
use App\Models\Traits\HasChildren;
use App\Models\Traits\IsOrderable;
use Illuminate\Database\Eloquent\Model;
use App\Models\Attributeset;


class Category extends Model
{
    use HasChildren, IsOrderable;
 
    //protected $with =['attributesetcategory'];
     //  protected $with=['parents'];

    protected $fillable = [
        'name',
        'slug',
        'order',
        'status',
        'commission_fee'
    ];

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function praents()
    {
          return $this->belongsTo(Category::class,'parent_id');
    }

    public function products()
    {
        //return $this->belongsToMany(Product::class);
        return $this->hasMany(Product::class);
    }
    
    public function subcount()
    {
        return $this->children->count();
    }
 
   public function attributesetcategory()
   {
     return $this->hasMany('App\Models\AttributesetCategory','category_id','id');
   }

   public function attributesetcategorycount()
   {
     return $this->hasOne('App\Models\AttributesetCategory','category_id','id')->count();
   }

   public function scopeSearch($query,$search)
   {
    
     return $query->orwhereHas('subcount', function ($q) use ($search){
              $q->where('name', 'like', '%'.$search.'%')
               ->orwhere('slug', 'like', '%'.$search.'%');
         });
   }

    public function scopeActive($query){
        return $query->where('status',1);
    }


  public function categoryproduct()
   {
     return $this->hasMany('App\Models\CategoryProduct','category_id','id');
   }
  
    public function productsCount()
    {  
      
     return CategoryProduct::with('product')->where('category_id',$this->id)->whereHas('product',function($q){
           $q->where('status',1);
      })->count();
    }

}
