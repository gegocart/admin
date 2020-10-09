<?php

namespace App\Models;

use App\Models\Category;
use App\Models\ProductVariation;
use App\Models\Traits\CanBeScoped;
use App\Models\Traits\HasPrice;
use Illuminate\Database\Eloquent\Model;
use App\Models\AttributeSet;
use App\Models\CategoryAttribute;
use App\Models\ProductAttribute;
use App\Models\ProductCategory;
use App\Models\ProductGallery;
use App\Models\CategoryProduct;
use App\Models\RatingReview;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
  
class Product extends Model
{ 
    use CanBeScoped, HasPrice, SoftDeletes;

    protected $with = ['productgallery','users','tax_type'];

   protected $appends=['product_price','product_formattedprice'];
    
     protected $fillable=[
        'user_id',
        'store_id',
        'name',
        'slug',
        'sku',
        'description',
        'product_image',
        'thumbnailimage',
        'price',
        'weight',
        'tax_id',
        'status',
        'type'

     ];

     // protected $casts=[
     //    'created_at' => 'datetime:Y-m-d',
     // ];
     

    // public function scopeActive($query){
    //     return $query->where('status','approve');
    // }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function inStock()
    {
        return $this->stockCount() > 0;
    }

    public function stockCount()
    {
        return $this->variations->sum(function ($variation) {
           return $variation->stockCount();
        });
    }

    // public function productrelation()
    // {
    //     return $this->belongsToMany(Category::class);
    // }

     public function categories()
    {
        //return $this->belongsToMany(Category::class);
        return $this->belongsToMany(Category::class);
        // ->withPivot('category_id','product_id')
        // ->withTimestamps();
    }

public function categoryproduct()
    {
        return $this->belongsToMany('App\Models\Category','category_product','category_id','product_id');
    }

    public function variations()
    {
        //return $this->hasMany(ProductVariation::class)->orderBy('order', 'asc');
        return $this->hasMany('App\Models\ProductVariation');
    }
      public function source()
    {
        //return $this->hasMany(ProductVariation::class)->orderBy('order', 'asc');
        return $this->hasOne('App\Models\ProductSource','product_id','id');
    }
    public function attributeproduct()
    {
        return $this->hasMany('App\Models\AttributeProduct','product_id','id');
    }
 public function productanswer()
    {
        return $this->hasMany('App\Models\ProductAnswer','product_id','id');
    }
     public function productquestion()
    {
        return $this->hasMany('App\Models\ProductQuestion','product_id','id');
    }
    
    public function productcategory()
    {
        return $this->belongsToMany('App\Models\Category','category_product','product_id','category_id'); //table name ,pivot table name and their pivot table Id
    }

    public function stores(){
        return $this->belongsTo('App\Models\Store','store_id');
    }
 
   public function productgallery()
    {
        return $this->hasMany('App\Models\ProductGallery','product_id','id');
    }
    
    public function rating()
    {
        return $this->hasMany('App\Models\RatingReview','entity_id','id');
    }
 public function productquestions(){
     return $this->hasMany('App\Models\ProductQuestion','product_id','id');
    }
    public function rateperproduct1()
    {
        return $this->rating()->where('rating',1)->count();
    }

    public function rateperproduct2()
    {
        return $this->rating()->where('rating',2)->count();
    }

    public function rateperproduct3()
    {
        return $this->rating()->where('rating',3)->count();
    }

    public function rateperproduct4()
    {
        return $this->rating()->where('rating',4)->count();
    }

    public function rateperproduct5()
    {
        return $this->rating()->where('rating',5)->count();
    }

    public function ratevalue()
    {
        return $this->rating()->sum(function($rate){
            return $rate->productrate();
        });

    }


    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function tax_type()
    {
        return $this->hasOne('App\Models\TaxType','id','tax_id');
    }

    public function getCurrency()
    { 
       return $this->price()->getCurrencyCode();
    }


    public function ratereviewtotal()
    {
       return $this->rating()->sum('rating');
    }

    public function ratereviewcount()
    {
       return $this->rating()->count();
    }

 


     // $reviewtotal=RatingReview::where('entity_id',$this->id)->sum('rating');
     //    $reviewcount=RatingReview::where('entity_id',$this->id)->count();
     //    $averagecount=0;
     //    if($reviewtotal!=0 && $reviewcount!=0){
     //      $averagecount=round(($reviewtotal/$reviewcount),0);
     //    }

    

    public function orderitem()
    {
        return $this->hasMany('App\Models\OrderItem','product_id','id');
    }
    public function starrating()
    {
         $reviewtotal=$this->ratereviewtotal();
        $reviewcount=$this->ratereviewcount();
        
        $rating=0;
        if($reviewtotal!=0 && $reviewcount!=0){
          $rating=(int)($reviewtotal/$reviewcount);
        }

        return $rating;
    }

    // public function scopeFilterRating($query)
    // {
    //     return $query->wher
    // }

    public function productfeatured()
    {
        return $this->hasMany('App\Models\ProductFeatured','product_id','id');
    }
    public function sortDescription($str)
    {
        return Str::limit($str, 60, ' ...');
    }

    public function getProductPriceAttribute()
    {
         return $this->price->amount()/100;
    }

    public function getProductFormattedPriceAttribute()
    {
        return $this->formattedPrice;
    }

    // public function scopeProductPrice($query)
    // { 
    //     return $query->where('price', '<', 200);
    // }
       public function scopePriceDescending($query)
        {
            return $query->orderBy('price','DESC'); //9 to 0
        } 

        public function scopePriceAscending($query)
        {
            return $query->orderBy('price','ASC'); //0 to 9
        } 

    public function wishlistitems()
    {
        return $this->hasMany('App\Models\WishListItem','product_id','id');
    }

     public function porductCountByBrand()
    {
        return $this->where('brand',$this->brand)->count();
    }

    public function storePorductCountByBrand()
    {
        return $this->where('store_id',$this->store_id)->where('brand',$this->brand)->count();
    }

 

}
