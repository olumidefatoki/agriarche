<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'delivery';
    public function logistics()
    {
        return $this->belongsTo('App\Logistics');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function approvalStatus()
    {
        return $this->belongsTo('App\Status');
    }
}
