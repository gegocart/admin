<?php
namespace App\Traits;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Carbon\Carbon;


trait Common
{



   public function uploadFile($folder,$file)
   {
        //dd($file);
	    $path='';
	    try
	     {	      
          $path=Storage::putFile($folder, $file,'public');
	      
	       // $res['message']='success';

	      }
	     catch(Exception $e)
	     {
        // dd($e->getMessage());
	       // throw new Exception($e->getMessage());
	     }
	    return $path;
     }
  public function getTempFilePath($disk,$file)
    {
      $path='';
      try{

        $path = \Storage::disk($disk)->temporaryUrl(
          $file, Carbon::now()->addMinutes(5)
          );
        //dd($path);
      }
      catch(Exception $e)
      {
        //dd($e->getMessage());
      }
        return $path;
    }

      public function getFilePath($file)
	  {
      // dd('uploads/'.$file);
		    $path='';

		    try
		    {
          //dd($file);
		         $path=url('uploads/'.$file);
             //dd($file);
		         
		    }
		    catch(Exception $e)
		    {
		    	throw new Exception($e->getMessage());

		    }
		      return $path;
	  }


  public function getFilePathforDownload($file)
  {
    $path='';
    try{
         $path=\Storage::get($file);
    }
    catch(Exception $e)
    {
      throw new Exception($e->getMessage());
    }
      return $path;
  }

   public function imageResize()
    {
        $res=[];
        try
        {
           
            $extension = $request->file('product_Image')->getClientOriginalExtension();
            $name = $request->file('product_Image')->getClientOriginalName();


            $imagepath=$this->uploadFile('/images/',$request->product_Image);
           
            $image_path=$this->getFilePath($imagepath);

            $img = Image::make($image_path);
            $img->resize(40,40);
          
            $img->save('uploads/images/thumbnail/'.$name);

                  
            $res['message']="sucess";
          }
           catch(Exception $exception)
           {
             $res['message']=$exception->getMessage();
             return $res;
           }
        


    }

 
  public function getRequestIP()
    {
      $ip=request()->ip();
      try{
      if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
      {
        $ip= $_SERVER['HTTP_X_FORWARDED_FOR'];
      }
    }
    catch(Exception $e)
    {
    }
        return $ip;
    }

}