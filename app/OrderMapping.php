<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderMapping extends Model
{
    protected $table = 'order_mapping';
    protected $fillable = ['buyer_order_id','aggregator_id','price'];
    public function aggregator()
    {
        return $this->belongsTo('App\Aggregator');
    }
    public function buyerOrder()
    {
        return $this->belongsTo('App\BuyerOrder');
    }
}
