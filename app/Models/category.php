<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class category extends Model
{
    use HasFactory , LogsActivity;

    protected $guarded = [];

    protected $table = "category";

    protected static $logAttributes = ['title', 'des'];

    protected static $logName = 'category';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

}
