
<!DOCTYPE html>
<html>
<head>
	<title>All I Card Record</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

  <style type="text/css">
  	body{
      font-family: "Times New Roman", Times, serif;
    }
    table{
		width: 100%;
		padding: 10px;
		text-align: center;
	}
	th{
		padding-top: 20px;
	}
	tr{
		border-bottom: 1px solid black;
	}
	tr:hover{
		background-color: #D3D3D3;
		cursor: pointer;
		transform: scale(1.01);
	}
	img{
	  	border-radius: 25%;
	  	width: 60px;
		height: 60px;
	}
	img:hover{
		transform: scale(1.5);
		border-radius: 5%;
		border: 1px solid blue;
	}
	.container{
      padding: 15px;
      padding-top: 7px;
      margin-top: 40px;
    }
    #card_content{
      font-weight: bold;
      font-size: 25px;
      padding: 7px;
      color: black;
      border-bottom: 3px solid green;
    }
    #loading-image{
    	width: 100%;
    }
    .record_no{
    	margin-top: 20px;
    }
  </style>
</head>
<body>

	<div class="container">
		<div>
			<img src="../template/loader.gif" id="loading-image">
		</div>
		<div class="row">
			<div class="col-12">
				<div id="card_content">All I Card Holder Record</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12" id="append_table">
				<!-- Table -->
			</div>
		</div>
	</div>

</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"></script>

<script type="text/javascript">

  $(document).ready(function(){

    console.log(new Date());

    $.ajax({
    	url: '../php/save-all.php',
    	method: 'GET',
    	process: true,
    	beforeSend: function() {
          	$("#loading-image").show();
       	},
    	success: function(response){
    		$("#loading-image").hide();
    		//alert(response);
    		$('#append_table').html(response);
    	}
    });

  });

  	function data_reload(){
    	$.ajax({
	    	url: '../php/save-all.php',
	    	method: 'GET',
	    	process: true,
	    	success: function(response){
	    		$('#append_table').html(response);
	    	}
	    });
    }

  	function change_status(id, status){
    	$.ajax({
	    	url: '../php/change_status.php',
	    	method: 'POST',
	    	data: {id: id, status: status},
	    	process: true,
	    	success: function(response){
	    		data_reload();
	    	}
	    });
    }

    function delete_data(id, status){
    	if(confirm("Are You Sure???"))
    	{
	    	$.ajax({
		    	url: '../php/change_status.php',
		    	method: 'POST',
		    	data: {id: id, delete: status},
		    	process: true,
		    	success: function(response){
		    		data_reload();
		    	}
		    });
	    }
    }

</script>
