<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DailyBrief;
use App\Http\Resources\campAPI ;
use Response;
use App\Schedule;
use App\ScheduleDetail;
use App\Image;
use Illuminate\Support\Facades\DB;
use DateTime;
use Illuminate\Support\Facades\Input;
use App\LoginParent;




class APIController extends Controller
{
        public function get_api_daily(Request $r)
    {

       $kid = $r->json('id');
      //$kid="1";
      $id = (int)$kid;
       $daily = DailyBrief::where('id_kid','=',$id)->get();
      // $groups = Group::get();
       //return new  CampAPI($daily);
         return Response::json( array('error' => false,'daily' => $daily->toArray()), 200 ); 
    }

     public function get_api_schedule(Request $r)
    {
       $kid = $r->json('id');
     // $kid="1";
      $id = (int)$kid;
       //$schedule = Schedule::with('AllSchedule')->where('id_kid','=',$id)->get();
        $schedule =  DB::table('groups')->Join('kids','groups.id','=','kids.id_group')->Join('schedules','groups.id','=','schedules.id_group')->Join('schedule_details','schedules.id','=','schedule_details.id_schedule')->selectRaw('schedules.schedule_date as schedule_date, schedule_details.time_start as time_start, schedule_details.time_end as time_end, schedule_details.activity as activity')->where('kids.id','=',$id)->Orderby('daily_date','DESC')->distinct()->get();      // $groups = Group::get();
       //return new  CampAPI($daily);
         return Response::json( array('error' => false,'schedule' => $schedule->toArray()), 200 ); 
    }

         public function get_api_image_date(Request $r)
    {
//$kid = "1";
      $kid = $r->json('id');
      $id = (int)$kid;
		$dates = DB::table('groups')->Join('kids','groups.id','=','kids.id_group')->Join('images','groups.id','=','images.id_group')->selectRaw('images.daily_date as daily_date')->where('kids.id','=',$id)->Orderby('daily_date','DESC')->distinct()->get();      // $groups = Group::get();


       //return new  CampAPI($daily);
        // return Response::json( array('error' => false,'dates' => $dates->toArray()), 200 );
        return Response::json(array( 'error' => false,'dates' => $dates->toarray()), 200 );  
    }

      public function get_api_images(Request $r)
    {
      $kid = $r->json('id');
      $id = (int)$kid;
    	$date = e(Input::json('date'));
    	$time = strtotime('$date');

		$newformat = date('Y-m-d',$time);

		$images = DB::table('groups')->Join('kids','groups.id','=','kids.id_group')->Join('images','groups.id','=','images.id_group')->selectRaw('images.url as url_image ')->where([['kids.id','=',$id],['images.daily_date','=',$date]])->Orderby('daily_date','DESC')->get();      // $groups = Group::get();


       //return new  CampAPI($daily);
         return Response::json( array('error' => false,'images' => $images->toArray()), 200 ); 
    }

          public function login_api(Request $r)
    {

     // $input = Input::json()->first();
     // $input = json_encode($input);
     // $email = $input->email;
     //  $pass = $input->password;

    //	$email = Input::json('email');
    	//$pass = Input::json('password');

      $email = $r->json('email');
     $pass = $r->json('password');

      //$res=json_decode($res);
     // $email = $res['email'];
     // $password = $res['password'];



     // $email = "mahmmad@gmail.com";
    // $pass = json_encode($pass);




//$email = "mahmmad@gmail.com";
    	//$pass = "71b54";
    	$user = LoginParent::where('email',$email)->first();

    	if (!$user)
    	{

    		return Response::json( array('login' => 'error email'), 200 );
    	}
    	else 
    	{
    		if(strcmp($user->password,$pass) !== 0)
    		{
    		return Response::json( array('login' => 'error password'), 200 );

    		}
        else
        {
                return Response::json( array('login' => 'success'), 200 );
 
        }
    	}

    	
    }

    public function get_kids_ids(Request $id)
    {
      //$email = $r->json('email');
      $email = "mhammad@gmail.com";
      $ids = DB::table('kids')->Join('parentfms','parentfms.id','=','kids.id_parent')->selectRaw('kids.id as id, kids.name as name ')->where('parentfms.email_father','=',$email)->get();

         return Response::json( array('error' => false,'ids' => $ids->toArray()), 200 ); 


    }

}
