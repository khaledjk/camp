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
  



           <hr>  <div class="form-horizontal" >
<div class="col-md-3 text-center"> 
    <div class="form-group">
      
                  <div class="col-md-1" >
                    @if($supervisors->status == 0)

                    <a href="{!! route('publish_supervisor', ['id'=>$supervisors->id]) !!}"><img src="{{asset('image-project/publish.png')}}" width="30px"></a> 
@else
                    <a href="{!! route('publish_supervisor', ['id'=>$supervisors->id]) !!}"><img src="{{asset('image-project/published.png')}}" width="30px"></a> 

@endif

                  </div>

                  <div class="col-md-1" >
                  <a href="{{route('add_supervisor')}}"> <img src="{{asset('image-project/cancel.png')}}" width="30px"></a>
                  </div>
                  <div class="col-md-1" >
                   <a href="{!! route('delete_supervisor', ['id'=>$supervisors->id]) !!}">  <img src="{{asset('image-project/delete.png')}}" width="30px"></a>
                  </div>
                </div>
              </div>
            </div></hr>



  <hr/>       
<div class="row">

  <div class="col-md-6">
 <form method="POST" enctype="multipart/form-data" class="well" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">




              <div class="form-group">
                    <label for="NameItem">Supervisor Name</label>
                    <input class="form-control" type="text" placeholder="Father Name" name="name" value="{{$supervisors->name}}">
                  </div>
 <div class="form-group">



                    
 <div class="form-group">
                    <label for="NameItem">Phone </label>
                    <input class="form-control" type="text" placeholder="xx-xxxxxx" name="phone" value="{{$supervisors->phone}}">
                  </div>
 <div class="form-group">


     <div class="form-group">
                    <label for="NameItem">Email </label>
                    <input class="form-control" type="text" placeholder="xxxxxx@xxxxx.xxx" name="email" value="{{$supervisors->email}}">
                  </div>
 <div class="form-group">

   <div class="form-group">
                    <label for="NameItem">Password </label>
                    <input class="form-control" type="text" placeholder="*******" name="password" value="{{$password}}">
                  </div>
 <div class="form-group">

      



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

@endsection
