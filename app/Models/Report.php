<?php

namespace App\Models;

use App\Enums\Sorting;
use App\Models\Conserns\Withfilter;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Report extends Model
{
    use HasFactory , LogsActivity , HasUlids, Withfilter;

    protected $guarded = [];


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
        return LogOptions::defaults()->logOnly(['reporttype'])->useLogName('report');
    }

}
