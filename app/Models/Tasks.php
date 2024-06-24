<?php

namespace App\Models;

use App\Enums\Sorting;
use App\Models\Conserns\Withfilter;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Tasks extends Model
{
    use HasFactory, HasUlids, LogsActivity, Withfilter;

    protected static $filterFiled = [
        [
            'lable' => 'لم يستلم المهمة بعد',
            'orderType' => Sorting::EQULE,
            'value' => 0,
            'name' => 'isdone',
        ],
        [
            'lable' => 'بداء العمل عليها',
            'orderType' => Sorting::EQULE,
            'value' => 1,
            'name' => 'isdone',
        ],
        [
            'lable' => 'الاحدث',
            'orderType' => Sorting::NEWEST,
            'value' => 3,
            'name' => 'created_at',
        ],

    ];

    protected static $filterByRelation = 'user';

    protected static $searchField = ['title', 'des'];

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logonly(['title', 'des', 'user_id'])->useLogName('task');
    }
}
