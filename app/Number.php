<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Number extends Model
{
    public function phone_type(){
        return $this->belongsTo('App\PhoneType');
    }

    public function kathedra(){
        return $this->belongsTo('App\Kathedra');
    }

    public function batalion(){
        return $this->belongsTo('App\Battalion','battalion_id');
    }

    public function rota(){
        return $this->belongsTo('App\Rota');
    }

    public function service(){
        return $this->belongsTo('App\Service');
    }

    public function rank(){
        return $this->belongsTo('App\Rank');
    }

    public function position(){
        return $this->belongsTo('App\Position');
    }
}
