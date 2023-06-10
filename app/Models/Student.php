<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        //
    ];
    public $timestamps = true;

    protected $guarded = [
        'id'
    ];

    protected $with = [
        'user',
    ];

    public function user(){
        return $this->belongsTo(user::class);
    }

    public function family(){
        return $this->belongsTo(family::class);
    }

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function absences(){
        return $this->hasMany(Absence::class);
    }

    public function inscriptions(){
        return $this->hasMany(Inscription::class);
    }
}
