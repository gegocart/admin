<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\EditMaitTemplateRequest;
use App\Models\Mailtemplate;
use App\Traits\Common;
use App\Traits\LogActivity;
use Auth;
use Exception;
   
class MailTemplateController extends Controller
{  use Common,LogActivity;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mailtemplates=Mailtemplate::paginate(5);

        return view('admin.mailtemplate.list',[
            'mailtemplates'=>$mailtemplates,
        ]);
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
        //
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
         $mailtamplate=Mailtemplate::where('id',$id)->first();

         return view('admin.mailtemplate.edit',[
            'mailtamplate'=>$mailtamplate,
            
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditMaitTemplateRequest $request, $id)
    {
        //dd($request);
         $mailtamplate=Mailtemplate::where('id',$id)->first();
         $mailtamplate->subject=$request->subject;
         $mailtamplate->mail_content=$request->mail_content;
         $mailtamplate->status=$request->status;     
         $mailtamplate->save();
           try{
        $ip = $this->getRequestIP();
        $this->doActivityLog(                                    
          $mailtamplate,
          Auth::user(),
          ['ip' => $ip, 'details' => $_SERVER['HTTP_USER_AGENT']],
          'LOGNAME_MAIL_TEMPLATE_UPDATED',
          'Mail Template Updated'
        );

     }
    catch(Exception $e)
          {
             
            //dd($e->getMessage());
          }
         return redirect('/admin/mailtemplates')->with(['success'=>'Mail template updated successfully']);    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
