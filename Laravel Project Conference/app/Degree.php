<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Degree extends Model
{

	public function authors()
	{
	    return $this->hasMany('App\Author');
}
 
}
