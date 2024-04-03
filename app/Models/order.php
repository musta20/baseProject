<?php

namespace App\Models;

use App\Enums\Sorting;
use App\Models\Conserns\Withfilter;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class order extends Model
{
    use HasFactory , LogsActivity , HasUlids , Withfilter;


    protected $guarded = [];

    protected $table = "order";



    protected static $recordEvents = ['updated'];




    protected static $filterFiled = [
        [
            "lable" => "الاقدم",
            "orderType" => Sorting::ASC, 
            "value" => 0, 
            "name" => "created_at"
        ],
      
        [
            "lable" => "الاحدث",
            "orderType" => Sorting::NEWEST, 
            "value" => 3, 
            "name" => "created_at"
        ],
    
    
    ];

    protected static $filterByRelation = ['services','user'];
    protected static $searchField = ['title', 'des','title'];






    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['status','payed','img'])->useLogName('order');
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
