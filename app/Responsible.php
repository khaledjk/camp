<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Responsible extends Model
{
        protected $fillable = ['name','email','phone','id_group','status'];

}
