<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hopital extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];
    
    public function patient(){
        return $this->belongsTo('App\Patient');
    }
}
