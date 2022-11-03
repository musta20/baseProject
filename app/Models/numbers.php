<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class numbers extends Model
{
    use HasFactory , LogsActivity;


    protected $guarded = [];

    protected $table = "numbers";

    protected static $logAttributes = ['title','number','img'];

    protected static $logName = 'numbers';



}
