<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

	public function papers()
	{
	    return $this->hasMany('App\Paper');
	}
 
}
