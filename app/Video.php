<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Video extends Model
{
    protected $fillable = ['filename','url','id_group','daily_date','status'];

}
