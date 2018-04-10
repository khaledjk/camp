@extends('layouts.appme')

@section('content')
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Schedules</h1>
          <p>Upload Schedules Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Schedules</a></li>
        </ul>
      </div>
  


           <hr>  <div class="form-horizontal" >
<div class="col-md-2 text-center"> 
    <div class="form-group">
      
                  <div class="col-md-1" >

                    @if($schedule->status == 0)

                    <a href="{!! route('publish_daily', ['id'=>$schedule->id]) !!}"><img src="{{asset('image-project/publish.png')}}" width="30px"></a> 
@else
                    <a href="{!! route('publish_daily', ['id'=>$schedule->id]) !!}"><img src="{{asset('image-project/published.png')}}" width="30px"></a> 

@endif

                  </div>

                  <div class="col-md-1" >
                  <a href="{{route('add_schedule',['id'=>$schedule->id_group])}}"> <img src="{{asset('image-project/cancel.png')}}" width="30px"></a>
                  </div>
                  <div class="col-md-1" >
                   <a href="{!! route('delete_schedule', ['id'=>$schedule->id]) !!}">  <img src="{{asset('image-project/delete.png')}}" width="30px"></a>
                  </div>
                </div>
              </div>
            </div></hr>



  <hr/>       

  <div class="col-md-5">
 <form method="POST" enctype="multipart/form-data" class="well" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">






             <div class="form-group">

                    <strong> Date : </strong>  
    <input class="date form-control" style="width: 300px;" type="text" name="schedule_date" id="schedule_date" value="{{$schedule->schedule_date}}">
</div>

@foreach($scheduled as $s)

      <div class="row">
      <div class="col-md-4">
                    <label for="NameItem">Start time</label>
                    <input class="form-control" type="time" placeholder="Enter the start of period" id="start_time[]" name="start_time[]" value="{{$s->start_time}}">
</div>
<div class="col-md-3">        <p></p>       <label for="NameItem">To ->>>>>> </label></div>
<div class="col-md-4">
                  <label for="NameItem">End time </label>
                    <input class="form-control" type="time" placeholder="Enter the end of period" id="end_time[]" name="end_time[]" value="{{$s->end_time}}">
                  </div>
        </div>
                   <label for="NameItem">Activity </label>
                    <input class="form-control" type="text" placeholder="Activity" id="activity[]" name="activity[]" value="{{$s->activity}}">


@endforeach
      
              <button class="btn btn-primary form-control" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>

    </form>

                       <a href="{!! route('add_period_schedule', ['id'=>$schedule->id]) !!}"> Add New Period</a>

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
