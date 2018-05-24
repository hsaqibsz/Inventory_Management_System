<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Imports extends Model
{
    public function category()
    {
      return  $this->belongsTo('App\Category');
    }

    public function sales()
    {
      return  $this->belongsTo('App\sales');
    }

     public function reviews()
    {
      return  $this->hasMany('App\Review');
    }


      // this is like and unlike logic
       public function is_trusted_by_auth_user()
    {
        $id = Auth::id();

        $reviewers = array();

        foreach($this->reviews as $review):
            array_push($reviewers, $review->user_id);
        endforeach;


        if(in_array($id, $reviewers))
        {
            return true;
        }
        else {
            return false;
        }

    }

}
