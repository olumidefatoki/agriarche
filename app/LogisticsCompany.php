<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogisticsCompany extends Model
{
    protected $fillable = ['name', 'address', 'contact_person_name',  'contact_person_phone_number',
                            'state_id'];
    protected $table = 'logistics_company';
    public function state()
    {
        return $this->belongsTo('App\State');
    }
}
