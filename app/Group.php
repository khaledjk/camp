<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Group extends Model
{
        protected $fillable = ['name','description','status','id_camp'];



        public function groupImage(){

        			return $this->hasMany('App\Image','id_group');

        }

        public function groupVideo(){

        			return $this->hasMany('App\Video','id_group');

        }

        public function groupKid(){

        			return $this->hasMany('App\Kid','id_group');

        }

        public function groupSupervisor(){

        			return $this->hasMany('App\Supervisor','id_group');

        }


        public function groupSupervisorKid(){


                return $this->hasManyThrough('App\Kid','App\Supervisor','id_group','id_group');
        }

        public function groupSchedule(){

                                return $this->hasMany('App\Schedule','id_group');

        }

}
