<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;
use Validator;
use Redirect;
use Auth; 
use App\User;
use App\Supervisor;
use App\DailyBrief;
use App\Group;
use App\Kid;
use App\DailyBriefs;



class DailyBriefController extends Controller
{
    public function add_daily($id)
    {
        return view('daily.add_daily');
        
    }

     public function view_daily($id)
    {   

        $daily=DailyBrief::findOrFail($id);
        return view('daily.view_daily',compact('daily'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_daily_save(Request $r, $id)
    {
            //$foreign_name = mt_rand(111111,999999);
            $daily_date = $r->input('daily_date');
            $food = $r->input('food');
            $activities = $r->input('activities');
            $learn = $r->input('learn');
            $period_sleep = $r->input('period_sleep');
            $period_active= $r->input('period_active');


            $data = ['daily_date' => $daily_date,'food'=> $food,'activities' => $activities, 'learn' => $learn, 'period_sleep' => $period_sleep, 'period_active' => $period_active];

            $rules = ['daily_date' => 'required' ,'food' => 'required','activities'=> 'required','learn'=> 'required','period_sleep'=> 'required','period_active'=> 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
                
                $daily = new DailyBrief();
                $daily->food = $food;
                $daily->daily_date = $daily_date;
                $daily->activities = $activities;
                $daily->learn = $learn;
                                $daily->period_sleep = $period_sleep;
                $daily->period_active = $period_active;
                $daily->id_kid = $id;
        
             
                $daily->save();

return Redirect::route('view_daily', $daily->id);


            }
    }

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
    public function publish_daily($id)
    {
         $daily = DailyBrief::findOrFail($id);
     if($daily->status == '0')
     {
       $daily->status = '1';
       $daily->save();
       return Redirect::Back()->with('success', 'This daily is Published');
     }
     else{
      $daily->status = '0';
      $daily->save();
      return Redirect::Back()->with('success', 'This daily is Unpublished');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_daily($id)
    {
         $daily = DailyBrief::findOrFail($id);
      $daily->delete();
  
      return Redirect::route('add_daily')->with('success' , 'daily was Deleted successfuly!!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage_daily($id)
    { 
        $dailys = DailyBrief::where('id_kid',$id)->orderBy('id','DESC')->get();
        return view('daily.view_daily_kids',compact('dailys','id'));
    }

      public function manage_supervisor_kids()
    { 

    	$id = Auth::id();
    	//$kids = Supervisor::where('id_user',$id)->get();
        $kids = DB::table('kids')->Join('groups','kids.id_group','=','groups.id')->Join('supervisors','groups.id','=','supervisors.id_group')->selectRaw('kids.id as id, kids.name as name, kids.id_group as id_group, kids.registration_date as registration_date, img_profile, url_profile, groups.name as group_name')->where('supervisors.id_user','=',$id)->Orderby('id','DESC')->get();


           // $kids = Group::WhereHas('getrelation', function ($query) { $query->where('tableb.start_date', '>', $date) ->first(); }); 
       // $supervisors = Supervisor::where('id_user',$id)->get();
    
        
    	//$kids = Group::with('groupSupervisorKid')->get();
    	//$id_group = $supervisor->id_group->distinct();
        //$kids = Kid::where('id_group',$id_group)->orderBy('id','DESC')->get();
        return view('supervisor.all_supervisor_kids',compact('kids'));
       // return $kids;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_daily_update(Request $r, $id)
    {
                     $daily_date = $r->input('daily_date');
            $food = $r->input('food');
            $activities = $r->input('activities');
            $learn = $r->input('learn');
            $period_sleep = $r->input('period_sleep');
            $period_active= $r->input('period_active');


            $data = ['daily_date' => $daily_date,'food'=> $food,'activities' => $activities, 'learn' => $learn, 'period_sleep' => $period_sleep, 'period_active' => $period_active];

            $rules = ['daily_date' => 'required' ,'food' => 'required','activities'=> 'required','learn'=> 'required','period_sleep'=> 'required','period_active'=> 'required'];
            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
               
                $daily =DailyBrief::findOrFail($id);
            

				$daily->food = $food;
                $daily->daily_date = $daily_date;
                $daily->activities = $activities;
                $daily->learn = $learn;
                                $daily->period_sleep = $period_sleep;
                $daily->period_active = $period_active;
             
                $daily->save();





               

                $daily->save();
            }

return Redirect::back()->with('success', 'New Daily successfuly Updated');

  
}

    public function select_parent()
    { 
        $parents = Parentfm::orderBy('id','DESC')->get();
        $kids = Kid::orderBy('id','DESC')->get();

        return view('kid.kid_parent',compact('parents','kids'));
    }



        public function add_parent_kid(Request $r)
    {
               $id_kids = $r->input('kids');
            $id_parents = $r->input('parents');
           

                $kid =Kid::findOrFail($id_kids);
            

                $kid->id_parent = $id_parents;
                
             
                $kid->save();

               

return Redirect::back()->with('success', 'New Relation successfuly Updated');

  
}
}