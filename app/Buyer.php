<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    protected $fillable = ['name', 'address', 'contact_person_first_name', 'contact_person_last_name',
                            'contact_person_email','contact_person_phone_number','state_id'];

    protected $table = 'buyer';

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
   
}
