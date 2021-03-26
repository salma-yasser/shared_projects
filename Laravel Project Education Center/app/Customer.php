<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //HowKnow
    public function how_knows(){
    	return $this->belongsTo("App\HowKnow","how_know");
    }
 	public function program(){
    	return $this->hasMany("App\CustomerProgram","customer_id");
    }

    public function infs(){
    	if ( $this->type == 1) {

    	return $this->hasOne("App\Kid","customer_id");

    		# code...
    	}else{
    		return $this->hasOne("App\Adult","customer_id");

    	}
    }

    

}
