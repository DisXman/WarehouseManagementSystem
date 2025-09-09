<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Urun extends Model
{
    protected $table = 'urunler';
    protected $fillable = ['istif_id', 'name', 'count'];
    
    public function istif()
    {
        return $this->belongsTo(Istif::class);
    }
}
