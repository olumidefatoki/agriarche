<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Processor extends Model
{
    protected $table = 'processor';
    protected $fillable = [
        'name', 'address', 'contact_person_first_name', 'contact_person_last_name',
        'contact_person_email', 'contact_person_phone_number', 'state_id', 'category',
        'kyc_cac', 'created_by', 'updated_by'
    ];

    public function state()
    {
        return $this->belongsTo('App\State');
    }
    public function bank()
    {
        return $this->belongsTo('App\Bank');
    }
    public function processorOrder()
    {
        return $this->hasMany('App\LogisticsOrder');
    }
}
