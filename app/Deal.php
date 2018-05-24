<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
