<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';

    public function buyer()
    {
        return $this->hasMany('App\Buyer');
    }
    public function aggregator()
    {
        return $this->hasMany('App\Aggregator');
    }
}
