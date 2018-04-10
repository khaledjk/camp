<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Camp extends Model
{
        protected $fillable = ['name','description','status','startedat','endat'];


        public function campGroup(){

        			return $this->hasMany('App\Group','id_camp');

        }

        public function campFiles(){

                    return $this->hasMany('App\CampFile','id_camp');

        }


public static function campJoinGroup()
    {
        return 	DB::table('camps')->Join('groups','camps.id','=','groups.id_camp')->selectRaw('camps.id as camps_id, camps.description as camps_description, camps.name as camps_names, groups.id as id, groups.name as name, groups.description as description, groups.created_at as created_at ')->Orderby('id','DESC')->get();

    }


public static function campImage()
    {

        return DB::table('camps')->Join('camp_files','camps.id','=','camp_files.id_camp')->selectRaw('camps.id as id, camps.name as name, camps.description as description, camps.startedat at startedat, camps.endat at endat, camp_files.id as ids, camp_files.img_name as img_name, camp_files.img_url as image_url')->Orderby('ids','Desc')->get();



    }

}
