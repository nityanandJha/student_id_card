
<?php

require_once "admin/config.php";
require_once "phpqrcode/qrlib.php";

if(isset($_POST['submit']))
{
  $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender']);
  $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $unique = random_strings();

  if(empty($full_name) || empty($gender) || empty($date_of_birth) || empty($phone) || empty('email') || empty($_FILES['image']))
  {
    echo "<h2 style='color: red;'>All Field Is Required...</h2>";
    die;
  }

  if(isset($_FILES['image']))
  {
    echo $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_tmp = $_FILES['image']['tmp_name'];
    $file_type = $_FILES['image']['type'];
    $file_ext = explode(".", $file_name);

    $extensions = array("jpeg", "jpg", "png");
    if(in_array(end($file_ext), $extensions) === false)
    {
      echo "<h2 style='color: red;'>Please Choose a Image File Like (jpeg, jpg, png)...</h2>";
      die;
    }

    $new_name = time().".".end($file_ext);
    $target = "images/user_profile/".$new_name;

    if(empty($errors) == true)
    {
      move_uploaded_file($file_tmp, $target);
    }
  }

  $path = "images/user_qrcode/";
  $file = $path.$unique.".png";
  $text = $hostname."/print.php?unique=".$unique;
  QRcode::png($text, $file, "L");

  session_start();
  $_SESSION["unique"] = $unique;

  $sql = "INSERT INTO user_card_data(unique_no, full_name, gender, date_of_birth, phone, email, image, status) 
  VALUES('{$unique}', '{$full_name}','{$gender}', '{$date_of_birth}', '{$phone}', '{$email}', '{$target}', '1');";

  $sql .= "INSERT INTO user_qrcode_data(unique_no, qrcode, status) 
  VALUES('{$unique}', '{$file}', '1')";

  if(mysqli_multi_query($conn, $sql))
  {
    header("location: {$hostname}/print.php?unique=$unique");
  }
  else
  {
    echo "<h2 style='color: red;'>Something Went Wrong...</h2>";
    die;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Create New I Card</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

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
      border: 5px double blue;
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
  </style>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-sm-12">
      <div id="card_content">ABC Socical Institution</div>
    </div>
  </div>
  
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" name="form" enctype="multipart/form-data" autocomplete="">
  <div class="row">
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

  <div class="row">
    <div class="col-sm-6">
      <label>Gender : </label>
      <div class="input-group">
        <div class="form-control">
          <input type="radio" name="gender" value="Male" required><b>Male</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name="gender" value="Female" required><b>Female</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input type="radio" name="gender" value="Other" required><b>Other</b>
        </div>
          <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-child"></span>
            </div>
          </div>
        </div>
    </div>

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

  <div class="row">
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

    <div class="col-sm-6">
      <label>Email : </label>
      <div class="input-group">
        <input type="email" class="form-control" placeholder="Enter Email" name="email" required>
        <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-sm-12">
      <br>
      <button type="submit" name="submit" class="btn btn-outline-primary"> <strong>  Submit  </strong> </button>
    </div>
  </div>
</form>
</div>

</body>
</html>

<?php

function random_strings()
{
  // String of all alphanumeric character
  // $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
  
  $str_result1 = '0123456789';
  $str_result2 = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

  // Shuffle the $str_result and returns substring
  // of specified length

  $str_result11 = substr(str_shuffle($str_result1), 0, 5);
  $str_result22 = substr(str_shuffle($str_result2), 0, 3);

  $result = $str_result22 . $str_result11;
  return $result;
}

?>

<script type="text/javascript">

  $(document).ready(function(){
    console.log(new Date());
  });

</script>