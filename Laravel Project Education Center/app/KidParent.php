<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KidParent extends Model
{
    //
    public function kid(){
    	return $this->belongsTo("App\Kid","kid_id");

    }

    public function parents(){
    	return $this->hasMany("App\ParentChild",'kid_id');
    }

    public function parent(){
    	return $this->belongsTo("App\ParentChild",'parent_id');
    }
}
