<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DailyBrief extends Model
{
        protected $fillable = ['food','activities','learn','period_sleep','period_active','id_kid','daily_date'];

}
