<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class job_app extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $table = "job_apps";
}
