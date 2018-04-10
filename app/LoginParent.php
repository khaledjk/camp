<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginParent extends Model
{
     protected $fillable = ['email','password','status','id_parent'];

         public function kidSupervisor(){

        			return $this->hasOne('App\Parent','id');

        }
}
