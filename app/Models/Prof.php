<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\matiere;

/**
 * @property integer $id
 * @property integer $user_id
 
 */
class Prof extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['user_id'];
    protected $with = [
        'user',
    ];
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function classes(){
        return $this->hasMany(Classe::class);
    }
    public function matiere(){
        return $this->belongsTo(matiere::class);
    }
    public function seances(){
        return $this->hasMany(Seance::class);
    }
}
