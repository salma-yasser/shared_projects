<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
	protected $appends = ['no_students'];
    //
   public function course(){
    	return $this->belongsTo("App\Course","course_id");
    }//
    
    public function  getNoStudentsAttribute(){
    	return CustomerProgram::where("program_id",$this->id)->count();
    }
}
