<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyerOrder extends Model
{
    protected $fillable = ['code','buyer_id','quantity','price','commodity_id','state_id','start_date','end_date','delivery_location'];
    protected $table = 'buyer_order';
    public function state()
    {
        return $this->belongsTo('App\State');
    }
    public function buyer()
    {
        return $this->belongsTo('App\Buyer');
    }
    public function commodity()
    {
        return $this->belongsTo('App\commodity');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function orderMapping()
    {
        return $this->hasMany('App\OrderMapping');
    }

}

