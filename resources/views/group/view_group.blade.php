@extends('layouts.appme')

@section('content')

   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Groupss</h1>
          <p>Upload Groupss Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Groupss</a></li>
        </ul>
      </div>
  

<hr>  <div class="form-horizontal" >
<div class="col-md-3 text-center"> 
    <div class="form-group">

                  <div class="col-md-1" >

                    @if($group->status == 0)
                    <a href="{!! route('publish_group', ['id'=>$group->id]) !!}"><img src="{{asset('image-project/publish.png')}}" width="30px"></a> 
@else
                    <a href="{!! route('publish_group', ['id'=>$group->id]) !!}"><img src="{{asset('image-project/published.png')}}" width="30px"></a> 

@endif

                  </div>
                  <div class="col-md-1" >
                  <a href="{{route('add_group')}}"> <img src="{{asset('image-project/cancel.png')}}" width="30px"></a>
                  </div>
                  <div class="col-md-1" >
                   <a href="{!! route('delete_group', ['id'=>$group->id]) !!}">  <img src="{{asset('image-project/delete.png')}}" width="30px"></a>
                  </div>
              
          </div>
        </div>
      </div>
       



  <hr/>       
<div class="row">

  <div class="col-md-6">
 <form method="POST" enctype="multipart/form-data" class="well" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

     <div class="form-group">
                    <label for="NameItem">Group Name</label>
                    <input class="form-control" type="text" placeholder="Group Name" name="name_item" value="{{$group->name}}">
                  </div>


   <div class="form-group">
                       <label for="NameItem">Group Description</label>
                     <textarea cols="80" id="content_item" name="content_item" rows="10" >
                    {{$group->description}}
                  </textarea>    
                  </div>


                      

                   

   
                  <div class="form-group">
                    

            <div class="tile-footer">
              <button class="btn btn-primary form-control" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
            </div>
                  </div>


    </form>
     </div>
    <div class="col-md-6 ">
 <form method="POST" enctype="multipart/form-data" class="well" method="post" action="{{route('upload_image_group', ['id'=>$group->id]) }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">


     <div class="form-group">
                    <label for="exampleInputFile">Image input</label>
                    <input class="form-control " id="exampleInputFile" type="file" aria-describedby="fileHelp" name="photo[]" multiple><small class="form-text text-muted" id="fileHelp">please upload jpg,png or jpeg image in good quality.</small>
                  </div>
       
                 
 
      
      
    <strong>date : </strong>  
    <input class="date form-control" style="width: 300px;" type="text" name="daily_date_img" id="daily_date_img">

                    

            <div class="tile-footer">
              <button class="btn btn-primary form-control" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload Images</button>&nbsp;&nbsp;&nbsp;
            </div>
  </form>
</div>
    <div class="col-md-6 ">
 <form method="POST" enctype="multipart/form-data" class="well" method="post" action="{{route('upload_video_group', ['id'=>$group->id]) }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">


     <div class="form-group">
                    <label for="exampleInputFile">Video input</label>
                    <input class="form-control " id="exampleInputFile" type="file" aria-describedby="fileHelp" name="video" multiple><small class="form-text text-muted" id="fileHelp">please upload video in good quality.</small>
                  </div>

                    

        
                 
 
      
      
    <strong>date : </strong>  
    <input class="date form-control" style="width: 300px;" type="text" name="daily_date_video" id="daily_date_video">
        <div class="tile-footer">
              <button class="btn btn-primary form-control" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload Videos</button>&nbsp;&nbsp;&nbsp;
            </div>
  </form>
                    <div class="col-md-5" >

  <a href="{{route('view_group_image', ['id'=>$group->id]) }}" >View all images and videos"</a>
</div>

<div class="col-md-5" >

  <a href="{{route('view_schedule_groups', ['id'=>$group->id]) }}" >View all schedules"</a>
</div>
</div>


       
<div class="col-md-6">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger" >
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    @if(Session::has('success'))
                        <p class="alert alert-success">{{Session('success')}}</p>
                    @endif
                   
                </div>

</div>


<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

 <script type="text/javascript">
        // We need to turn off the automatic editor creation first.
        CKEDITOR.disableAutoInline = true;
      CKEDITOR.replace('content_item');
    </script>


        </script>

        <script type="text/javascript">  
        $('.date').datepicker({  
           format: 'yyyy-mm-dd'  
         });  
    </script> 

@endsection