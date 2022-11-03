<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class RequiredFiles extends Model
{
    use HasFactory , LogsActivity;
    
    protected $guarded = [];


    protected static $logAttributes = ['name','service_id','type'];

    protected static $logName = 'RequiredFiles';

}
