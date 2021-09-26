<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

       


        
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3/jquery.inputmask.bundle.js"></script>
</head>




<!--MESSAGE FOR ERROR HANDLING-->  
@include('layouts.message')
<!--END MESSAGE-->


<h3 style="text-align:center;"><b>CREATE YOUR PROFILE</b><h3>



  <div class="jumbotron">
    
    
        {!! Form::open(['method'=>'post','files' => true,'action' => 'ProfileController@store']) !!}

        <div class="form-group">
          <label for="exampleInputEmail1">ADDRESS</label>
        <input type="text" class="form-control" name="address"  placeholder="Enter Address" value="{{old('address')}}">
        </div>
        
        
        <div class="form-group">
          <label for="exampleInputEmail1">PHONE NO</label>
        
        <input type="text" class="form-control" name="ph" aria-describedby="emailHelp" placeholder="Enter Phone no" id="phone" value="{{old('ph')}}" >
          
        </div>
      
   
        
        <br>
        {{Form::file('cover_image')}}
      
        <br>    
      </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </form>
      </form>
    
    
    
      {!! Form::close() !!}


      <!--
      <script>
      $("#phone").inputmask({"mask": "(+92) 999-9999999"});
      </script>
    -->