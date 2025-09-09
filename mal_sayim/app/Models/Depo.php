<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Depo extends Model
{
    protected $table = 'depolar';
    protected $fillable = ['depo_adi'];

    public function istifler()
    {
        return $this->hasMany(Istif::class);        
    }
}
