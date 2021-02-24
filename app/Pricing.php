<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pricing extends Model
{
    protected $fillable = ['processor_order_id', 'aggregator_id', 'price', 'created_by', 'commission'];
    protected $table = 'pricing';
    public function aggregator()
    {
        return $this->belongsTo('App\Aggregator');
    }
    public function processorOrder()
    {
        return $this->belongsTo('App\ProcessorOrder');
    }
    public function processor()
    {
        return $this->belongsTo('App\Processor');
    }
}
