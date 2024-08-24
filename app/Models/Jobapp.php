<?php

namespace App\Models;

use App\Enums\Sorting;
use App\Models\Conserns\WithFilter;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Jobapp extends Model
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

    protected static $filterByRelation = ['job'];

    protected static $searchField = ['code', 'name', 'email'];

    protected $guarded = [];

    protected $table = 'Jobapps';

    public function job()
    {
        return $this->belongsTo(Jobs::class, 'job_id', 'id');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }
}
