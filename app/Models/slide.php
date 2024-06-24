<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class slide extends Model
{
    use HasFactory , HasUlids , LogsActivity;

    protected $guarded = [];

    protected $table = 'slide';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['des', 'url', 'title', 'img'])->useLogName('services');
    }
}
