<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public function tumeurs()
    {
        return $this->hasMany('App\Tumeur');
    }
    public function hopitals()
    {
        return $this->hasMany('App\Hopital');
    }
    public function suivres()
    {
        return $this->hasMany('App\Suivre');
    }
}
