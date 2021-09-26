<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <h1>PROFILE</h1>
  <div class="row">
    <div class="col-md-4" >
    <img src="{{ url('storage/cover_images/'.$var->profile_pic) }}" width="100%" height="100%">
    </div>
    

    {{-- @foreach ($var as $item) --}}
        
   
    <div class="col-md-8" style="background-color:lavenderblush;">
    <h1>NAME :{{$var->user->name}}</h1>

    <h1>EMAIL:{{$var->user->email}}</h1>

    <h1>PHONE NO:{{$var->phone}}</h1>

    <h1>ADDRESS:{{$var->address}}</h1>

    {{-- @endforeach --}}
    
    
    </div>

  </div>
</div>

</body>
</html>
