<?php

namespace App\Http\Controllers\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Exception;
use App\Http\Requests\ContactRequest;
use App\Traits\Common;
use App\Traits\LogActivity;
use Auth;
 
class ContactController extends Controller
{  use Common,LogActivity;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
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
    public function store(ContactRequest $request)
    {
        $res=[];
        try
        {
            $contact=new Contact();
            $contact->name=$request->name;
            $contact->email=$request->email;
            $contact->contactnumber=$request->contactno;
            $contact->query=$request->get('query');
            $contact->save();

            $res['message']='Saved Successfully,We will contact you soon.';


             try{
        $ip = $this->getRequestIP();
        $this->doActivityLog(                                    
          $setting,
          Auth::user(),
          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
          'LOGNAME_CONTACT_STORED',
          'Contact Stored'
        );

     }
    catch(Exception $e)
          {
             
            //dd($e->getMessage());
          }
     
            return $res;
        }
        catch(Exception $e)
        {
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
