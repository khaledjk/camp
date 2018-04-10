@extends('layouts.appmes')

@section('content')
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Products</h1>
          <p>Upload Products Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Kids</a></li>
        </ul>
      </div>
  



           <hr>  <div class="form-horizontal" >
<div class="col-md-3 text-center"> 
    <div class="form-group">
      
                  <div class="col-md-1" >
                    @if($daily->status == 0)

                    <a href="{!! route('publish_daily', ['id'=>$daily->id]) !!}"><img src="{{asset('image-project/publish.png')}}" width="30px"></a> 
@else
                    <a href="{!! route('publish_daily', ['id'=>$kids->daily]) !!}"><img src="{{asset('image-project/published.png')}}" width="30px"></a> 

@endif

                  </div>

                  <div class="col-md-1" >
                  <a href="{{route('add_daily',['id'=>$daily->id_kid])}}"> <img src="{{asset('image-project/cancel.png')}}" width="30px"></a>
                  </div>
                  <div class="col-md-1" >
                   <a href="{!! route('delete_daily', ['id'=>$daily->id]) !!}">  <img src="{{asset('image-project/delete.png')}}" width="30px"></a>
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
                    <label for="NameItem">date</label>
                    <input class="date form-control" type="text" placeholder="daily date" name="daily_date" value="{{$daily->daily_date}}">
                  </div>
 <div class="form-group">

                    <strong>Food  </strong>  
    <input class="form-control" style="width: 300px;" type="text" name="food" id="food" value="{{$daily->food}}">
</div>



        <div class="form-group">
                    <label for="NameItem">Avtivities</label>
                    <input class="form-control" type="text" placeholder="Activities" name="activities" value="{{$daily->activities}}">
                  </div>

<div class="form-group">
                    <label for="NameItem">Learn</label>
                    <input class="form-control" type="text" placeholder="Learn..." name="learn" value="{{$daily->learn}}">
                  </div>

                   <div class="form-group">
                    <label for="NameItem">Period Sleep</label>
                    <input class="form-control" type="number" placeholder="periodd" name="period_sleep" value="{{$daily->period_sleep}}">
                  </div> 

                  <div class="form-group">
                    <label for="NameItem">Period active</label>
                    <input class="form-control" type="number" placeholder="Period Active" name="period_active" value="{{$daily->period_active}}">
                  </div> 

            <div class="form-group">

                    
      
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
