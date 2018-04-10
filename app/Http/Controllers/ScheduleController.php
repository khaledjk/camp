<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Request;
use Validator;
use Redirect;
use Auth; 
use App\User;
use App\Supervisor;
use App\DailyBrief;
use App\Group;
use App\Schedule;
use App\ScheduleDetail;
use View;
use Illuminate\Support\Facades\Input;
use App\Camp;
use Session;






class ScheduleController extends Controller
{
    public function add_schedule(Request $r,$id)
    {



        $sid = $id;
    	$is_admin = auth()->user()->is_admin;

        if(Request::has('schedule'))
            {
                         $schedule = Request::input('schedule');
                      $scheduled = Request::input('scheduled');

    	                           if($is_admin == 0){

                                         return view('schedules.add_schedule', compact('id','schedule','scheduled'));
                                                     }
            
                                    else{



                                             return view('schedule.add_schedule', compact('id','schedule','scheduled'));
                                         }
            }


    else {
                     if($is_admin == 0){

                    return view('schedules.add_schedule', compact('id'));
                                     }
                      else{



                     return view('schedule.add_schedule', compact('id'));
                          }
        
        }
     
     }   
    


     public function view_schedule($id)
    {   

        $schedule=Schedule::where('id','=',$id)->first();
        $scheduled = ScheduleDetail::where('id_schedule','=',$id)->get();

        $is_admin = auth()->user()->is_admin;

        $id_camp=Session::get('id_camp');
        $camp = Camp::where('id','=',$id_camp)->first();


        if($is_admin == 0){

        return view('schedules.view_schedule',compact('schedule','scheduled','camp'));
    }
    else{



        return view('schedule.view_schedule',compact('schedule','scheduled','camp'));
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add_schedule_save(Request $r, $id)
    {
            //$foreign_name = mt_rand(111111,999999);
            $schedule_date = Request::input('schedule_date');
            $start_time = Request::input('start_time');
            $end_time = Request::input('end_time');
            $activity = Request::input('activity');

            $schedule = Schedule::where('schedule_date','=', $schedule_date)->where('id_group','=',$id)->first();


            $data = ['schedule_date' => $schedule_date];

            $rules = ['schedule_date' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){

                return Redirect::Back()->withErrors($v);
            }
            else
            {
                        if(!$schedule){

                                     $schedule = new Schedule();
                                     $schedule->schedule_date = $schedule_date;
                                     $schedule->id_group = $id;
                                      $schedule->save();


                                     $scheduled = new ScheduleDetail();
                                      $scheduled->start_time = $start_time;
                                     $scheduled->end_time = $end_time;
                                     $scheduled->activity = $activity;
                                     $scheduled->id_schedule = $schedule->id;


                                     $scheduled->save();

              
              

                                          }

                        else{
            
                
                $scheduled = new ScheduleDetail();
                //$scheduled->schedule_date = $schedule_date;
                //$schedule->id_group = $id;

                $scheduled->start_time = $start_time;
                $scheduled->end_time = $end_time;
                $scheduled->activity = $activity;
                $scheduled->id_schedule = $schedule->id;


              
              
                $scheduled->save();
                }

                $scheduled = ScheduleDetail::where('id_schedule','=',$schedule->id)->orderBy('start_time','ASC')->get();
//return Redirect::route('add_schedule', $schedule->id_group)->with('schedule',$schedule)->with('scheduled',$scheduled);
                                //return Redirect::route('view_schedule_date',$schedule->id);
                //$scheduled = ScheduleDetail::where('id_schedule','=',$schedule->id)->get();

return View::make('schedule.add_schedule')->with('id',$schedule->id_group)->with('schedule',$schedule)->with('scheduled',$scheduled);
//return $scheduled;

            }
    }


public function add_period_schedule( $id)
{

    $schedule = Schedule::where('id',$id)->first();
    $scheduled = ScheduleDetail::where('id_schedule','=',$id)->get();
return View::make('schedule.add_schedule')->with('id',$schedule->id_group)->with('schedule',$schedule)->with('scheduled',$scheduled);




}

//     public function add_schedule_save(Request $r, $id)
//     {
//             //$foreign_name = mt_rand(111111,999999);
//             $schedule_date = $r->input('schedule_date');
//             $start_time1 = $r->input('start_time1');
//             $end_time1 = $r->input('end_time1');
//             $start_time2 = $r->input('start_time2');
//             $end_time2 = $r->input('end_time2');
//             $start_time3 = $r->input('start_time3');
//             $end_time3 = $r->input('end_time3');
//             $start_time4 = $r->input('start_time4');
//             $end_time4 = $r->input('end_time4');
//             $start_time5 = $r->input('start_time5');
//             $end_time5 = $r->input('end_time5');
//             $start_time6 = $r->input('start_time6');
//             $end_time6 = $r->input('end_time6');
//             $start_time7 = $r->input('start_time7');
//             $end_time7 = $r->input('end_time7');
//             $start_time8 = $r->input('start_time8');
//             $end_time8 = $r->input('end_time8');

//             $activity1 = $r->input('activity1');
//             $activity2 = $r->input('activity2');
//             $activity3 = $r->input('activity3');
//             $activity4 = $r->input('activity4');
//             $activity5 = $r->input('activity5');
//             $activity6 = $r->input('activity6');
//             $activity7 = $r->input('activity7');
//             $activity8 = $r->input('activity8');


//             $data = ['schedule_date' => $schedule_date];

//             $rules = ['schedule_date' => 'required'];

//             $v = Validator::make($data, $rules);

//             if($v->fails()){
//                 return Redirect::Back()->withErrors($v);
//             }else
//             {
                
//                 $schedule = new Schedule();
//                 $schedule->schedule_date = $schedule_date;
//                 $schedule->id_group = $id;

//                 $schedule->start_timea = $start_time1;
//                 $schedule->end_timea = $end_time1;
//                 $schedule->activitya = $activity1;

//                 $schedule->start_timeb = $start_time2;
//                 $schedule->end_timeb = $end_time2;
//                 $schedule->activityb = $activity2;

//                 $schedule->start_timec = $start_time3;
//                 $schedule->end_timec = $end_time3;
//                 $schedule->activityc = $activity3;
             
//                 $schedule->start_timed = $start_time4;
//                 $schedule->end_timed = $end_time4;
//                 $schedule->activityd = $activity4;
                

//                 $schedule->start_timee = $start_time5;
//                 $schedule->end_timee = $end_time5;
//                 $schedule->activitye = $activity5;
             

//                 $schedule->start_timef = $start_time6;
//                 $schedule->end_timef = $end_time6;
//                 $schedule->activityf = $activity6;
              

//                 $schedule->start_timeg = $start_time7;
//                 $schedule->end_timeg = $end_time7;
//                 $schedule->activityg = $activity7;
               

//                 $schedule->start_timeh = $start_time8;
//                 $schedule->end_timeh = $end_time8;
//                 $schedule->activityh = $activity8;
              
//                 $schedule->save();
                


// return Redirect::route('view_schedule', $schedule->id);


//             }
//     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response





     */


    public function view_schedule_date($id)
{

        $schedule = Schedule::findOrFail($id)->first();
        $scheduled = ScheduleDetail::where('id_schedule','=',$id)->orderBy('start_time','ASC')->get();

        $data['id'] = $id;
        $data['schedule'] = $schedule;
        $data['scheduled'] = $scheduled;

     $is_admin = auth()->user()->is_admin;

        if($is_admin == 0){

        return view('schedules.add_schedule',compact('schedule','id','scheduled'));
    }
    else{



       // return view('schedule.add_schedule',compact('schedule'),compact('id'),compact('scheduled'));
               // return \View::make('schedule.add_schedule')->with(['id'=> $id,'schedule' => $schedule,'scheduled' => $scheduled]);
        return View::make('schedule.add_schedule',$data);

    }
    }




    public function publish_schedule($id)
    {
         $schedule = Schedule::findOrFail($id);
     if($schedule->status == '0')
     {
       $schedule->status = '1';
       $schedule->save();
       return Redirect::Back()->with('success', 'This schedule is Published');
     }
     else{
      $schedule->status = '0';
      $schedule->save();
      return Redirect::Back()->with('success', 'This schedule is Unpublished');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_schedule($id)
    {


         $schedule = Schedule::findOrFail($id);
         $id_group = $schedule->id_group;
      $schedule->delete();
      $scheduleds = ScheduleDetail::where('id_schedule','=',$id)->get();

foreach($scheduleds as $scheduled)
{

    $scheduled->delete();
}
      //$scheduleds = ScheduleDetail::where('id_schedule','=',$id)->get();
     // foreach(@scheduleds as scheduled)
     // {
      //	$scheduled->delete();
     // }


  
      return Redirect::route('view_schedule_groups',$id_group)->with('success' , 'daily was Deleted successfuly!!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage_schedule($id)
{

        $schedules = Schedule::where('id_group',$id)->orderBy('id','DESC')->get();

     $is_admin = auth()->user()->is_admin;

        if($is_admin == 0){

        return view('schedules.all_schedule',compact('schedules','id'));
    }
    else{



        return view('schedule.all_schedule',compact('schedules','id'));
    }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_schedule_update(Request $r, $id)
    {
                    $schedule_date =Request::Input('schedule_date');
            $start_time = Request::Input('start_time');
            $end_time = Request::Input('end_time');
           
            $activity = Request::Input('activity');


 			$data = ['schedule_date' => $schedule_date];

            $rules = ['schedule_date' => 'required'];
            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
               $schedule = Schedule::findOrFail($id);
                $schedule->schedule_date = $schedule_date;
              //  $schedule->id_group = $id;
                $schedule->save();

                $scheduleds = ScheduleDetail::where('id_schedule','=',$id)->get();
                $n = 0;

                foreach($scheduleds as $scheduled )
{
                $scheduled->start_time = $start_time[$n];
                $scheduled->end_time = $end_time[$n];
                $scheduled->activity = $activity[$n];
                $n++;
                $scheduled->save();

                
                          }
                
            }

return Redirect::back()->with('success', 'New Schedule successfuly Updated');

  
}



}
