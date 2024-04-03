<?php

namespace App\Models;

use App\Enums\Sorting;
use App\Models\Conserns\Withfilter;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class clients extends Model
{
    use HasFactory , LogsActivity ,HasUlids, Withfilter;
    
    protected $guarded = [];
    
    protected static $logAttributes = ['status'];


    protected static $logOnlyDirty = true;

    protected static $filterFiled = [
        [
            "lable" => "مخفي",
            "orderType" => Sorting:: EQULE, 
            "value" => 1, 
            "name" => "status"
        ],
        [
            "lable" => "غير مخفي",
            "orderType" => Sorting::EQULE, 
            "value" => 2, 
            "name" => "status"
        ],
        [
            "lable" => "الاقدم",
            "orderType" => Sorting::ASC, 
            "value" => 3, 
            "name" => "created_at"
        ],
        
        [
            "lable" => "الاحدث",
            "orderType" => Sorting::NEWEST, 
            "value" => 4, 
            "name" => "created_at"
        ],
    
    
    ];

    protected static $filterByRelation = ['toUser','fromUser'];

    protected static $searchField = ['name', 'des'];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['status'])->useLogName('clients');
    }

}
