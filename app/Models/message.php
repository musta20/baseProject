<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class message extends Model
{
    use HasFactory , LogsActivity;

    protected $guarded = [];

    protected static $logAttributes = ['from','to','title', 'message'];

    protected static $logName = 'message';
  
    protected $table = "message";


/*     public function userable()
    {
        return $this->morphOne(User::class, 'userable');
    } */

    public function too()
    {
        return $this->belongsTo(User::class,'to','id');
    }
    public function fromm()
    {
        return $this->belongsTo(User::class,'from','id');
    }

  /*   public function sender() {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
    public function receiver() {
        return $this->belongsTo('App\Models\User', 'receiver_id');
    } */

    




/*     public function messagetable()
    {
        return $this->morphTo();
    } */

}
