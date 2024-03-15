<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class slide extends Model
{
    use HasFactory , LogsActivity;


    protected $guarded = [];

    protected $table = "slide";

    protected static $logAttributes = ['des','url','title','img'];

    protected static $logName = 'services';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
