<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class job_app extends Model
{
    use HasFactory , LogsActivity , HasUlids;
    protected $guarded = [];

    protected $table = "job_apps";

    public function job()
    {
        return $this->belongsTo(jobs::class,'job_id','id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
