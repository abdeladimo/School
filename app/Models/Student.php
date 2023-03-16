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
    public $timestamps = false;

    protected $guarded = [
        'id'
    ];
    public function departement()
    {
        return $this->belongsTo(departement::class);
    }

    public function user(){
        return $this->belongsTo(user::class);
    }
}
