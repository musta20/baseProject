<?php

namespace App\Models;

use App\Models\Conserns\Withfilter;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class category extends Model
{
    use HasFactory , LogsActivity, HasUlids , Withfilter;


    protected $guarded = [];

    protected $table = "category";



    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['title', 'des'])->useLogName('category');
    }

}
