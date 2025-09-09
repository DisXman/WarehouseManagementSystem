<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Istif extends Model
{
    protected $table = 'istifs';
    protected $fillable  = ['istif_name', 'depo_id'];

    public function depo()
    {
        return $this->belongsTo(Depo::class);
    }

    public function urunler()
    {
        return $this->hasMany(Urun::class);
    }
}
