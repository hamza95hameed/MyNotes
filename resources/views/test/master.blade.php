
@extends('test.poc')
@section('content')
    

<head>
    <!--bootstrap-->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
           
    <!--end bootrap-->



    <!--css-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
<link rel="stylesheet" href=" https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<!---end css-->



        <!--scripts-->
<script src=" https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<!--end script-->
        
</head>


<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>

<!--NAV BAR START-->



<!--NAV BAR END-->

<div class="row">
    <div class="col-md-2" style="background-color:rgb(252, 247, 241);"> 
     <h3>Order status</h3>
<!--DATA COMING FROM $POS VARIABLE-->
               @foreach ($var as $item)

<ol style="list-style:none;">
                 <li>
                <button  data-name={{$item->status}} type="button" class=" btn_clicked btn btn-danger">
                {{$item->status}}
                <span style="margin-left:2px;" class="badge badge-light">{{$item->cnt}}</span>
                  </button>
                </li>
               <br>
</ol>
                @endforeach

</div>


<div class="col-md-10" id="result" >
    <h3>SELECT THE STATUS</h3>
</div>
</div>
@endsection

@section('scripts')

<script>
    $(".btn_clicked").click(function(e){
        // alert($(this).data('name'));
        $("#result").html( "" );
        $.ajax({
  method: "POST",
  url: "getForm",
  data: { name: $(this).data('name'), "_token": "{{csrf_token()}}" }
} )
            .done(function(data) {
                $("#result").html( data );
            })
            .fail(function() {
                alert( "error" );
            });
    });
</script>

@endsection