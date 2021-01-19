<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProcessorOrderHistory extends Model
{
    protected $fillable = ['processor_order_id', 'processor_id', 'quantity', 'price', 'commodity_id', 'state_id', 'updated_by'];
    protected $table = 'processor_order_history';
}
