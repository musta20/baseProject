<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pymtoserv extends Model
{
    use HasFactory , HasUlids;
    protected $guarded = [];

    public function pym()
    {
        return $this->belongsTo(Payment::class, 'payment_id', 'id');
    }
}
