<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Musta20\LaravelRecordsFilter\HasFilter;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class services extends Model
{
    use HasFactory, HasFilter, HasUlids, LogsActivity;

    protected $guarded = [];

    protected $table = 'services';

    public function relationsFilterOptions()
    {
        return [
            [
                'label' => 'الفئة',
                'label_filed' => 'title',
                'id' => 'category_id',
                'model' => 'App\Models\category',
            ],
        ];

    }

    public function sortFilterOptions()
    {

        return [
            [
                'lable' => 'الاقدم',
                'type' => 'ASC',
                'filed' => 'created_at',
            ],

            [
                'lable' => 'الاحدث',
                'type' => 'DESC',
                'filed' => 'created_at',
            ],
            [
                'lable' => ' السعر:الاعلى الى الاقل',
                'type' => 'DESC',
                'filed' => 'price',
            ],
            [
                'lable' => ' السعر:الاقل الى الاعلى',
                'type' => 'ASC',
                'filed' => 'price',
            ],

        ];
    }

    public function searchFields()
    {
        return [
            'name',
            'des',
        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['name', 'price', 'des'])->useLogName('services');
    }

    public function category()
    {

        return $this->belongsTo(category::class);
    }

    public function payments(): BelongsToMany
    {
        return $this->belongsToMany(payment::class, 'pym_to_servs', 'service_id', 'payment_id');
    }

    public function files(): HasMany
    {

        return $this->hasMany(RequiredFiles::class, 'service_id', 'id');
    }

    public function deliveries(): BelongsToMany
    {
        return $this->belongsToMany(delivery::class, 'dev_to_servs', 'service_id', 'delivery_id');
    }
}
