@extends('layouts.appme')

@section('content')
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Supervisors</h1>
          <p>Upload Supervisors Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Supervisors</a></li>
        </ul>
      </div>
  
              
<div class="row">

  <div class="col-md-6 ">
 <form method="POST" enctype="multipart/form-data" class="well" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

     <div class="form-group">
                    <label for="NameItem">Supervisor Name</label>
                    <input class="form-control" type="text" placeholder="Full name" name="name">
                  </div>

                  
    

<div class="form-group">
                    <label for="NameItem">Supervisor Phone</label>
                    <input class="form-control" type="text" placeholder="XX-XXXXXX" name="phone">
                  </div>

                  

                   <div class="form-group">
                    <label for="NameItem">Supervisor Email</label>
                    <input class="form-control" type="text" placeholder="email@xxx.xxx" name="email">
                  </div> 




 

            <div class="tile-footer">
              <button class="btn btn-primary form-control" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary form-control" href="{{route('home')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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

@endsection