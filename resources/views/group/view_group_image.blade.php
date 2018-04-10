@extends('layouts.appme')

@section('content')

   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Gallery</h1>
          <p>Gallery Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Gallery </a></li>
        </ul>
      </div>
  
      <hr>
 
    <div class="form-group">
      <p>Images</p>

           @foreach($images as $img)

        <div class="col-md-3">
            <div class="thumbnail">
  <img src="{{asset('upload/group/image/'.$img->filename)}}" style=" width: 200px;height: 200px" />
               <div class="caption">
              

                     <span class="pull-left">&nbsp;</span>
                      <a href="{!! route('delete_group_img', ['id'=>$img->id]) !!}">  <img src="{{asset('image-project/delete.png')}}" width="30px"></a>


                   
               
               </div>
            </div>
         </div>


              @endforeach
            </div>
                  <div class="form-group">
      <p>Videos</p>

           @foreach($videos as $video)

        <div class="col-md-3">
            <div class="thumbnail">
  <img src="{{asset('upload/group/video/'.$video->filename)}}" style=" width: 200px;height: 200px" />
               <div class="caption">
              

                     <span class="pull-left">&nbsp;</span>
                      <a href="{!! route('delete_group_img', ['id'=>$video->id]) !!}">  <img src="{{asset('image-project/delete.png')}}" width="30px"></a>


                   
               
               </div>
            </div>
         </div>

              @endforeach

</div>

@endsection