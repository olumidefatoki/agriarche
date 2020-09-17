<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model

{
    protected $table = 'status';

    public function buyerOrder()
    {
        return $this->hasMany('App\BuyerOrder');
    }
    public function logistics()
    {
        return $this->hasMany('App\Logistics');
    }
}
