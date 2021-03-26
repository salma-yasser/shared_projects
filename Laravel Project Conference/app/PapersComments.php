<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PapersComments extends Model
{

	public function paper()
	{
	    return $this->belongsTo('App\Paper');
	}

	public function user()
	{
	    return $this->belongsTo('App\User');
	}

}
