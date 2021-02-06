<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk', 'id');
    }
    public function cart()
    {
        return $this->hasMany(Cart::class, 'id_cycle');
    }


}
