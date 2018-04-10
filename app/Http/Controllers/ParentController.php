<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\Kid;
use App\Parentfm;
use App\LoginParent;
use Session;

class ParentController extends Controller
{
   public function add_parent()
    {
        return view('parent.add_parent');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_parent_save(Request $r)
    {
           // $foreign_name = mt_rand(111111,999999);
            $name_father = $r->input('name_father');
            $name_mother = $r->input('name_mother');
            $email_father = $r->input('email_father');
            $email_mother = $r->input('email_mother');
            $phone_father = $r->input('phone_father');
            $phone_mother = $r->input('phone_mother');
            
           // $photo = $r->file('photo');

            $data = ['name_father' => $name_father,'name_mother'=> $name_mother,'phone_father' => $phone_father, 'phone_mother' => $phone_mother, 'email_father' => $email_father];

            $rules = ['name_father' => 'required' ,'name_mother' => 'required','phone_father'=> 'required','phone_mother'=> 'required', 'email_father' => 'required|string|email|max:255|unique:parentfms'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
            

                $parent = new Parentfm();
                $parent->name_father = $name_father;
                $parent->name_mother = $name_mother;
                $parent->email_father = $email_father;
                $parent->email_mother = $email_mother;

                $parent->phone_father = $phone_father;
                $parent->phone_mother = $phone_mother;

                $parent->status = 0;
             
                $parent->save();

                $user = new LoginParent();

                 $user->email = $email_father;
                 $user->id_parent = $parent->id;
                $length = 8;
                $string = "";

                        while ($length > 0)
                                             {
                                                  $string .= dechex(mt_rand(0,15));
                                                $length -= 1;
                                            }

                $user->password = $string;

                $user->save();



return Redirect::route('view_parent', $parent->id);


            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view_parent($id)
    {
       $parents= Parentfm::findOrFail($id);
       return view('parent.view_parent',compact('parents'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish_parent($id)
    {
         $parent = Parentfm::findOrFail($id);
     if($parent->status == '0')
     {
       $parent->status = '1';
       $parent->save();
       return Redirect::Back()->with('success', 'This parent is Published');
     }
     else{
      $parent->status = '0';
      $parent->save();
      return Redirect::Back()->with('success', 'This parent is Unpublished');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_parent($id)
    {
         $parent = Parentfm::findOrFail($id);
      $parent->delete();
  
      return Redirect::route('add_parent')->with('success' , 'Parent was Deleted successfuly!!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage_parents()
    { 

         $id_camp = Session::get('id_camp');
      
$parents = DB::table('parentfms')->Join('kids','parentfms.id','=','kids.id_parent')->Join('groups','kids.id_group','=','groups.id')->selectRaw('parentfms.id as id, parentfms.name_father as name_father, parentfms.phone_father as phone_father, parentfms.created_at as created_at')->where('groups.id_camp','=',$id_camp)->Orderby('id','DESC')->get(); 

        //$parents = Parentfm::orderBy('id','DESC')->get();
        return view('parent.all_parents',compact('parents'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_parent_update(Request $r,$id)
    {
               $name_father = $r->input('name_father');
            $name_mother = $r->input('name_mother');
            $email_father = $r->input('email_father');
            $email_mother = $r->input('email_mother');
            $phone_father = $r->input('phone_father');
            $phone_mother = $r->input('phone_mother');


            $data = ['name_father' => $name_father,'name_mother'=> $name_mother,'phone_father' => $phone_father, 'phone_mother' => $phone_mother];

            $rules = ['name_father' => 'required' ,'name_mother' => 'required','phone_father'=> 'required','phone_mother'=> 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
              

                $parent =Parentfm::findOrFail($id);
            

				  $parent->name_father = $name_father;
                $parent->name_mother = $name_mother;
                $parent->email_father = $email_father;
                $parent->email_mother = $email_mother;

                $parent->phone_father = $phone_father;
                $parent->phone_mother = $phone_mother;
               // $kid->status = 0;
             
                $parent->save();


               

               // $kid->save();

return Redirect::back()->with('success', 'New Parent successfuly Updated');

    }
}
}

