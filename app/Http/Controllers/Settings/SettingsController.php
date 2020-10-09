<?php

namespace App\Http\Controllers\Settings;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\User;
use File;
use Illuminate\Http\Request;
use App\Models\ActivityLog;

use App\Http\Resources\ActiveLogResource;


class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getActiveLog()
    {
       $activityLog=ActivityLog::where('causer_id',Auth::id())->paginate(2);

       return ActiveLogResource::collection($activityLog);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        //dd($request->avatar);
        try
        {
            if($request->avatar!="null")
            { 
                $user =User::where('id',Auth::id())->first();
                if($user->image!="")
                {
                    $oldimage=$user->image;
                    File::delete('profile/'.$user->image);
                }
                $imageName = $user->name.time().'.'.request()->avatar->getClientOriginalExtension();
                request()->avatar->move(public_path('profile'), $imageName);
                $user->image = 'profile/'.$imageName;
                $user->save();    
            }
            $response['message']="The profile image is updated successfully";
            return $response;
      }
        catch(Exception $e)
        {
            //dd($e->getMessage());
          $res['message']=$e->getMessage();
          return $res;
        }
    }

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
