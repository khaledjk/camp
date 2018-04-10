


@extends('layouts.appme')

@section('content')





      @if(empty($camp_name))
    	<h1>Choose Camp</h1>
      @else
            <h1>Camp choosed is : "{{$camp_name->name}}" ... Choose another </h1>
@endif

        <h3>Choose one:</h3>
   <form method="POST" enctype="multipart/form-data" class="well" method="post">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="row">
      <div class="col-md-2">
        <div class="input-group">
          <select type="text" class="form-control" name="select" id="select">
            @foreach($camps as $camp)
                  @if(!empty($camp_name))

              @if($camp->id == $camp_name->id)

              <option selected="selected" value={{"$camp->id"}}>{{$camp->name}}</option>

              @else

              <option value={{"$camp->id"}}>{{$camp->name}}</option>
              @endif
              @else
                            <option value={{"$camp->id"}}>{{$camp->name}}</option>
@endif
              @endforeach
          </select>
          </div>

</div>


        <div class="col-md-1">

<div class="tile-footer">
              <button  class="btn btn-primary form-control" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>OK</button>
            </div>
</div>
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


    @endsection