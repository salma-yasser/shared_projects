<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
	protected $appends = ['no_programs'];

    public function program(){
    	return $this->hasMany("App\Program","course_id");
    }

      public function getNoProgramsAttribute(){
    	return Program::where("course_id",$this->id)->count();
    }

    public function department()
    {
        return $this->belongsTo('App\Department', 'department_id');
    }
}
