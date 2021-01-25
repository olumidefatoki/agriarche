<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessorOrder extends Model
{
    protected $fillable = [
        'code', 'processor_id', 'quantity', 'price', 'commodity_id', 'updated_by', 'state_id', 'start_date', 'end_date', 'delivery_location'
    ];
    protected $table = 'processor_order';
    public function state()
    {
        return $this->belongsTo('App\State');
    }
    public function processor()
    {
        return $this->belongsTo('App\Processor');
    }
    public function commodity()
    {
        return $this->belongsTo('App\commodity');
    }
    public function status()
    {
        return $this->belongsTo('App\Status');
    }
    public function logistics()
    {
        return $this->hasMany('App\Logistics');
    }
}
