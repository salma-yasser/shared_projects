<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HowKnow extends Model
{
    //
	protected $appends = ['customers','no_customers'];

    public function getCustomersAttribute(){
    	return Customer::where("how_know",$this->id)->paginate(15);
    }
    public function getNoCustomersAttribute(){
    	return Customer::where("how_know",$this->id)->count();
    }
}
