<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\Kid;
use App\Parentfm;
use App\Group;
use Session;

class KidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_kid()
    {
        $groups = Group::get();
        return view('kid.add_kid',compact('groups'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_kid_save(Request $r)
    {
            $foreign_name = mt_rand(111111,999999);
            $name_kids = $r->input('name_kids');
            $birth_date = $r->input('birth_date');
            $name_gardian = $r->input('name_gardian');
            $phone_gardian = $r->input('phone_gardian');
            $food = $r->input('food');
            $medical_condition = $r->input('medical_condition');
            $weight = $r->input('weight');
            $height = $r->input('height');
            $personality_note = $r->input('personality_note');
            $registration_date = $r->input('registration_date');
            $allergies = $r->input('allergies');
            $active = $r->input('active');
            $id_group = $r->input('groups');


           // $content_item= $r->input('content_item');
           // $quantity = 0;
           // $price_item = $r->input('price_item');
            $photo = $r->file('photo');

            $data = ['name_kids' => $name_kids,'birth_date'=> $birth_date,'photo' => $photo];

            $rules = ['name_kids' => 'required' ,'birth_date' => 'required','photo'=> 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
                $destination = 'upload/kid';
                $photo_name = str_replace(' ', '_', $foreign_name);
                $photo_name .= '.'.$photo->getClientOriginalExtension();
                $photo->move($destination, $photo_name);

                $kid = new Kid();
                $kid->name = $name_kids;
                $kid->birth_date = $birth_date;
                $kid->other_gardian_name = $name_gardian;
                $kid->other_gardian_phone = $phone_gardian;
                                $kid->food_preference = $food;
                $kid->medical_condition = $medical_condition;
                $kid->weight = $weight;
                $kid->height = $height;
                $kid->personality_note = $personality_note;
                $kid->registration_date = $registration_date;

                $kid->allergies=$allergies;
                                $kid->active=$active;

                $kid->img_profile = $photo_name;
                $kid->url_profile = '192.168.1.200/upload/camp/'.$photo_name;
                $kid->status = 0;
                $radio = $r->get('gender', 0);
                $kid->gender = $radio;
                $kid->id_group = $id_group;
             
                $kid->save();


               

return Redirect::route('view_kid', $kid->id);


            }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view_kid($id)
    {
       $kids= Kid::findOrFail($id);
       $groups = Group::get();
       return view('kid.view_kid',compact('kids','groups'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function publish_kid($id)
    {
         $kids = Kid::findOrFail($id);
     if($kids->status == '0')
     {
       $kids->status = '1';
       $kids->save();
       return Redirect::Back()->with('success', 'This kid is Published');
     }
     else{
      $kids->status = '0';
      $kidss->save();
      return Redirect::Back()->with('success', 'This Kid is Unpublished');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_kid($id)
    {
         $kid = Kid::findOrFail($id);
      $kid->delete();
  
      return Redirect::route('add_Kid')->with('success' , 'Kid was Deleted successfuly!!');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function manage_kids()
    { 
        $id_camp = Session::get('id_camp');
      
$kids = DB::table('kids')->Join('groups','kids.id_group','=','groups.id')->selectRaw('kids.id as id, kids.name as name, kids.id_group as id_group, kids.birth_date as birth_date, kids.registration_date as registration_date, img_profile, url_profile, groups.name as group_name')->where('groups.id_camp','=',$id_camp)->Orderby('id','DESC')->get();       
//return $kids;
        return view('kid.all_kids',compact('kids'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_kid_update(Request $r,$id)
    {
          $foreign_name = mt_rand(111111,999999);
               $name_kids = $r->input('name_kids');
            $birth_date = $r->input('birth_date');
            $name_gardian = $r->input('name_gardian');
            $phone_gardian = $r->input('phone_gardian');
            $food = $r->input('food');
            $medical_condition = $r->input('medical_condition');
            $weight = $r->input('weight');
            $height = $r->input('height');
            $personality_note = $r->input('personality_note');
            $registration_date = $r->input('registration_date');
            $allergies = $r->input('allergies');
            $active = $r->input('active');
            $photo = $r->file('photo');
            $id_group = $r->input('groups');

      $data = ['name_kids' => $name_kids,'birth_date'=> $birth_date,'photo' => $photo];

            $rules = ['name_kids' => 'required' ,'birth_date' => 'required','photo'=> 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
               if($r->hasFile('photo')){
            $destination = 'upload/kid';
            $photo_name = str_replace(' ', '_', $foreign_name);
            $photo_name .= '.'.$photo->getClientOriginalExtension();
            $photo->move($destination, $photo_name);
        }

                $kid =Kid::findOrFail($id);
            

				$kid->name = $name_kids;
                $kid->birth_date = $birth_date;
                $kid->other_gardian_name = $name_gardian;
                $kid->other_gardian_phone = $phone_gardian;
                                $kid->food_preference = $food;
                $kid->medical_condition = $medical_condition;
                $kid->weight = $weight;
                $kid->height = $height;
                $kid->personality_note = $personality_note;
                $kid->registration_date = $registration_date;
      			 $kid->allergies=$allergies;
                $kid->active=$active;
                                $radio = $r->get('gender', 0);

                                $kid->gender = $radio;

                $kid->img_profile = $photo_name;
                $kid->url_profile = '192.168.1.200/upload/kid/'.$photo_name;
               // $kid->status = 0;
                $kid->id_group = $id_group;
             
                $kid->save();




if($r->hasFile('photo')){
            //unlink('upload/kid/'.$kid->img_profile);
             //   $kid->img_profile = $photo_name;
              //  $kid->url_profile = '192.168.1.200/public/upload/kid/'.$photo_name;
        }
               

                $kid->save();

return Redirect::back()->with('success', 'New Product successfuly Updated');

    }
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
            $id_parent = $r->input('parents');
            $p = Parentfm::findOrFail($id_parent);
            $p_name = $p->name_father;
           

                $kid =Kid::findOrFail($id_kids);
            

                $kid->id_parent = $id_parent;
                
             
                $kid->save();

                $ks = Kid::where('id_parent','=',$id_parent)->get();

               //$kids = Kid::orderBy('id','DESC')->get();
               // $parents = Parentfm::orderBy('id','DESC')->get();

return Redirect::back()->with('success', 'New Relation successfuly Updated')->with('p_name',$p_name)->with('ks',$ks);

// return view('kid.kid_parent',compact('success','ks','p_name','parents','kids'));

  
}

    public function delete_relation_kid_parent($id)
    {
         $kid = Kid::findOrFail($id);

         $id_parent = $kid->id_parent;


        $kid->id_parent = 0;
        $kid->save();

        $p = Parentfm::findOrFail($id_parent);
            $p_name = $p->name_father;

                $ks = Kid::where('id_parent','=',$id_parent)->get();



      return Redirect::back()->with('success' , 'Relation parent<->Kid was Deleted successfuly!!')->with('p_name',$p_name)->with('ks',$ks);

    }



}