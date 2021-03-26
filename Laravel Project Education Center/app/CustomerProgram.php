<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerProgram extends Model
{
    //
    public function program(){
    	return $this->belongsTo("App\Program","program_id");
    }
    public function customer(){
    	return $this->belongsTo("App\Customer","customer_id");
    }
}
