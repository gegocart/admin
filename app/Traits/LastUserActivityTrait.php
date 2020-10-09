<?php 

namespace App\Traits;

use Exception;
use Carbon\Carbon;
use DB;
use App\Models\User;
 

trait LastUserActivityTrait 
{   
  public function lastUserActivity($model)
  {
    $user=User::where('id',$model->id)->first();
    $user->login_status=1;
    $user->last_login_at=null;
    $user->save();
  }
}