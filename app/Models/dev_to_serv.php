<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dev_to_serv extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function dev()
    {
        return $this->belongsTo(delivery::class,'dev_id','id');
    }
}
