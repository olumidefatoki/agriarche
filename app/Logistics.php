<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logistics extends Model
{
    protected $table = 'logistics';

    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function commodity()
    {
        return $this->belongsTo('App\Commodity');
    }
    public function aggregator()
    {
        return $this->belongsTo('App\Aggregator');
    }
    public function buyerOrder()
    {
        return $this->belongsTo('App\BuyerOrder');
    }
}
