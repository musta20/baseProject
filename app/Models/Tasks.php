<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Tasks extends Model
{
    use HasFactory , LogsActivity , HasUlids;

    protected $guarded = [];

    protected static $logAttributes = ['title','des','user_id'];

    protected static $logName = 'social';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }



}
