<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
   public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    } 

   public function imports()
    {
    	return $this->belongsTo('App\Imports');
    }
}
