<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class setting extends Model
{
    use HasFactory , HasUlids , LogsActivity;
    protected $guarded = [];

    protected $table = 'setting';

    /**
     * Returns the log options for the activity log.
     *
     * This method returns a LogOptions instance, which specifies which
     * attributes of the model should be logged when the model is updated.
     *
     * @return \Spatie\Activitylog\LogOptions The log options.
     */
    public function getActivitylogOptions(): LogOptions
    {
        // Return the log options, which specify which attributes of the model
        // should be logged when the model is updated.
        return LogOptions::defaults()
            // Log only the specified attributes.
            ->logOnly([
                'title', 'des', 'keyword', 'map', 'terms', 'phone',
                'adress', 'email', 'billterm', 'footer', 'footertext',
            ])->useLogName('setting');
    }
}
