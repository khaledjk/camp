<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parentfm extends Model
{
            protected $fillable = ['name_father','name_mother','email_father','email_mother','phone_father','phone_mother','status'];



            	public function parentKid(){

         			return $this->hasMany('App\Kid','id_parent');

        }
}
