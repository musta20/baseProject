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



    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logonly(['name'])->useLogName('SalesType');
    }

}
