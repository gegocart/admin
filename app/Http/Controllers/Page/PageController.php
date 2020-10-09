<?php

namespace App\Http\Controllers\Page;
use App\Http\Controllers\Controller;
use App\Models\Page;
use App\Http\Resources\PageResource;

class PageController extends Controller
{
  
    public function __construct()
    {
      
    }

    public function show($slug)
    {
        //$pages  = Page::get();
        if(!is_null(\Session::get('locale')))
        { 
            $lang = \Session::get('locale');
        }
        else
        {
            $lang = "en";
        }
        $pagedetails  = Page::where([['active', 1],['language', $lang],['slug', '=', $slug]])->first();

        if(count( $pagedetails )>0)
        {
          return new PageResource($pagedetails);
        }
        else
        {
            abort(404);
        }
    }

}