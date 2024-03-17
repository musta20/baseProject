<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class services extends Model
{
    use HasFactory , LogsActivity , HasUlids;

    protected $guarded = [];

    protected $table = "services";

    protected static $logAttributes = ['name','price','des'];

    protected static $logName = 'services';


    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    public function payments(): BelongsToMany
    {
        return $this->belongsToMany(payment::class, 'pym_to_servs', 'service_id', 'payment_id');
    }

    public function deliveries(): BelongsToMany
    {
        return $this->belongsToMany(delivery::class, 'dev_to_servs', 'service_id', 'delivery_id');
    }


}
