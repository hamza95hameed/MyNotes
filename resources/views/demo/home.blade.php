<!--
<!DOCTYPE html>
<html lang="en">
<head>
  <title>DEMO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>


<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="http://localhost/proj/public/home">HOME</a>
    </li>
</ul>
</nav>

-->

<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script> 
$(document).ready(function(){
  $("button").click(function(){
    $("div").animate({left: '250px'});
  });
});
</script> 
</head>
<body>

<button>Start Animation</button>

<p>By default, all HTML elements have a static position, and cannot be moved. To manipulate the position, remember to first set the CSS position property of the element to relative, fixed, or absolute!</p>

<div style="background:#98bf21;height:100px;width:100px;position:absolute;"></div>

</body>
</html>










<!--
<H1>
HELLO



</H1>






</h1>

@if($value==null)

<a href="http://localhost/proj/public/signin">
<button type="button" class="btn btn-primary">SIGN IN</button>
</a>
<br><br><br>
<a href="http://localhost/proj/public/signup">
<button type="button" class="btn btn-success">SIGN UP</button>
</a>
@endif


@if($value!=null)
<div class="alert alert-success" role="alert">
        <h1 style="color:green;">
                WELCOME {{$value}} !
        </h1>
      </div>
      <br>

      <a href="{{action('DemoController@signout')}}">
      <button type="button" class="btn btn-danger">LOG OUT</button>
      </a>


<br><br>

@endif
        
        
    -->


                

