<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustmerSlide extends Model
{
    use HasFactory ,HasUlids;

    protected static $logAttributes = ['url', 'img'];

    protected $guarded = [];

}
