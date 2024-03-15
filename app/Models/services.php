<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class services extends Model
{
    use HasFactory , LogsActivity;

    protected $guarded = [];

    protected $table = "services";

    protected static $logAttributes = ['name','price','des'];

    protected static $logName = 'services';


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }



}
