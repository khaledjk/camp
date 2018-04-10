<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleDetail extends Model
{
     protected $fillable = ['status','id_schedule', 'start_time','end_time','activity'];


 public function AllScheduleDetail(){

        			return $this->belongsTo('App\Schedule','id_schedule');

        }    


 }
