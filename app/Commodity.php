<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commodity extends Model
{
    public $timestamps = false;
    protected $table = 'commodity';
    public function buyerOrder()
    {
        return $this->hasMany('App\BuyerOrder');
    }
    public function logistics()
    {
        return $this->hasMany('App\Logistics');
    }
}
