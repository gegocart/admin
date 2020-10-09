<?php

namespace App\Http\Controllers\Admin\Setting;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Http\Requests\Admin\Setting\SettingRequest;
use App\Http\Controllers\Controller;
use App\Models\ActivityLog;

use App\Traits\Common;
use App\Traits\LogActivity;
use Auth;
use Exception;
class SettingController extends Controller
{
     use Common,LogActivity;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      

       $paginate=$request->paginate==null?'10':$request->paginate;
        $orderby=$request->sort_by==null?'asc':$request->sort_by;

         $settings=Setting::orderby('id',$orderby)->paginate($paginate);

       $search=$request->search;
       if($search!="")
       {
          $settings=Setting::where(function($query) use ($search){
            $query->orwhere('key','LIKE',$search.'%')->orwhere('name','LIKE',$search.'%')->orwhere('description','LIKE',$search.'%')->orwhere('value','LIKE',$search.'%');
          })->orderby('id',$orderby)->paginate($paginate);
       }

          $settings=$settings->appends(array('sort_by' =>request('sort_by'),
                                 'paginate'=>request('paginate'),
                                 'search'=>request('search'),
                               ));
        return view('admin.setting.list',[
            'settings'=>$settings,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // { 
    //   return view('/admin/setting/add');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  //   public function store(SettingRequest $request)
  //   {
  //      $setting=new Setting;
  //       $setting->key=$request->key;
  //       $setting->name=$request->name;
  //       $setting->description=$request->description;
  //       $setting->value=$request->value;
  //       $setting->field="";
  //       $setting->status=$request->status;
  //       $setting->save();
  // try{
  //       $ip = $this->getRequestIP();
  //       $this->doActivityLog(                                    
  //         $setting,
  //         Auth::user(),
  //         ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
  //         'LOGNAME_SETTING_UPDATED',
  //         'Settings Updated'
  //       );

  //    }
  //   catch(Exception $e)
  //         {
             
  //           dd($e->getMessage());
  //         }
     
        
  //       return redirect('/admin/setting')->with(['success'=>'Add setting successfully']);
  //   }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $setting=Setting::where('id',$id)->first();
       return view('admin.setting.edit',[
         'setting'=>$setting,
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingRequest $request, $id)
    {//dd($request);
        $setting=Setting::where('id',$id)->first();
        $setting->key=$request->key;
        $setting->name=$request->name;
        $setting->description=$request->description;
        $setting->value=$request->value;
        $setting->field="";
        $setting->status=$request->status;
        $setting->save();

         try{
        $ip = $this->getRequestIP();
        $this->doActivityLog(                                    
          $setting,
          Auth::user(),
          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
          'LOGNAME_SETTING_UPDATED',
          'Settings Updated'
        );

     }
    catch(Exception $e)
          {
             
            //dd($e->getMessage());
          }
     
        return redirect('/admin/setting')->with(['success'=>'Updated successfully']);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Setting::where('id',$id)->delete();

         return redirect('/admin/setting')->with(['success'=>'The setting deleted successfully']);
    }
}
