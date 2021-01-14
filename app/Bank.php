<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'bank';

    public function processor()
    {
        return $this->hasMany('App\Processor');
    }
    public function aggregator()
    {
        return $this->hasMany('App\Aggregator');
    }
}
