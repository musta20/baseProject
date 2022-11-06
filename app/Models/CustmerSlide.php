<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustmerSlide extends Model
{
    use HasFactory;

        
    protected $guarded = [];


    protected static $logAttributes = ['url','img'];

    protected static $logName = 'CustmerSlide';

}
