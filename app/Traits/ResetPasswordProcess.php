<?php 

namespace App\Traits;

use Exception;
use Carbon\Carbon;
use App\Mail\ResetPassword;
use Illuminate\Support\Facades\Mail;
// use App\Events\AfterNotification;
// use App\Notifications\ResetPasswordNotification;
use DB;
use Hash;

trait ResetPasswordProcess 
{   
  public function resetPasswordToBuyerUser($model)
  {
    $token = str_random(64);       
    $password = \DB::table(config('auth.passwords.users.table'))->insert([
      'email' => $model->email, 
      'token' => Hash::make($token),
      'created_at' => Carbon::now()
    ]);       
    
    if($password) 
    {
      $message = (new ResetPassword($model,$token))->onQueue('email');
      Mail::to($model->email)->queue($message);             
    }
    // $model->notify(new ResetPasswordNotification($model));
    // event(new AfterNotification()); 
  }
}