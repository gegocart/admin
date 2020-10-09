<?php

namespace app\Traits;
use App\Models\User;
 

trait RegisterUserTrait
{
    public function createUser($userarr)
    {
    	 
        $user=new User;
        $user->name= $userarr['name'];
        $user->email= $userarr['email'];
        $user->password=$userarr['password'];
        $user->usergroup_id= $userarr['usergroup_id'];
        $user->token=sha1(time());
        $user->save();

        return $user;

    }
}
  