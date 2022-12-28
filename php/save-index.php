<?php

require_once "../admin/config.php";
require_once "../phpqrcode/qrlib.php";

if(isset($_POST['submit']))
{
  $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
  $date_of_birth = mysqli_real_escape_string($conn, $_POST['date_of_birth']);
  $phone = mysqli_real_escape_string($conn, $_POST['phone']);
  $unique = random_strings();

  if(empty($full_name) || empty($date_of_birth) || empty($phone) || empty($_FILES['image']))
  {
    echo "<h2 style='color: red;'>All Field Is Required...</h2>";
    die;
  }

  if(isset($_FILES['image']))
  {
    $file_name = $_FILES['image']['name'];
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
    $target = "../images/user_profile/".$new_name;

    if(empty($errors) == true)
    {
      move_uploaded_file($file_tmp, $target);
    }
  }

  $path = "../images/user_qrcode/";
  $qr = time().".png";
  $file = $path.$qr;
  $text = $hostname."/print.php?unique=".$unique;
  QRcode::png($text, $file, "L");

  session_start();
  $_SESSION["unique"] = $unique;

  $sql = "INSERT INTO user_card_data(unique_no, full_name, date_of_birth, phone, image, status) 
  VALUES('{$unique}', '{$full_name}', '{$date_of_birth}', '{$phone}', '{$new_name}', '1');";

  $sql .= "INSERT INTO user_qrcode_data(unique_no, qrcode, status) 
  VALUES('{$unique}', '{$qr}', '1')";

  if(mysqli_multi_query($conn, $sql))
  {
    $last_id = $conn->insert_id;
    header("location: {$hostname}/print.php?id=$last_id");
  }
  else
  {
    echo "<h2 style='color: red;'>Something Went Wrong...</h2>";
    die;
  }
}

?>