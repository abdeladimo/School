<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Family extends Model
{
    protected $fillable = [
        //
    ];
    public $timestamps = false;

    protected $guarded = [
        'id'
    ];

    public function user(){
        return $this->belongsTo(user::class);
    }

    public function students()
    {
        return $this->hasMany(student::class);
    }

}
