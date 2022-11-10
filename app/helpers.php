<?php

use App\Models\message;
use App\Models\Tasks;
use Illuminate\Support\Facades\Auth;

if(!function_exists('getNotif'))
{
    function getNotif()
    {
      //  message::where*
     $task= Tasks::where('user_id',Auth::user()->id)->where('isread',0)->get();
      $msg =  message::where('to',Auth::user()->id)->where('isred',0)->get();
      $all = count($task)+count($msg);
       return ["all"=>$all,
       "task"=>$task,
       "msg"=>$msg];
    }
    
}


?>