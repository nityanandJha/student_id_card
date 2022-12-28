<?php
	require_once "../admin/config.php";

	if(isset($_POST['id']) && isset($_POST['status']))
	{
		$sql = "UPDATE user_card_data SET status = {$_POST['status']} WHERE id = {$_POST['id']};";
		$sql .= "UPDATE user_qrcode_data SET status = {$_POST['status']} WHERE id = {$_POST['id']};";

		if(mysqli_multi_query($conn, $sql))
		{
		    echo "<h2 style='color: red;'>Status Change Successfully...</h2>";
		    die;
	    }
		else
		{
		    echo "<h2 style='color: red;'>Something Went Wrong...</h2>";
		    die;
		}
	}

	if(isset($_POST['id']) && isset($_POST['delete']))
	{
		$sql_select = "SELECT user_card_data.*, user_qrcode_data.* FROM user_card_data JOIN user_qrcode_data ON user_card_data.id = user_qrcode_data.id WHERE user_card_data.id = {$_POST['id']}";
	  
		$result = mysqli_query($conn, $sql_select) or die("Failed !!!");
		$row = mysqli_fetch_assoc($result);

		unlink("../images/user_profile/".$row['image']);
		unlink("../images/user_qrcode/".$row['qrcode']);

		$sql = "DELETE FROM user_card_data WHERE id = {$_POST['id']};";
		$sql .= "DELETE FROM user_qrcode_data WHERE id = {$_POST['id']};";

		if(mysqli_multi_query($conn, $sql))
		{
		    echo "<h2 style='color: red;'>User Deleted Successfully...</h2>";
		    die;
	    }
		else
		{
		    echo "<h2 style='color: red;'>Something Went Wrong...</h2>";
		    die;
		}
	}
?>
