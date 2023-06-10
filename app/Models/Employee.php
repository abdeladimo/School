<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'salaire',
        'date_embauche',
    ];

    public function prof()
    {
        return $this->hasOne(prof::class);
    }

    public function surveillant_generale()
    {
        return $this->hasOne(Surveillant_Generale::class);
    }

    public function admin(){
        return $this->hasOne(Admin::class);
    }
}
