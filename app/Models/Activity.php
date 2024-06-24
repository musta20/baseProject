<?php

namespace App\Models;

use App\Enums\Sorting;
use App\Models\Conserns\Withfilter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Models\Activity as ActivityModel;

class Activity extends ActivityModel
{
    use HasFactory , Withfilter;

    protected static $filterFiled = [
        [
            'lable' => 'نوع الاجراء:إدخال',
            'orderType' => Sorting::EQULE,
            'value' => 'created',
            'name' => 'description',
        ],
        [
            'lable' => 'نوع الاجراء:تحديث',
            'orderType' => Sorting::EQULE,
            'value' => 'updated',
            'name' => 'description',
        ],

        [
            'lable' => 'الاقدم',
            'orderType' => Sorting::ASC,
            'value' => 3,
            'name' => 'created_at',
        ],

        [
            'lable' => 'الاحدث',
            'orderType' => Sorting::NEWEST,
            'value' => 4,
            'name' => 'created_at',
        ],

    ];

    protected static $searchField = ['log_name'];

    protected $casts = [
        'properties' => 'collection',
    ];

}
