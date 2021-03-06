<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UsersBoards extends Model
{
    
    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
