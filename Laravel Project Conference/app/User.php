<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fname','lname','degree_id','affiliation','email','password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function papers()
    {
        return $this->hasMany('App\Paper');
    }

    public function usersboards()
    {
        return $this->hasMany('App\UsersBoards');
    }

    public function paperscomments()
    {
        return $this->hasMany('App\PapersComments');
    }

    public function usersworkshops()
    {
        return $this->hasMany('App\UsersWorkshops');
    }

    public function questioners()
    {
        return $this->hasMany('App\Questioners');
    }
}
