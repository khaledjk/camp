@extends('layouts.appmes')

@section('content')
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Kids</h1>
          <p>Upload Kids Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Kids</a></li>
        </ul>
      </div>
  
              
<div class="row">

  <div class="col-md-6 ">
 <form method="POST" enctype="multipart/form-data" class="well" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">


  <div class="form-group">

                    <strong> Date : </strong>  
    <input class="date form-control" style="width: 300px;" type="text" name="daily_date" id="daiy_date">
</div>


     <div class="form-group">
                    <label for="NameItem">Food</label>
                    <input class="form-control" type="text" placeholder="food" name="food">
                  </div>
 <div class="form-group">




                   <div class="form-group">

        <div class="form-group">
                    <label for="NameItem">Activities</label>
                    <input class="form-control" type="text" placeholder="activities" name="activities">
                  </div>

<div class="form-group">
                    <label for="NameItem">Learn</label>
                    <input class="form-control" type="text" placeholder="" name="learn">
                  </div>

                   <div class="form-group">
                    <label for="NameItem">Period Sleep</label>
                    <input class="form-control" type="number" placeholder="periode sleep" name="period_sleep">
                  </div> 

                  <div class="form-group">
                    <label for="NameItem">Period Active</label>
                    <input class="form-control" type="number" placeholder="periode active" name="period_active">
                  </div> 
             </div>

 <div class="form-group">
 

            <div class="tile-footer">
              <button class="btn btn-primary form-control" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary form-control" href="{{route('home')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
