<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aggregator extends Model
{
    protected $fillable = [
        'name', 'address', 'contact_person_name', 'contact_person_last_name',
        'contact_person_email', 'contact_person_phone_number', 'state_id', 'bank_id',
        'account_name', 'account_number', 'created_by', 'updated_by'
    ];
    protected $table = 'aggregator';

    public function state()
    {
        return $this->belongsTo('App\State');
    }
    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }
    public function buyerOrder()
    {
        return $this->hasMany('App\BuyerOrder');
    }
    public function aggregator()
    {
        return $this->hasMany('App\Aggregator');
    }
    public function logistics()
    {
        return $this->hasMany('App\Logistics');
    }
}
