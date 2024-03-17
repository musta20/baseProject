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

    protected static $logName = 'TasksNotify';

    protected static $logAttributes = ['type','user_id','name','number','issueAt','duration'];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
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
