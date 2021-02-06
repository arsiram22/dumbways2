<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    use HasFactory;

    public $timestamps = false;


    public function cycle()
    {
        return $this->hasMany(Cycle::class);
    }

}
