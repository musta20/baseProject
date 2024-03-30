<?php

namespace App\Models;

use App\Models\Conserns\Withfilter;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class services extends Model
{
    use HasFactory , LogsActivity , HasUlids , Withfilter;

    protected $guarded = [];

    protected $table = "services";

    
    protected static $filterFiled ="ss";

    protected static $filterByRelation = ['category'];
    
    protected static $searchField = ['name','des'];
    
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['name','price','des'])->useLogName('services');
    }

    public function category(){

        return $this->belongsTo(category::class);
    }

    public function payments(): BelongsToMany
    {
        return $this->belongsToMany(payment::class, 'pym_to_servs', 'service_id', 'payment_id');
    }

    public function files(): HasMany{

        return $this->hasMany(RequiredFiles::class, 'service_id', 'id');
    }
    public function deliveries(): BelongsToMany
    {
        return $this->belongsToMany(delivery::class, 'dev_to_servs', 'service_id', 'delivery_id');
    }


}
