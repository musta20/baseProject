<?php

namespace App\Models;

use App\Models\Conserns\WithFilter;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Category extends Model
{
    use HasFactory , HasUlids, LogsActivity , WithFilter;

    protected $guarded = [];

    protected $table = 'category';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()->logOnly(['title', 'des'])->useLogName('category');
    }

    public function services(): HasMany
    {

        return $this->hasMany(services::class, 'category_id');
    }
}
