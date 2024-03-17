<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class jobs extends Model
{
    use HasFactory, LogsActivity,HasUlids;
    protected $guarded = [];

    protected $table = "jobs";

    protected static $logAttributes = ['title','des', 'job_cities_id'];

    protected static $logName = 'jobs';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

}
