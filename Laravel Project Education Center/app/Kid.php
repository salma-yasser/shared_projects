<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kid extends Model
{
    //
    public function customer(){
    	return $this->belongsTo("App\Customer","customer_id");
    }
    public function parents(){
    	return $this->hasMany("App\KidParent","kid_id");
    }
}
