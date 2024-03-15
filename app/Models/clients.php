<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class clients extends Model
{
    use HasFactory , LogsActivity;
    
    protected $guarded = [];
    
    protected static $logAttributes = ['status'];

    protected static $logName = 'clients';

    protected static $logOnlyDirty = true;

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

}
