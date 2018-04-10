<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Validator;
use Redirect;

use App\Group;
use App\Camp;
use App\Supervisor;
use App\Image;
use App\Video;
use App\User;
use Exception;
use Youtube;
use Session;




class GroupController extends Controller
{	


	public function choose_camp()
    {
            $id_camp = Session::get('id_camp');

            $camp_name = Camp::where('id',$id_camp)->first();

    	$camps = Camp::orderBy('id','DESC')->get();
     //$camp_name = $camp->name;


       return view('group.choose_camp',compact('camps','camp_name'));
      //return $camp_name;
      }
        
    


    public function add_group()
    {
    	$camps=Camp::orderBy('id','DESC')->get();
        return view('group.add_group',compact('camps'));
        
    }




    public function add_group_save(Request $r)
    {
            $foreign_name = mt_rand(111111,999999);
            $name_item = $r->input('name_item');
            $content_item= $r->input('content_item');
            $id_camp=$r->input('select');

            $data = ['name' => $name_item,'description'=> $content_item];

            $rules = ['name' => 'required' ,'description' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
               

                $group = new Group();
                $group->name = $name_item;
                $group->description = $content_item;
                $group->id_camp=$id_camp;               
               
                $group->status = 0;
             
                $group->save();

return Redirect::route('view_group', $group->id);


            }
    }

     public function view_group($id)
    {
       $group= Group::findOrFail($id);
       return view('group.view_group',compact('group'));
        
    }


