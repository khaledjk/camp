@extends('layouts.appme')

@section('content')
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Upload New Group</h1>
          <p>Upload New Groups</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Groups</a></li>
        </ul>
      </div>
  
              
<div class="row">

  <div class="col-md-6 ">
 <form method="POST" enctype="multipart/form-data" class="well" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

     <div class="form-group">
                    <label for="NameItem">Group Name</label>
                    <input class="form-control" type="text" placeholder="Camp Name" name="name_item">
                  </div>


   <div class="form-group">
                       <label for="NameItem">Group Description</label>
                     <textarea cols="80" id="content_item" name="content_item" rows="10" >
                    {{old('content_item')}}
                  </textarea>        



  </div>
                <div class="row">
      <div class="col-lg-12">
        <div class="input-group">

          <select type="text" class="form-control" name="select" id="select">

            @foreach($camps as $camp)
              <option value={{"$camp->id"}}>{{$camp->name}}</option>
              @endforeach
          </select>
        </div><!-- /input-group -->
      </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->    

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

      <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>

 <script type="text/javascript">

        // We need to turn off the automatic editor creation first.
        CKEDITOR.disableAutoInline = true;
      CKEDITOR.replace('content_item');
    </script>

@endsection