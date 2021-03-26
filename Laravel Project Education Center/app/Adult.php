<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Adult extends Model
{
    //
    public function job(){
    	return $this->belongsTo("App\Job","job_status");
    }
}
