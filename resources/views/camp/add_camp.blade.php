@extends('layouts.appme')

@section('content')
   
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Upload New Camp</h1>
          <p>Upload New Camps</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Camps</a></li>
        </ul>
      </div>
  
              
<div class="row">

  <div class="col-md-6 ">
 <form method="POST" enctype="multipart/form-data" class="well" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

     <div class="form-group">
                    <label for="NameItem">Camp Name</label>
                    <input class="form-control" type="text" placeholder="Camp Name" name="name_item">
                  </div>


   <div class="form-group">
                       <label for="NameItem">Camp Description</label>
                     <textarea cols="80" id="content_item" name="content_item" rows="10" >
                    {{old('content_item')}}
                  </textarea>        



  </div>
     <div class="form-group">
                    <label for="exampleInputFile">Image input</label>
                    <input class="form-control " id="exampleInputFile" type="file" aria-describedby="fileHelp" name="photo[]" multiple><small class="form-text text-muted" id="fileHelp">please upload jpg,png or jpeg image in good quality.</small>
                  </div>
                  <div class="form-group">

                    

            <div class="tile-footer">
              <button class="btn btn-primary form-control" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary form-control" href="{{route('home')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
                  </div>
                 
 
      
      
    <strong>Start date : </strong>  
    <input class="date form-control" style="width: 300px;" type="text" name="start_date" id="start_date">  
 <strong>End date : </strong>  
    <input class="date form-control" style="width: 300px;" type="text" name="end_date" id="end_date"> 

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

        <script type="text/javascript">  
        $('.date').datepicker({  
           format: 'yyyy-mm-dd'  
         });  
    </script> 



@endsection