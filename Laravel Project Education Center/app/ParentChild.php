<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentChild extends Model
{
    //
    protected $table ="parents";
    protected $appends = ['no_kids'];

    public function kids(){
    	return $this->hasMany("App\KidParent",'parent_id');
    }
    public function getNoKidsAttribute(){
    	return KidParent::where("parent_id",$this->id)->count();
    }
}
