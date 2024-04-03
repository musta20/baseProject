<?php

namespace App\Models;

use App\Enums\Sorting;
use App\Models\Conserns\Withfilter;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class job_app extends Model
{
    use HasFactory , LogsActivity , HasUlids , Withfilter;
    protected $guarded = [];

    protected $table = "job_apps";

    public function job()
    {
        return $this->belongsTo(jobs::class,'job_id','id');
    }

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
            "value" => 1, 
            "name" => "created_at"
        ],
    
    
    ];

    protected static $filterByRelation = ['job'];

    protected static $searchField = ['code', 'name','email'];




    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
