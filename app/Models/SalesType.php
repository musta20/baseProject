<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class SalesType extends Model
{
    use HasFactory, LogsActivity , HasUlids;
    
    protected $guarded = [];


    protected static $logAttributes = ['name'];

    protected static $logName = 'SalesType';


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

}
