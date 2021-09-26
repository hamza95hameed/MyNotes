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

        
        <form method="post" id="upload_form" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="jumbotron" >
                    address:<br>
                    <input type="text" name="address" class="form-control">
                    <br>
                    phone no:<br>
                    <input type="text" name="ph" class="form-control" >
                    
                </div>
             <table class="table">
                 <tr>
              <td width="40%" align="right"><label>Select File for Upload</label></td>
               <td width="30"><input type="file" name="select_file" id="select_file" /></td>
               <td width="30%" align="left">
                   <input type="submit" name="upload" id="upload" class="btn btn-primary" value="Upload">
                </td>
              </tr>
              <tr>
               <td width="40%" align="right"></td>
               <td width="30"><span class="text-muted">jpg, png, gif</span></td>
               <td width="30%" align="left"></td>
              </tr>
             </table>
            
           </form>



 
  <div class="alert" id="message" style="display: none"></div>
  <span id="uploaded_image" style="margin-top:-20px;"></span>


  <!--
  <script>
  $("#phone").inputmask({"mask": "(+92) 999-9999999"});
  </script>
-->


<script>
    $(document).ready(function(){
    
     $('#upload_form').on('submit', function(event){
      event.preventDefault();
      $.ajax({
       url:"{{ route('ajaxupload.action') }}",
       method:"POST",
       data:new FormData(this),
       dataType:'JSON',
       contentType: false,
       cache: false,
       processData: false,
       success:function(data)
       {
        $('#message').css('display', 'block');
        $('#message').html(data.message);
        $('#message').addClass(data.class_name);
        $('#uploaded_image').html(data.uploaded_image);
       }
      })
     });
    
    });
    </script>
    