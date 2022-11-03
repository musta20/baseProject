<?php

use App\Models\message;
use App\Models\Tasks;
use Illuminate\Support\Facades\Auth;

if(!function_exists('getNotif'))
{
    function getNotif()
    {
      //  message::where*
     $task= count(Tasks::where('user_id',Auth::user()->id)->where('isread',0)->get());
       $msg =  count(message::where('to',Auth::user()->id)->where('isred',0)->get());

       return $task+$msg;
    }
    
}


?>