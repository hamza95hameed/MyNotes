
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="http://localhost/proj/public/home">HOME</a>
      </li>
  </ul>
  </nav>
  
<div class="jumbotron">

    <H1 style="color:blue;">SIGN IN HERE</H1>

{!! Form::open(['method'=>'post','files' => true,'action' => 'DemoController@signin']) !!}
@csrf
<div class="form-group">
{{Form::label('email','ENTER YOUR EMAIL')}}
{{Form::text('email','',['class'=>'form-control','input type'=>'email','required'=>'true'])}}

<hr>
<br>
{{Form::label('password','ENTER YOUR PASSWORD')}}
{{Form::text('password','',['id'=>'article-ckeditor','class'=>'form-control','input type'=>'password','required'=>'true'])}}



</div>

 
{{Form::submit('submit',['class'=>'btn btn-primary'])}}


{!! Form::close() !!}
</div>
