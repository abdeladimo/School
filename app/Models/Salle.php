<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salle extends Model
{
    use HasFactory;
    protected $fillable = ['salle_number'];

    public function seances(){
        return $this->hasMany(Seance::class);
    }
}
