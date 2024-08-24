<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Musta20\LaravelRecordsFilter\HasFilter;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Order extends Model
{
    use HasFactory , HasFilter , HasUlids , LogsActivity;

    protected static $recordEvents = ['updated'];

    protected $guarded = [];

    protected $table = 'order';

    public function relationsFilterOptions()
    {
        return [
            [
                'label' => 'الخدمة',
                'label_filed' => 'name',
                'id' => 'service_id',
                'model' => 'App\Models\Services',
            ],
            [
                'label' => 'الموظف',
                'label_filed' => 'name',
                'id' => 'user_id',
                'model' => 'App\Models\User',
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

        ];
    }

    public function searchFields()
    {
        return [
            'name',
            'title',
            'des',
        ];
    }

    public function filterOptions()
    {

        return [
            [
                'label' => 'المراجعة',
                'type' => 'checkbox',
                'filed' => 'status',
                'operation' => '=',
                'options' => [
                    __('messages.NEW_ORDER') => 0,
                    __('messages.ORDER_RECEIVED') => 1,
                    __('messages.COMPLETED_ORDER') => 2,
                    __('messages.DELIVERED_ORDER') => 3,
                    __('messages.CANCLED_ORDER') => 4,
                ],
            ],

        ];
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['status', 'payed', 'img'])->useLogName('order');
    }

    public function servicesNmae()
    {
        return $this->belongsTo(Services::class, 'service_id', 'id');
    }

    public function services()
    {
        return $this->belongsTo(Services::class, 'service_id', 'id');
    }

    public function pym()
    {
        return $this->belongsTo(Payment::class, 'cash', 'id');
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }

    public function delivery()
    {
        return $this->belongsTo(Delivery::class, 'delivery_id', 'id');
    }

    public function dev()
    {
        return $this->belongsTo(Delivery::class, 'receipt', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
