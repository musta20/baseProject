<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class social extends Model
{
    use HasFactory , LogsActivity;


    protected $guarded = [];

    protected $table = "social";

    protected static $logAttributes = ['url','img'];

    protected static $logName = 'social';

}
