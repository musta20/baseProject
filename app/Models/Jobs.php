<?php

namespace App\Models;

use App\Enums\Sorting;
use App\Models\Conserns\WithFilter;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Jobs extends Model
{
    use HasFactory, HasUlids, LogsActivity, WithFilter;

    protected static $filterFiled = [
        [
            'lable' => 'الاقدم',
            'orderType' => Sorting::ASC,
            'value' => 0,
            'name' => 'created_at',
        ],

        [
            'lable' => 'الاحدث',
            'orderType' => Sorting::NEWEST,
            'value' => 1,
            'name' => 'created_at',
        ],

    ];

    protected static $filterByRelation = [''];

    protected static $searchField = ['title', 'message'];

    protected $guarded = [];

    protected $table = 'jobs';

    public function city(): BelongsTo
    {
        return $this->belongsTo(Jobcity::class, 'job_cities_id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['title', 'des', 'job_cities_id'])->useLogName('jobs');
    }
}
