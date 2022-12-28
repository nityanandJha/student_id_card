
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create New I Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

  <style type="text/css">
    body{
      font-family: "Times New Roman", Times, serif;
    }
    label{
      color: rgb(20, 50, 100);
      font-size: 17px;
      font-weight: bold;
      padding-top: 15px;
    }
    b{
      color: rgb(20, 50, 100);
      font-size: 15px;
      font-weight: bold;
      padding: 10px;
    }
    button{
      float: right;
    }
    .container{
      /*border: 5px double blue;*/
      padding: 15px;
      padding-top: 7px;
      margin-top: 40px;
    }
    #card_content{
      font-weight: bold;
      font-size: 33px;
      padding: 7px;
      color: black;
      text-align: center;
      border-bottom: 3px solid green;
    }
    .input-group{
      border: 1px solid black;
      border-radius: 5px 0 0 5px;
    }
    #loading-image{
    }
  </style>
</head>
<body>

<div class="container">

  <img src="template/loader.gif" id="loading-image">

  <div class="row justify-content-center">
    <div class="col-sm-6">
      <div id="card_content">ABC Socical Institution</div>
    </div>
  </div>
  
  <form action="php/save-index.php<?php /*echo $_SERVER['PHP_SELF'];*/ ?>" method="POST" name="form" enctype="multipart/form-data" autocomplete="">

  <div class="row justify-content-center">
    <div class="col-sm-6">
      <label>Full Name : </label>
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Enter Full Name" name="full_name" required>
        <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-sm-6">
      <label>Profile Image : </label>
      <div class="input-group">
        <input type="file" class="form-control" accept="image/*" name="image" required>
        <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-image"></span>
            </div>
          </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-sm-6">
      <label>Date of Birth : </label>
      <div class="input-group">
        <input type="date" class="form-control" placeholder="Enter Date of Birth" name="date_of_birth" required>
        <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-calendar"></span>
            </div>
          </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-sm-6">
      <label>Mobile Number : </label>
      <div class="input-group">
        <input type="tel" class="form-control" pattern="[789]{1}[0-9]{9}" placeholder="Enter Mobile Number" name="phone" required>
        <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
      </div>
    </div>
  </div>

  <div class="row justify-content-center">
    <div class="col-sm-6">
      <br>
      <button id="form_submit" type="submit" name="submit" class="btn btn-outline-primary"> <strong>  Submit  </strong> </button>
    </div>
  </div>
</form>
</div>

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>

<script type="text/javascript">

  $(document).ready(function(){

    $("#loading-image").hide();
    console.log(new Date());

    var i = 1;
    $('.form-control').each(function(k, v){
        $(this).addClass('input_'+i);
        i++;
    });

    $('#form_submit').click(function(){
        if($('.input_1').val() != '' && $('.input_2').val() != '' && $('.input_3').val() != '' && $('.input_4').val() != '')
        {
            $("#loading-image").show();
        }
    });

    window.onbeforeunload = function() { 
      $('#loading-image').hide(); 
    };

  });

</script>