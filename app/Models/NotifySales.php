<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class NotifySales extends Model
{
    use HasFactory , LogsActivity;
    
    protected $guarded = [];


    protected static $logAttributes = ['name'];

    protected static $logName = 'NotifySales';

    public function user()
    {
        return $this->belongsTo(User::class,'from','id');
    }



}
