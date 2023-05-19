<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;

    protected $with = [
        'prof',
        'classe',
        'salle',
    ];

    public function prof(){
        return $this->belongsTo(Prof::class);
    }
    public function classe(){
        return $this->belongsTo(Classe::class);
    }
    public function salle(){
        return $this->belongsTo(Salle::class);
    }
}
