@extends('layouts.appme')

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
                    @if($kids->status == 0)

                    <a href="{!! route('publish_kid', ['id'=>$kids->id]) !!}"><img src="{{asset('image-project/publish.png')}}" width="30px"></a> 
@else
                    <a href="{!! route('publish_kid', ['id'=>$kids->id]) !!}"><img src="{{asset('image-project/published.png')}}" width="30px"></a> 

@endif

                  </div>

                  <div class="col-md-1" >
                  <a href="{{route('add_kid')}}"> <img src="{{asset('image-project/cancel.png')}}" width="30px"></a>
                  </div>
                  <div class="col-md-1" >
                   <a href="{!! route('delete_camp', ['id'=>$kids->id]) !!}">  <img src="{{asset('image-project/delete.png')}}" width="30px"></a>
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
                    <label for="NameItem">Kids Name</label>
                    <input class="form-control" type="text" placeholder="Kids Name" name="name_kids" value="{{$kids->name}}">
                  </div>
 <div class="form-group">

                    <strong>Birth Date : </strong>  
    <input class="date form-control" style="width: 300px;" type="text" name="birth_date" id="start_date" value="{{$kids->birth_date}}">
</div>


<div class="form-group">
                    <label for="NameItem">Genre :        </label>
                    @if(strcmp($kids->gender,"male")==0)
                      <input type="radio" name="gender" value="male" checked> Male
                      <input type="radio" name="gender" value="female"> Female
                      @else
                      <input type="radio" name="gender" value="male" > Male
                      <input type="radio" name="gender" value="female" checked> Female
                      @endif
                  </div>



                   <div class="form-group">

        <div class="form-group">
                    <label for="NameItem">Other Gardian Name</label>
                    <input class="form-control" type="text" placeholder="Other Gardian Name" name="name_gardian" value="{{$kids->other_gardian_name}}">
                  </div>

<div class="form-group">
                    <label for="NameItem">Other Gardian Phone</label>
                    <input class="form-control" type="text" placeholder="XX-XXXXXX" name="phone_gardian" value="{{$kids->other_gardian_phone}}">
                  </div>

                   <div class="form-group">
                    <label for="NameItem">Allergies</label>
                    <input class="form-control" type="text" placeholder="Allergies" name="allergies" value="{{$kids->allergies}}">
                  </div> 

                  <div class="form-group">
                    <label for="NameItem">Food Preference</label>
                    <input class="form-control" type="text" placeholder="Food Preference" name="food" value="{{$kids->food_preference}}">
                  </div> 



                   <div class="form-group">
           
           <div class="form-group">
                    <label for="NameItem">Medical Condition</label>
                    <input class="form-control" type="text" placeholder="Medical condition" name="medical_condition" value="{{$kids->medical_condition}}">

                    <div class="form-group">
                    <label for="NameItem">Active</label>
                    <input class="form-control" type="text" placeholder="Active" name="active" value="{{$kids->active}}">

                  </div>
                    <div class="form-group">
                    <label for="NameItem">Weight</label>
                    <input class="form-control" type="number" placeholder="Weight" name="weight" value="{{$kids->weight}}">
                  </div>

                  <div class="form-group">
                    <label for="NameItem">Height</label>
                    <input class="form-control" type="number" placeholder="Height" name="height" value="{{$kids->height}}">
                  </div>


 <div class="form-group">

 <div class="form-group">
                    <label for="NameItem">Personality Note</label>
                    <input class="form-control" type="text" placeholder="Personality Note" name="personality_note" value="{{$kids->personality_note}}">
                  </div>


 <div class="form-group">

                    <strong>Registration Date : </strong>  
    <input class="date form-control" style="width: 300px;" type="text" name="registration_date" id="start_date" value="{{$kids->registration_date}}">
</div>
                   <div class="col-md-6">
                                    <select name="groups" class="form-control">
                                        @foreach ($groups as $group )
                                        @if($kids->id_group == $group->id)
                                        <option select="selected" value="{{ $group->id }}" default="{{$kids->id_group}}" > {{ $group->name }}</option>   
                                       @else
                                       <option value="{{ $group->id }}" default="{{$kids->id_group}}" > {{ $group->name }}</option>   
                                        @endif
                                        @endforeach
                                    </select>
                                </div>
                                </div>




 <div class="form-group" style="background-color: #ffffff">
                    
                     <img src="{{asset('upload/kid/'.$kids->img_profile)}}" class="img img-responsive" style="height:200px" />
                  </div>

   <div class="form-group">
                    <label for="exampleInputFile">New Image</label>
                    <input class="form-control" id="exampleInputFile" type="file" aria-describedby="fileHelp" name="photo"><small class="form-text text-muted" id="fileHelp">please upload jpg,png or jpeg image in good quality.</small>
                  </div>
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
