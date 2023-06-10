<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inscription extends Model
{
    protected $fillable = [
        //
    ];
    public $timestamps = true;

    protected $guarded = [
        'id'
    ];

    public function student(){
        return $this->belongsTo(Student::class);
    }

    public function classes(){
        return $this->hasMany(Classe::class);
    }
}
