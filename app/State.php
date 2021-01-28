<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $table = 'state';

    public function buyer()
    {
        return $this->hasMany('App\Buyer');
    }
    public function buyerOrder()
    {
        return $this->hasMany('App\BuyerOrder');
    }
    public function logisticsCompany()
    {
        return $this->hasMany('App\LogisticsCompany');
    }
    public function logistics()
    {
        return $this->hasMany('App\Logistics');
    }
}
