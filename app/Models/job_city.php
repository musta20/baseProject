<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class job_city extends Model
{
    use HasFactory , LogsActivity;

    protected $guarded = [];

    protected static $logAttributes = ['name'];

    protected static $logName = 'job_city';
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
