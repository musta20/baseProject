<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class order extends Model
{
    use HasFactory , LogsActivity , HasUlids;


    protected $guarded = [];

    protected $table = "order";


    protected static $logAttributes = ['status','payed','img'];

    protected static $logName = 'order';

    protected static $recordEvents = ['updated'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function servicesNmae()
    {
        return $this->belongsTo(services::class,'service_id','id');
    }

    public function services()
    {
        return $this->belongsTo(services::class,'service_id','id');
    }
    public function pym()
    {
        return $this->belongsTo(payment::class,'cash','id');
    }

    public function payment()
    {
        return $this->belongsTo(payment::class,'payment_id','id');
    }

    public function delivery()
    {
        return $this->belongsTo(delivery::class,'delivery_id','id');
    }
    public function dev()
    {
        return $this->belongsTo(delivery::class,'receipt','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }




}
