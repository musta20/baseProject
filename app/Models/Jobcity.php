<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Jobcity extends Model
{
    use HasFactory , HasUlids , LogsActivity;

    protected $guarded = [];

    protected $table = 'job_cities';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['name'])->useLogName('Jobcity');
    }
}
