@extends('layouts.appmes')

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
<div class="col-md-3 text-center"> 
    <div class="form-group">
      
                  <div class="col-md-1" >
                    @if($schedule->status == 0)

                    <a href="{!! route('publish_daily', ['id'=>$schedule->id]) !!}"><img src="{{asset('image-project/publish.png')}}" width="30px"></a> 
@else
                    <a href="{!! route('publish_daily', ['id'=>$groups->schedule]) !!}"><img src="{{asset('image-project/published.png')}}" width="30px"></a> 

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
<div class="row">

  <div class="col-md-6">
 <form method="POST" enctype="multipart/form-data" class="well" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">






             <div class="form-group">

                    <strong> Date : </strong>  
    <input class="date form-control" style="width: 300px;" type="text" name="schedule_date" id="schedule_date" value="{{$schedule->schedule_date}}">
</div>


     <div class="form-group">
                    <label for="NameItem">Start time (1)</label>
                    <input class="form-control" type="number" placeholder="start date(1)" name="start_time1" value="{{$schedule->start_timea}}">
                  </div>

                  <label for="NameItem">End time (1)</label>
                    <input class="form-control" type="number" placeholder="end time(1)" name="end_time1" value="{{$schedule->end_timea}}">
                   <label for="NameItem">Activity (1)</label>
                    <input class="form-control" type="text" placeholder="Activity (1)" name="activity1" value="{{$schedule->activitya}}">

       <div class="form-group">
                    <label for="NameItem">Start time (2)</label> 
                    <input class="form-control" type="number" placeholder="start time(2)" name="start_time2" value="{{$schedule->start_timeb}}">

                  <label for="NameItem">End time (2)</label>
                    <input class="form-control" type="number" placeholder="end time(2)" name="end_time2" value="{{$schedule->end_timeb}}">>
                   <label for="NameItem">Activity (2)</label>
                    <input class="form-control" type="text" placeholder="Activity (2)" name="activity2" value="{{$schedule->activityb}}">
                  </div>

       <div class="form-group">
                    <label for="NameItem">Start time (3)</label>
                    <input class="form-control" type="number" placeholder="start time(3)" name="start_time3" value="{{$schedule->start_timec}}">

                  <label for="NameItem">End time (3)</label>
                    <input class="form-control" type="number" placeholder="end time(3)" name="end_time3" value="{{$schedule->end_timec}}">>
                   <label for="NameItem">Activity (3)</label>
                    <input class="form-control" type="text" placeholder="Activity (3)" name="activity3" value="{{$schedule->activityc}}">
                  </div>


       <div class="form-group">
                    <label for="NameItem">Start time (4)</label>
                    <input class="form-control" type="number" placeholder="start time(4)" name="start_time4" value="{{$schedule->start_timed}}">

                  <label for="NameItem">End Date (4)</label>
                    <input class="form-control" type="number" placeholder="end time(4)" name="end_time4" value="{{$schedule->end_timed}}">>
                   <label for="NameItem">Activity (4)</label>
                    <input class="form-control" type="text" placeholder="Activity (4)" name="activity4" value="{{$schedule->activityd}}">
                  </div>


       <div class="form-group">
                    <label for="NameItem">Start time (5)</label>
                    <input class="form-control" type="number" placeholder="start time(5)" name="start_time5" value="{{$schedule->start_timee}}">

                  <label for="NameItem">End time (5)</label>
                    <input class="form-control" type="number" placeholder="end time(5)" name="end_time5" value="{{$schedule->end_timee}}">>

                  <label for="NameItem">Activity (5)</label>
                    <input class="form-control" type="text" placeholder="Activity (5)" name="activity5" value="{{$schedule->activitye}}">
                  </div>



       <div class="form-group">
                    <label for="NameItem">Start time (6)</label>
                    <input class="form-control" type="number" placeholder="start time(6)" name="start_time6" value="{{$schedule->start_timef}}">

                  <label for="NameItem">End time (6)</label>
                    <input class="form-control" type="number" placeholder="end time(6)" name="end_time6" value="{{$schedule->end_timef}}">>

                   <label for="NameItem">Activity (6)</label>
                    <input class="form-control" type="text" placeholder="Activity (6)" name="activity6" value="{{$schedule->activityf}}">
                  </div>


       <div class="form-group">
                    <label for="NameItem">Start time (7)</label>
                    <input class="form-control" type="number" placeholder="start time(7)" name="start_time7" value="{{$schedule->start_timeg}}">

                  <label for="NameItem">End time (7)</label>
                    <input class="form-control" type="number" placeholder="end time(7)" name="end_time7" value="{{$schedule->end_timeg}}">>

                   <label for="NameItem">Activity (7)</label>
                    <input class="form-control" type="text" placeholder="Activity (7)" name="activity7" value="{{$schedule->activityg}}">
                  </div>

       <div class="form-group">
                    <label for="NameItem">Start time (8)</label>
                    <input class="form-control" type="number" placeholder="start time(8)" name="start_time8" value="{{$schedule->start_timeh}}">

                  <label for="NameItem">End time (8)</label>
                    <input class="form-control" type="number" placeholder="end time(8)" name="end_time8" value="{{$schedule->end_timeh}}">>

                   <label for="NameItem">Activity (8)</label>
                    <input class="form-control" type="text" placeholder="Activity (8)" name="activity8" value="{{$schedule->activityh}}">
                  </div>

                    
      
              <button class="btn btn-primary form-control" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
            </div>


    </form>
         
       
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
