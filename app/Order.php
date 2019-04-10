<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function detail(){
    	return $this->hasMany('App\Order_detail');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}
