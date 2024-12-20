<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Devtoserv extends Model
{
    use HasFactory;
    use HasUlids;
    protected $guarded = [];

    public function dev()
    {
        return $this->belongsTo(Delivery::class, 'delivery_id', 'id');
    }
}
