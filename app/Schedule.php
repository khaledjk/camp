<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{

   protected $fillable = ['schedule_date','status','id_group'];


               public function AllSchedule(){

        			return $this->hasMany('App\ScheduleDetail','id_schedule');

        }    

        public function scheduleGroup(){

        			return $this->hasOne('App\Group','id_group');

        }  

}
