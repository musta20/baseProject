<?php

namespace App\Models;

use App\Enums\Sorting;
use App\Models\Conserns\WithFilter;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Message extends Model
{
    use HasFactory , HasUlids , LogsActivity , WithFilter;

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

    protected static $filterByRelation = ['toUser', 'fromUser'];

    protected static $searchField = ['title', 'message'];

    protected $guarded = [];

    protected $table = 'message';

    /*
        public function userable()
    {
        return $this->morphOne(User::class, 'userable');
    }

    */

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['from', 'to', 'title', 'message'])->useLogName('message');

    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to', 'id');
    }

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from', 'id');
    }
}
