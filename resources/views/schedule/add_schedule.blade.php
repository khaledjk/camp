@extends('layouts.appme')

@section('content')
<html>
<head>
 <div class="app-title">
        <div>
          <h1><p class="fa fa-dashboard"></p> Schedule  </h1>
          <p>Upload Schedule Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Schedule</a></li>
        </ul>
      </div>

  <style type="text/css">
    /* SITE */
    body {
      font-size: 15px;
      color: #343d44;
      font-family: "segoe-ui", "open-sans", tahoma, arial;
      padding: 0;
      margin: 0;
    }
    .main-wrapper a {
      text-decoration: none;
      color: #3586b7;
    }
    .main-wrapper a.text-link:hover {
      border-bottom: 1px dashed #CCCCCC;
    }
    .tutorial-link-wrapper {
      text-align: center;
    }
    header {
      padding: 10px 30px 7px 30px;
      border-bottom: 2px solid #636b71;
      background: #343d44;
    }
    footer {   
      background: #343d44;
      padding: 10px 0 7px 30px;
      color: #b9bfc3;
      font-size: 13px;
    }
    footer a {
      color: #b9bfc3;
      text-decoration: none;
      margin-left: 10px;
    }
    .link-header {
      margin-top: 10px;
    }
    .link-header a {
      font-size: 15px;
      color: #b9bfc3;
      text-decoration: none;
      margin: 0;
    }
    .link-header a.home:hover {
      color: #b9bfc3;
    }
    .main-wrapper {
      padding: 25px 0;
    }
    .link-header {
      float: right;
    }
    .clearfix {
      clear: both;
    }
    @media screen and (max-width: 450px) {
      header,
      footer {
        text-align: center;
      }
      .link-header {
        float: none;
        margin: 0;
      }
    }
    
    /* TABLE */
    table {
      margin: auto;
      font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
      font-size: 12px;

    }



    table td {
      transition: all .5s;
    }
    .table-wrapper {
      overflow: auto;
    }
    .main-wrapper {
      padding: 20px;
    }
    .main-wrapper a:hover {
      border-bottom: 1px dashed #CCCCCC;
    }
    
    /* Table */
    .demo-table {
      border-collapse: collapse;
      font-size: 14px;
      min-width: 537px;
    }

    .demo-table th, 
    .demo-table td {
      border: 1px solid #e1edff;
      padding: 7px 17px;
    }
    .demo-table caption {
      margin: 7px;
    }

    /* Table Header */
    .demo-table thead th {
      background-color: #508abb;
      color: #FFFFFF;
      border-color: #6ea1cc !important;
      text-transform: uppercase;
            text-align: center;

    }

    /* Table Body */
    .demo-table tbody td {
      color: #353535;
    }
    .demo-table tbody td:first-child,
    .demo-table tbody td:nth-child(4),
    .demo-table tbody td:last-child {
      text-align: center;
    }
    
    .demo-table tbody td:empty {
      background-color: #ffcccc !important;
      border-color: #ffcccc !important;
    }

    .demo-table tbody tr:nth-child(odd) td {
      background-color: #f4fbff;
    }
    .demo-table tbody tr:hover td {
      background-color: #ffffa2;
      border-color: #ffff0f;
    }

    /* Table Footer */
    .demo-table tfoot th {
      background-color: #e5f5ff;
      text-align: center;
    }
    .demo-table tfoot th:first-child {
      text-align: left;
    }
    .demo-table tbody td:empty
    {
      background-color: #ffcccc;
    }
    
    /* Table 2 */
    
    
  </style>
   
  </head>
              
<div class="row">

  <div class="col-md-6 ">
 <form  enctype="multipart/form-data" class="well"  method="POST" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">


  <div class="form-group">

                    <strong> Date : </strong>  
                    @if(empty($schedule))
    <input class="date form-control" style="width: 300px;" type="text" name="schedule_date" id="schedule_date">
    @else
        <input class="date form-control" style="width: 300px;" type="text" name="schedule_date" value="{{$schedule->schedule_date}}" id="schedule_date">
@endif
</div>

<div class="form-group">
      <div class="row">
      <div class="col-md-4">
                    <label for="NameItem">Start time</label>
                    <input class="form-control" type="time" placeholder="Enter the start of period" name="start_time">
</div>
<div class="col-md-3">        <p></p>       <label for="NameItem">To ->>>>>> </label></div>
<div class="col-md-4">
                  <label for="NameItem">End time </label>
                    <input class="form-control" type="time" placeholder="Enter the end of period" name="end_time">
                  </div>
        </div>
                   <label for="NameItem">Activity </label>
                    <input class="form-control" type="text" placeholder="Activity" name="activity">
</div>

 

            <div class="tile-footer">

              <button   class="btn btn-primary form-control" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Upload Period
              </button>&nbsp;&nbsp;&nbsp;
              <a class="btn btn-secondary form-control" href="{{route('view_schedule_groups',['id'=>$id])}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Ok</a>
            </div>


    </form>
  </div>
    @if(!empty($scheduled))


<div class="table-wrapper">
  <table class="demo-table" >

       <thead> 
<tr> 

    <th>Period</th> 
    <th>Activity</th> 
     
</tr> 
</thead> 
      @foreach ($scheduled as $s)

<tbody> 
<tr> 
    <td>{{$s->start_time}} -> {{$s->end_time}}</td> 
    <td>{{$s->activity}}</td> 

</tr> 
  @endforeach

</tbody> 
</table> 

</div>

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