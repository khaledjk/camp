@extends('layouts.appme')

@section('content')
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Supervisors Groups Relations</h1>
          <p>Upload Supervisorss Groups Relation Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Supervisors Groups Relations</a></li>
        </ul>
      </div>
  
              
<div class="row">

  <div class="col-md-6 ">
    <form class="form-horizontal" role="form" method="POST" action="{{route('add_supervisor_group') }}">
                            {{ csrf_field() }}
                            <div class="form-group-sm">

                                <div class="col-md-6">
                                    <select name="supervisors" class="form-control">
                                        <option value="">--Select supervisors--</option>
                                        @foreach ($supervisors as $supervisor )
                                        
                                        <option value="{{ $supervisor->id }}"> {{ $supervisor->name }}</option>   
                                       
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <select name="groups[]" class="form-control" multiple>
                                      <option value="">--Select Groups--</option>
                                       @foreach ($groups as $group )


                                     <option name="groups" value="{{ $group->id }}"> {{ $group->name }}</option>
                                      @endforeach
                                 </select>
                             </div><div class="col-md-2"><span id="loader"><i class="fa fa-spinner fa-3x fa-spin"></i></span></div>

                         </div>

                



  

            <div class="tile-footer">
              <button class="btn btn-primary form-control" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Post Relation...</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary form-control" href="{{route('home')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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


                @if(Session::has('name_supervisor'))


<div class="table-wrapper">
  <table class="demo-table" >

       <thead> 
<tr> 

    <th>Supervisor</th> 
    <th>Groups</th> 
     
</tr> 
</thead> 

<tbody> 
<tr> 

    <td>{{Session('name_supervisor')}}</td>
<td>
                  @if(Session::has('gs'))

          @foreach (Session('gs') as $s)
 
    {{$s->name_groups}},
         @endforeach
         @endif
         </td> 
</tr> 

</tbody> 
</table> 

</div>

</div>



@endif
@endsection

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