<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Redirect;
use Illuminate\Support\Facades\DB;

use App\Camp;
use App\CampFile;


class CampController extends Controller
{
      public function add_camp()
    {
        return view('camp.add_camp');
        
    }



    public function add_camp_save(Request $r)
    {
           // $foreign_name = mt_rand(111111,999999);
            $name_item = $r->input('name_item');
            $content_item= $r->input('content_item');
            $photo = $r->file('photo');
            $started_at = $r->input('start_date');
            $end_at = $r->input('end_date');


            $data = ['name' => $name_item,'description'=> $content_item];

            $rules = ['name' => 'required' ,'description' => 'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
               //$destination = 'upload/camp';
               // $photo_name = str_replace(' ', '_', $foreign_name);
               // $photo_name .= '.'.$photo[0]->getClientOriginalExtension();
               // $photo[0]->move($destination, $photo_name);

                $camp = new Camp();
                $camp->name = $name_item;
                $camp->description = $content_item;
                $camp->startedat = $started_at;
                $camp->endat = $end_at;
               // $camp->img_name = $photo_name;
               // $camp->image_url = '192.168.1.200:8000/public/upload/camp/'.$photo_name;
                $camp->status = 0;
                $camp->save();

			foreach ($photo as $photos) 
			{
					//		            $photos = $r->file($photos);
							$foreign_name = mt_rand(111111,999999);
 						    $filename =  str_replace(' ', '_', $foreign_name);
                                $filename .= '.'.$photos->getClientOriginalExtension();

    						$photos->move('upload/camp', $filename);
    						$camp_file = new CampFile;
    						$camp_file->id_camp=$camp->id;
    						$camp_file->img_name=$filename;
    						$camp_file->img_url='192.168.1.200/upload/camp/'.$filename;
							$camp_file->save();
			}

return Redirect::route('view_camp', $camp->id);


            }
    }

     public function view_camp($id)
    {
       $camps = Camp::where('id',$id)->with('campFiles')->get();
     //return $camp;
      return view('camp.view_camp',compact('camps'));
        
    }


    public function publish_camp($id)
    {
         $products = Camp::findOrFail($id);
     if($camps->status == '0')
     {
       $camps->status = '1';
       $camps->save();
       return Redirect::Back()->with('success', 'This product is Published');
     }
     else{
      $camps->status = '0';
      $camps->save();
      return Redirect::Back()->with('success', 'This product is Unpublished');
    }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_camp($id)
    {
         $camp = Camp::findOrFail($id);
      $camp->delete();

      return Redirect::route('add_camp')->with('success' , 'Product was Deleted successfuly!!');

    }

    public function delete_img($id)
    {
         $c = CampFile::findOrFail($id);
      $c->delete();
       // $camps = DB::table('camps')->where('id', $c->id_camp)->get();
        $camp = Camp::where('id',$c->id_camp)->with('campFiles')->get();
      return Redirect::route('view_camp',$c->id_camp)->with('camp' , $camp);

    }


       public function manage_camps()
    { 
        $camps = Camp::orderBy('id','DESC')->get();
        return view('camp.all_camps',compact('camps'));
    }


     public function show_camp_update(Request $r,$id)
    {
          $foreign_name = mt_rand(111111,999999);
            $name_item = $r->input('name_item');
            $content_item= $r->input('content_item');
            $started_at= $r->input('start_date');
            $end_at= $r->input('end_date');
            $data = ['name' => $name_item,'description'=> $content_item, 'started_at'=>$started_at, 'end_at'=>"end_at"];

            $rules = ['name' => 'required' ,'description' => 'required', 'started_at' => 'required', 'end_at'=>'required'];

            $v = Validator::make($data, $rules);

            if($v->fails()){
                return Redirect::Back()->withErrors($v);
            }else
            {
               

                $camp =Camp::findOrFail($id);
                $camp->name = $name_item;
                $camp->description = $content_item;
                $camp->startedat = $started_at;
                $camp->endat = $end_at;

                
               

                $camp->save();

return Redirect::back()->with('success', 'New Product successfuly Updated');

    }
}
    public function add_img(Request $r,$id)
    {
          $foreign_name = mt_rand(111111,999999);
          //  $name_item = $r->input('name_item');
           // $content_item= $r->input('content_item');
          //  $quantity = $r->input('quantity');
          //  $price_item = $r->input('price_item');
            $photo = $r->file('photo');

          //  $data = ['name_item' => $name_item,'content_item'=> $content_item,'price_item' => $price_item,'quantity'=>$quantity];

          //  $rules = ['name_item' => 'required' ,'content_item' => 'required','price_item' => 'required','quantity'=>'required'];

          //  $v = Validator::make($data, $rules);

           // if($v->fails()){
           //     return Redirect::Back()->withErrors($v);
           // }else
           // {
               if($r->hasFile('photo')){
            $destination = 'upload/camp';
            $photo_name = str_replace(' ', '_', $foreign_name);
            $photo_name .= '.'.$photo->getClientOriginalExtension();
            $photo->move($destination, $photo_name);
       // }
                 $camp_img =new campFile();
                //$product->name = $name_item;
               // $product->content = $content_item;
               // $product->quantity = $quantity;
               // $product->price = $price_item;
if($r->hasFile('photo')){
          //  unlink('upload/camp/'.$camp_img->img_name);
             $camp_img->img_name = $photo_name;
                $camp_img->img_url = '192.168.1.200/upload/camp/'.$photo_name;
                $camp_img->id_camp = $id;
        }
               

                $camp_img->save();

return Redirect::back()->with('success', 'New Product successfuly Updated');

    }
}
}


