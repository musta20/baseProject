<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class jobs extends Model
{
    use HasFactory, LogsActivity;
    protected $guarded = [];

    protected $table = "jobs";

    protected static $logAttributes = ['title','des', 'city_id'];

    protected static $logName = 'jobs';

}
