<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pym_to_serv extends Model
{
    use HasFactory , HasUlids;
    protected $guarded = [];

    public function pym()
    {
        return $this->belongsTo(payment::class,'payment_id','id');
    }

}
