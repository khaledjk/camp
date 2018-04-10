<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\Supervisor;
use App\Group;
use App\User;
use Illuminate\Support\Facades\Hash;
use \Crypt;
use Auth;
use Session;




class SupervisorController extends Controller
{
    public function add_supervisor()
    {
        return view('supervisor.add_supervisor');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_supervisor_save(Request $r)
    {
           // $foreign_name = mt_rand(111111,999999);
            $name = $r->input('name');
            $email = $r->input('email');
            $phone = $r->input('phone');
            $password = $r->input('password');


            
           // $photo = $r->file('photo');

            $data = ['name' => $name,'phone' => $phone, 'email' => $email];

            $rules = ['name' => 'required' ,'phone'=> 'required','email'=> 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
            

                $supervisor = new Supervisor();
                $supervisor->name = $name;
                $supervisor->email = $email;

                $supervisor->phone = $phone;

                $supervisor->status = 0;
                $supervisor->password = Hash::make($password);
                $supervisor->save();

return Redirect::route('view_supervisor', $supervisor->id);


            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view_supervisor($id)
    {
       $supervisors= User::findOrFail($id);
               $password = $supervisors->password;

       return view('supervisor.view_supervisor',compact('supervisors','password'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish_supervisor($id)
    {
         $supervisor = User::findOrFail($id);
     if($supervisor->status == '0')
     {
       $supervisor->status = '1';
       $supervisor->save();
       return Redirect::Back()->with('success', 'This supervisor is Published');
     }
     else{
      $supervisor->status = '0';
      $supervisor->save();
      return Redirect::Back()->with('success', 'This supervisor is Unpublished');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_supervisor($id)
    {
         $parent = User::findOrFail($id);
      $supervisor->delete();
  
      return Redirect::route('add_supervisor')->with('success' , 'Supervisor was Deleted successfuly!!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage_supervisors()
    { 
        $id_camp = Session::get('id_camp');
      
$supervisors = DB::table('supervisors')->Join('groups','groups.id','=','supervisors.id_group')->Join('users','users.id','=','supervisors.id_user')->selectRaw('supervisors.id as id, users.name as name, supervisors.created_at as created_at, users.phone as phone')->where('groups.id_camp','=',$id_camp)->Orderby('id','DESC')->get();
        //$supervisors = User::orderBy('id','DESC')->get();
        return view('supervisor.all_supervisors',compact('supervisors'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_supervisor_update(Request $r,$id)
    {


               $name = $r->input('name');
            $email = $r->input('email');
            $phone = $r->input('phone');
                        $password = $r->input('password');



            $data = ['name' => $name,'phone' => $phone, 'email' => $email, 'password' => $password];

            $rules = ['name' => 'required' ,'phone'=> 'required','email'=> 'required', 'password'=> 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
              

                $supervisor =User::findOrFail($id);
            

				  $supervisor->name = $name;
                $supervisor->email = $email;

                $supervisor->phone = $phone;
                                $supervisor->password = hash::make($password);

               // $kid->status = 0;
             
                $supervisor->save();


               

               // $kid->save();

return Redirect::back()->with('success', 'New Supervisor successfuly Updated');

    }
}


    public function groups_supervisor()
    {


       $id = Auth::id();

       //$groups= Group::with('groupSupervisor')->where('Supervisor->id_group',$id)->get();;
               //$password = Crypt::decrypt($supervisors->password);
              $groups= Supervisor::where('id_user',$id)->with('groupSupervisor')->get();;

// return $groups;
       return view('supervisor.groups_supervisor',compact('groups'));
        
    }


    public function view_group_supervisor($id)
    {


       $group = Group::findOrFail($id);

       //$groups= Group::with('groupSupervisor')->where('Supervisor->id_group',$id)->get();;
               //$password = Crypt::decrypt($supervisors->password);
             // $groups= Supervisor::where('id_user',$id)->with('groupSupervisor')->get();;

// return $groups;
       return view('supervisor.view_group_supervisor',compact('group'));
        
    }


}
