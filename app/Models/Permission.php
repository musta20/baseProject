<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Models\Permission as SpatieModels;

class Permission extends SpatieModels
{
    use HasFactory;
    use HasUlids;
    //protected $primaryKey = 'id';

}
