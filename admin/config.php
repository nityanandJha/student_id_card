<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "i_card";

$conn = mysqli_connect($servername, $username, $password, $database);
if(!$conn)
{
	die("Connection Failed" . mysqli_connect_error());
}

$hostname = "http://localhost/i_card";

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

<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script> -->
