<?php
	require_once "../admin/config.php";

	$sql = "SELECT user_card_data.*, user_qrcode_data.* FROM user_card_data JOIN user_qrcode_data ON user_card_data.id = user_qrcode_data.id ORDER BY user_card_data.id DESC";
	  
	$result = mysqli_query($conn, $sql) or die("Failed !!!");

  	if(mysqli_num_rows($result) > 0)
  	{
?>
	<table>
		<thead>
			<tr>
				<th>SR No.</th>
				<th>Name</th>
				<th>Date Of Birth</th>
				<th>Mobile No.</th>
				<th>Unique No.</th>
				<th>QR Code</th>
				<th>Image</th>
				<th>Status</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
<?php  
  		$serial = 1;
    	while($row = mysqli_fetch_assoc($result)) 
    	{
?>
			<tr>
				<td><b><?= $serial; ?></b></td>
				<td><?= $row['full_name']; ?></td>
				<td><?= date("d M Y", strtotime($row['date_of_birth'])); ?></td>
				<td><?= $row['phone']; ?></td>
				<td><b><?= $row['unique_no']; ?></b></td>
				<td><img src="../images/user_qrcode/<?= $row['qrcode']; ?>"></td>
				<td><img src="../images/user_profile/<?= $row['image']; ?>"></td>
				<td>
					<?php
						if($row['status'] == "1"){
							echo '<button onclick="change_status('.$row['id'].', 0)" class="btn btn-outline-success"><strong>Active</strong> </button>';
						}else{
							echo '<button onclick="change_status('.$row['id'].', 1)" class="btn btn-outline-danger"><strong>InActive</strong> </button>';
						}
					?>
				</td>
				<td>
					<button onclick="update_data('<?= $row['id']; ?>')" class="btn btn-outline-primary"><span class="fa fa-edit"></span></button>
					&nbsp;&nbsp;
					<button onclick="delete_data('<?= $row['id']; ?>', 'delete')" class="btn btn-outline-danger"><span class="fa fa-trash"></span></button>
				</td>
			</tr>
<?php
			$serial++;
		}
?>
		</tbody>
	</table>
<?php
	}
	else
	{
?>
		<div class="record_no">
			<center><h1>
				No Record Found
			</h1></center>
		</div>
<?php
	}
?>
