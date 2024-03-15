<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class TasksNotify extends Model
{
    use HasFactory , LogsActivity;
    protected $guarded = [];

    protected static $logName = 'TasksNotify';

    protected static $logAttributes = ['type','user_id','name','number','issueAt','duration'];
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

}
