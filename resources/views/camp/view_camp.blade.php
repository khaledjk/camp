@extends('layouts.appme')

@section('content')

   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Camps</h1>
          <p>Upload Camps Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Camps</a></li>
        </ul>
      </div>
  
 
    <div class="form-group">

           @foreach($camps as $camp)
      @foreach($camp->campFiles as $a)

        <div class="col-md-3">
            <div class="thumbnail">
  <img src="{{asset('upload/camp/'.$a->img_name)}}" style=" width: 200px;height: 200px" />
               <div class="caption">
              

                     <span class="pull-left">&nbsp;</span>
                      <a href="{!! route('delete_img', ['id'=>$a->id]) !!}">  <img src="{{asset('image-project/delete.png')}}" width="30px"></a>


                   
               
               </div>
            </div>
         </div>
</div>
              @endforeach
        @endforeach



           <hr>  <div class="form-horizontal" >
<div class="col-md-3 text-center"> 
    <div class="form-group">
                    <label for="exampleInputFile">Add New Image</label>
                    <form action="{{route('add_img', ['id'=>$camp->id]) }}"   method="POST" enctype="multipart/form-data" class="well" method="post">
                      <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <input class="form-control " id="exampleInputFile" type="file" aria-describedby="fileHelp" name="photo" multiple><small class="form-text text-muted" id="fileHelp">please upload jpg,png or jpeg image in good quality.</small>


                   <button class="btn btn-primary form-control" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Add</button>
                  </div>

</form>
                  <div class="col-md-1" >
                    @if($camp->status == 0)

                    <a href="{!! route('publish_camp', ['id'=>$camp->id]) !!}"><img src="{{asset('image-project/publish.png')}}" width="30px"></a> 
@else
                    <a href="{!! route('publish_camp', ['id'=>$camp->id]) !!}"><img src="{{asset('image-project/published.png')}}" width="30px"></a> 

@endif

                  </div>

                  <div class="col-md-1" >
                  <a href="{{route('add_camp')}}"> <img src="{{asset('image-project/cancel.png')}}" width="30px"></a>
                  </div>
                  <div class="col-md-1" >
                   <a href="{!! route('delete_camp', ['id'=>$camp->id]) !!}">  <img src="{{asset('image-project/delete.png')}}" width="30px"></a>
                  </div>
               
            </div></div>
            </hr>
            <td></td>
<div class="tile-body ">
              
<div class="row">

  <div class="col-md-8">
    

 <form action="{{route('view_camp', ['id'=>$camp->id]) }}" method="POST" enctype="multipart/form-data" class="well" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

     <div class="form-group">
                    <label for="NameItem">Camp Name</label>
                    <input class="form-control" type="text" placeholder="Camp Name" name="name_item" value="{{$camp->name}}">
                  </div>


   <div class="form-group">
                       <label for="NameItem">Camp Description</label>
                     <textarea cols="80" id="content_item" name="content_item" rows="10" >
                    {{$camp->description}}
                  </textarea>    
                  </div>


                      <strong>Start date : </strong>  
    <input class="date form-control" style="width: 300px;" type="text" name="start_date" id="start_date" value="{{$camp->startedat}}">  
 <strong>End date : </strong>  
    <input class="date form-control" style="width: 300px;" type="text" name="end_date" id="end_date" value="{{$camp->endat}}">


                      

                   

   
                  <div class="form-group">
                    

            <div class="tile-footer">
              <button class="btn btn-primary form-control" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
            </div>
                  </div>


    </form>
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