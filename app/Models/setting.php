<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class setting extends Model
{
    use HasFactory , LogsActivity;
    protected $guarded = [];

    protected $table = "setting";

    protected static $logAttributes = ['title', 'des', 'keyword', 'map', 'terms', 'phone', 'adress', 'email', 'billterm', 'footer', 'footertext'];

    protected static $logName = 'setting';

}
