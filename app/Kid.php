<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kid extends Model
{
        protected $fillable = ['name','birth_date','other_gardian_name','other_gardian_phone','food_preference','allergies','medical_condition','img_profile','url_img','weight','height','gender','personality_note','registration_date','active','status','id_parent','id_group'];


        public function kidSupervisor(){

        			return $this->hasMany('App\Supervisor','id_group');

        }

          public function kidParent(){

        			return $this->hasOne('App\Parent','id_parent');

        }

        public function kidGroup(){

                    return $this->belongsTo('App\Parent','id_group');

        }
        //   public function supervisorKid(){

        // 			return $this->belongsToMany('App\Group','supervisors','id_group','id_group')->withTimestamps();

        // }

 
}
