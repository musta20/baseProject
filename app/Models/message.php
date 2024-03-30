<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class message extends Model
{
    use HasFactory , LogsActivity,HasUlids;

    protected $guarded = [];

  
    protected $table = "message";


/*     public function userable()
    {
        return $this->morphOne(User::class, 'userable');
    } */

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['from','to','title', 'message'])->useLogName('message');
        ;
    }
    
    public function toUser()
    {
        return $this->belongsTo(User::class,'to','id');
    }
    public function fromUser()
    {
        return $this->belongsTo(User::class,'from','id');
    }

 
    



}
