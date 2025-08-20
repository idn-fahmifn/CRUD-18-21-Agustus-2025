<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'barang';
    protected $guarded;

    // relasi one to many
    public function tempat()
    {
        return $this->belongsTo(Tempat::class, 'tempat_id');
    }


}
