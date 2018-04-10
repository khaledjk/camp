<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
            protected $fillable = ['id_group','id_user'];


               public function groupSupervisor(){

        			return $this->belongsTo('App\Group','id_group');

        }

         public function supervisorKid(){

        			//return $this->belongsToMany('App\Group','kids','id_group','id_group')->withPivot('name','id')->withTimestamps();
         			return $this->belongsTo('App\Kid','id_group');

        }

             public function supervisorGroup(){

        			//return $this->belongsToMany('App\Group','kids','id_group','id_group')->withPivot('name','id')->withTimestamps();
         			return $this->belongsTo('App\Group');

        }



}
