<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PricingHistory extends Model
{
    protected $fillable = ['pricing_id', 'processor_order_id', 'aggregator_id', 'price', 'updated_by', 'created_at', 'commission'];
    protected $table = 'pricing_history';
}
