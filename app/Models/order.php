<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class order extends Model
{
    use HasFactory , LogsActivity;


    protected $guarded = [];

    protected $table = "order";


    protected static $logAttributes = ['status','payed','img'];

    protected static $logName = 'order';

    protected static $recordEvents = ['updated'];

    public function servicesNmae()
    {
        return $this->belongsTo(services::class,'s_id','id');
    }
    public function pym()
    {
        return $this->belongsTo(payment::class,'cash','id');
    }

    public function dev()
    {
        return $this->belongsTo(delivery::class,'receipt','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'empy_id','id');
    }




}
