<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

	public function paper()
	{
	    return $this->belongsTo('App\Paper');
	}

	public function degree()
	{
	    return $this->belongsTo('App\Degree');
	}
 
}
