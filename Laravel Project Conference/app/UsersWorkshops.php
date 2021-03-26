<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersWorkshops extends Model
{
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
