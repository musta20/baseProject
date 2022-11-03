<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Tasks extends Model
{
    use HasFactory , LogsActivity;

    protected $guarded = [];

    protected static $logAttributes = ['title','des','user_id'];

    protected static $logName = 'social';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }



}
