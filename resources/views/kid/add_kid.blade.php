@extends('layouts.appme')

@section('content')
   <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Kids</h1>
          <p>Upload Kids Form</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Kids</a></li>
        </ul>
      </div>
  
              
<div class="row">

  <div class="col-md-6 ">
 <form method="POST" enctype="multipart/form-data" class="well" method="post">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

     <div class="form-group">
                    <label for="NameItem">Kids Name</label>
                    <input class="form-control" type="text" placeholder="Kids Name" name="name_kids">
                  </div>
 <div class="form-group">

                    <strong>Birth Date : </strong>  
    <input class="date form-control" style="width: 300px;" type="text" name="birth_date" id="start_date">
</div>


<div class="form-group">
                    <label for="NameItem">Genre :        </label>
                      <input type="radio" name="gender" value="male" checked> Male
                      <input type="radio" name="gender" value="female"> Female
                  </div>



                   <div class="form-group">

        <div class="form-group">
                    <label for="NameItem">Other Gardian Name</label>
                    <input class="form-control" type="text" placeholder="Other Gardian Name" name="name_gardian">
                  </div>

<div class="form-group">
                    <label for="NameItem">Other Gardian Phone</label>
                    <input class="form-control" type="text" placeholder="XX-XXXXXX" name="phone_gardian">
                  </div>

                   <div class="form-group">
                    <label for="NameItem">Allergies</label>
                    <input class="form-control" type="text" placeholder="Allergies" name="Allergies">
                  </div> 

                  <div class="form-group">
                    <label for="NameItem">Food Preference</label>
                    <input class="form-control" type="text" placeholder="Food Preference" name="food">
                  </div> 

<div class="form-group">
                    <label for="NameItem">Allergies</label>
                    <input class="form-control" type="text" placeholder="Allergies" name="allergies">
                  </div>

                   <div class="form-group">
           
           <div class="form-group">
                    <label for="NameItem">Medical Condition</label>
                    <input class="form-control" type="text" placeholder="Medical condition" name="medical_condition">

                    <div class="form-group">
                    <label for="NameItem">Active</label>
                    <input class="form-control" type="text" placeholder="Active" name="active">

                  </div>
                    <div class="form-group">
                    <label for="NameItem">Weight</label>
                    <input class="form-control" type="number" placeholder="Weight" name="weight">
                  </div>

                  <div class="form-group">
                    <label for="NameItem">Height</label>
                    <input class="form-control" type="number" placeholder="Height" name="height">
                  </div>


 <div class="form-group">

 <div class="form-group">
                    <label for="NameItem">Personality Note</label>
                    <input class="form-control" type="text" placeholder="Personality Note" name="personality_note">
                  </div>


 <div class="form-group">

                    <strong>Registration Date : </strong>  
    <input class="date form-control" style="width: 300px;" type="text" name="registration_date" id="start_date">
</div>


 <div class="form-group-sm">

      <div class="col-md-6">
                                    <select name="groups" class="form-control">
                                        <option value="">--Select Groups--</option>
                                        @foreach ($groups as $group )
                                        
                                        <option value="{{ $group->id }}"> {{ $group->name }}</option>   
                                       
                                        @endforeach
                                    </select>
                                </div>
                                </div>                          



                   <div class="form-group">


   <div class="form-group">
                    <label for="exampleInputFile">Profile Picture</label>
                    <input class="form-control" id="exampleInputFile" type="file" aria-describedby="fileHelp" name="photo"><small class="form-text text-muted" id="fileHelp">please upload jpg,png or jpeg image in good quality.</small>
                  </div>
                  <div class="form-group">

                    

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
