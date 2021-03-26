<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paper extends Model
{
    
    // public function user(){
    //     return $this->belongsTo("App\User","user_id");
    // }

    // public function authors(){
    //     return $this->hasMany("App\Author","author_id");
    // }

    /**
     * Get the authors for the blog post.
     */
    public function authors()
    {
        return $this->hasMany('App\Author');
    }

    public function topic()
    {
        return $this->belongsTo('App\Topic');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function paperscomments()
    {
        return $this->hasMany('App\PapersComments');
    }
}