    public function publish_group($id)
    {
         $products = Group::findOrFail($id);
     if($groups->status == '0')
     {
       $groups->status = '1';
       $groups->save();
       return Redirect::Back()->with('success', 'This product is Published');
     }
     else{
      $groups->status = '0';
      $groups->save();
      return Redirect::Back()->with('success', 'This product is Unpublished');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_group($id)
    {
         $group = Group::findOrFail($id);
      $group->delete();
  
      return Redirect::route('add_group')->with('success' , 'Product was Deleted successfuly!!');

    }


       public function manage_groups(Request $request)
    { 
		$id_camp=Session::get('id_camp');

       // $groups = Group::findOrFail($id_camp)->get();
        //return view('group.all_groups',compact('groups'));

        return Redirect::route('all_groups',$id_camp);
               // return view('group.all_groups',compact('groups'));

    }


         public function manage_project(Request $request)
    { 


    $id_camp=$request->get('select');
    Session::put('id_camp',$id_camp);

       // $groups = Group::findOrFail($id_camp)->get();
        //return view('group.all_groups',compact('groups'));

        return Redirect::back()->with('success', 'This camp is selected');
               // return view('group.all_groups',compact('groups'));

    }



   public function all_groups()
    {
      $id=Session::get('id_camp');
    	$groups = Camp::campJoinGroup()->where('camps_id','=',$id);
        return view('group.all_groups',compact('groups'));
        
    } 




     public function show_group_update(Request $r,$id)
    {
          $foreign_name = mt_rand(111111,999999);
            $name_item = $r->input('name_item');
            $content_item= $r->input('content_item');

            $data = ['name' => $name_item,'description'=> $content_item];

            $rules = ['name' => 'required' ,'description' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
               

                $group =Group::findOrFail($id);
                $group->name = $name_item;
                $group->description = $content_item;
                
               

                $group->save();

return Redirect::back()->with('success', 'New Product successfuly Updated');

    }}
        public function select_supervisor()
    { 
        $supervisors = User::orderBy('id','DESC')->get();
        $groups = Group::orderBy('id','DESC')->get();

        return view('supervisor.supervisor_group',compact('supervisors','groups'));
    }





            public function add_supervisor_group(Request $r)
    {
               $id_groups = $r->input('groups');
            $id_supervisors = $r->input('supervisors');

            $supervisors = Supervisor::where('id_user','=',$id_supervisors)->get();
            foreach($supervisors as $supervisor)
            {
              $supervisor->delete();
            }
            foreach($id_groups as $id_group)
           {
                $supervisor = new Supervisor();
                $supervisor->id_user = $id_supervisors;
            

                $supervisor->id_group = $id_group;
                
             
                $supervisor->save();
      }
            $gs = DB::table('supervisors')->join('groups','supervisors.id_group','=','groups.id')->selectRaw('groups.name as name_groups')->where('supervisors.id_user','=',$id_supervisors)->get();  

            $user = User::findOrFail($id_supervisors);
            $name_supervisor = $user->name;

           // $name_supervisor = DB::table('supervisors')->join('users','supervisors.id_user','=','users.id')->selectRaw('user.name as name')->where('supervisors.id')

return Redirect::back()->with('success', 'New Relation successfuly Updated')->with('gs',$gs)->with('name_supervisor',$name_supervisor);

  
}





    public function upload_image_group(Request $r, $id)
    {
           // $foreign_name = mt_rand(111111,999999);
            $date = $r->input('daily_date_img');
          //  $content_item= $r->input('content_item');
            $photos = $r->file('photo');
          //  $started_at = $r->input('start_date');
          //  $end_at = $r->input('end_date');


            $data = ['daily_date_img' => $date];

            $rules = ['daily_date_img' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
             

            foreach ($photos as $photo) 
            {
                    //                  $photos = $r->file($photos);
                            $foreign_name = mt_rand(111111,999999);
                            $filename =  str_replace(' ', '_', $foreign_name);
                                $filename .= '.'.$photo->getClientOriginalExtension();

                            $photo->move('upload/group/image/', $filename);
                            $img_file = new Image;
                            $img_file->filename=$filename;
                            $img_file->url='192.168.1.200/public/upload/group/image/'.$filename;
                            $img_file->id_group = $id;
                             $img_file->daily_date = $date;

                            $img_file->save();
            }

return Redirect::back()->with('success', 'New images successfuly Uploaded');


            }
    }


 public function upload_video_group(Request $r,$id)
    {
           // $foreign_name = mt_rand(111111,999999);
            $date = $r->input('daily_date_video');
          //  $content_item= $r->input('content_item');
            $video = $r->file('video');
          //  $started_at = $r->input('start_date');
          //  $end_at = $r->input('end_date');
            $namev = $video->getOriginalUrl();


            $data = ['daily_date_video' => $date];

            $rules = ['daily_date_video' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
             

           // foreach ($videos as $video) 
           // {
                    //                  $photos = $r->file($photos);
                            $foreign_name = mt_rand(111111,999999);
                            $filename =  str_replace(' ', '_', $foreign_name);
                                $filename .= '.'.$video->getClientOriginalExtension();

                            $video->move('upload/group/video/', $filename);
                            $video_file = new Video;
                            $video_file->filename=$filename;
                            $video_file->url='192.168.1.200/public/upload/group/video/'.$filename;
                            $video_file->id_group = $id;
                            $video_file->daily_date = $date;
                            $video_file->save();
                            $video = Youtube::upload($namev, [
    'title'       => 'My Awesome Video',
    'description' => 'You can also specify your video description here.',
    'tags'        => ['foo', 'bar', 'baz'],
    'category_id' => 10
]);
          //  }

return Redirect::back()->with('success', 'New videos successfuly Uploaded');


            }
        }




     public function view_group_image($id)
    {
       $images= Image::where('id_group',$id)->get();;
        $videos= Video::where('id_group',$id)->get();;

       return view('group.view_group_image',compact('images','videos'));
        
    }





            public function delete_group_img($id)
    {
         $c = Image::findOrFail($id);
      $c->delete();
       // $camps = DB::table('camps')->where('id', $c->id_camp)->get();
return Redirect::back()->with('success', 'Image has been deleted !!!');


    }

                public function delete_group_video($id)
    {
         $c = Video::findOrFail($id);
      $c->delete();
       // $camps = DB::table('camps')->where('id', $c->id_camp)->get();
return Redirect::back()->with('success', 'Video has been deleted !!!');


    }
}
