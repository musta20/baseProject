<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pym_to_serv extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function pym()
    {
        return $this->belongsTo(payment::class,'pym_id','id');
    }

}
