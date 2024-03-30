<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class TasksNotify extends Model
{
    use HasFactory , LogsActivity , HasUlids;
    protected $guarded = [];


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logonly(['type','user_id','name','number','issueAt','duration'])->useLogName('tasknotify');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function from()
    {
        return $this->belongsTo(User::class,'from','id');
    }


}
