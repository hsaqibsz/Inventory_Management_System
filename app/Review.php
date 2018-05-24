<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

	protected $fillable = ['user_id','imports_id'];


    public function user()
    {
    	$this->belongsTo('App\User');
    }

     public function import()
    {
    	$this->belongsTo('App\Imports');
    }



}
