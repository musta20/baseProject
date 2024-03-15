<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Report extends Model
{
    use HasFactory , LogsActivity;

    protected $guarded = [];

    protected static $logAttributes = ['reporttype'];

    protected static $logName = 'Report';
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

}
