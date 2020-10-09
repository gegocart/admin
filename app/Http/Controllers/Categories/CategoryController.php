<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\CategorySubcategoryResource;
use App\Models\Category;
use App\Models\AttributesetCategory;
use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Database\Query\Builder;
use Exception;

class CategoryController extends Controller
{
    public function index()
    {  
        $category=Category::with(['children','categoryproduct'])->parents()->ordered()->get();

         
        
       return CategoryResource::collection(
            $category          
        );

        // return CategoryResource::collection(
        //     Category::with(['children'])->parents()->ordered()->get()
        // );
    }

    public function show($slug)
    {
        
        $category=Category::with(['children'])->where('slug',$slug)->get();

        return $category;
    }

    
    public function displaysubcategory()
    {
        //$category=Category::whereNotNull('parent_id')->get();
       // dd($category[1]['children']);
        $category='';
        $attributesetcategory=AttributesetCategory::pluck('category_id')->toarray();
        if(count($attributesetcategory)>0)
        {
          $category=Category::whereNotNull('parent_id')->whereIn('id',$attributesetcategory)->get();
      }
        // dd($category);
         
        return $category;
    }

  public function activecategory()
    {
        //$category=Category::whereNotNull('parent_id')->get();
       // dd($category[1]['children']);
            $attributesetcategory=AttributesetCategory::pluck('category_id')->toarray();
       
          $category=Category::whereNotNull('parent_id')->whereIn('id',$attributesetcategory)->get();

         //dd($category);
         
        return $category;
    }
    public function getsubcategory()
    {
        //$category=Category::whereNotNull('parent_id')->get();
       // dd($category[1]['children']);
   
        
        $category=Category::whereNotNull('parent_id')->get();
      
         //dd($category);
         
        return $category;
    }

    public function getCategorylist()
    {
         $res=[];
//dd('1');
         $category=Category::whereNull('parent_id')->get()->keyby('id');

         $subcategory=Category::whereNotNull('parent_id')->get()->groupby('parent_id');
          $attributesetcategory=AttributesetCategory::pluck('category_id')->toarray();
       
           $category=Category::whereNotNull('parent_id')->whereIn('id',$attributesetcategory)->get();
     

         $res['category']=$category;
         $res['subcategory']=$subcategory;    
         $res['activesubcategory']=$activesubcategory;    
      
         return $res;
    }

    public function getMenuCategorylist()
    {
         $res=[];
         //dd('2');

         $category=Category::whereNull('parent_id')->Active()->get()->keyby('id');

         $subcategory=Category::where('status','1')->whereNotNull('parent_id')->get()->groupby('parent_id');
    
         $res['category']=$category;
         $res['subcategory']=$subcategory;    
      
         return $res;
    }

    public function getCategory($slug)
    {
        $category=Category::with('praents')->where('slug',$slug)->first();          
        return $category; 
        // return CategorySubcategoryResource::collection($category);
    }
}
