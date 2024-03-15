<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class payment extends Model
{
    use HasFactory , LogsActivity;

    protected $guarded = [];

    protected static $logAttributes = ['name'];

    protected static $logName = 'payment';
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
