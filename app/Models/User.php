<?php

namespace App\Models;

use App\Enums\Sorting;
use App\Models\Conserns\WithFilter;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles,HasUlids , LogsActivity , Notifiable , WithFilter;

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
            'value' => 3,
            'name' => 'created_at',
        ],

    ];

    protected static $filterByRelation = 'user';

    protected static $searchField = ['name', 'email'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'admin',
    ];

    /*     public function message()
        {
            return $this->hasOneThrough(
                message::class,
                'from', // Foreign key on the cars table...
            );
            return $this->hasOneThrough(
                message::class,
                'to', // Foreign key on the cars table...
            );
        } */
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logonly(['name', 'email'])->useLogName('User');
    }
}
