<!DOCTYPE html>
<html>
<head>
	<title>Print I Card</title>
	<style type="text/css">
		body{
	      font-family: "Times New Roman", Times, serif;
	    }
		#card{
			background-color: white;
			width: 500px;
			height: 275px;
			clear: both;
  			display: table;
  			border: 5px double gray;
  			box-sizing: border-box;
  			border-radius: 2%;
		}
		#card_header{
			height: 60px;
			border-bottom: 3px solid green;
		}
		#logo{
		  	border-radius: 25%;
		  	width: 70px;
			height: 60px;
			float: left;
			padding-left: 10px;
			object-fit: contain;
		}
		#card_content{
			font-weight: bold;
			font-size: 36px;
			padding-left: 105px;
			padding-top: 10px;
			color: black;
		}
		#card_body{
			border-bottom: 3px solid green;
		}
		table{
			width: 100%;
			padding: 10px;
		}
		#card_img{
		  	border-radius: 3%;
		  	width: 115px;
			height: 140px;
			border: 2px solid gray;
			object-position: center;
			opacity: 1;
			object-fit: cover;
		}
		.tittle{
			font-weight: bold;
			font-size: 18px;
		}
		.tittle_1{
			font-weight: bold;
			font-size: 20px;
		}
		.tittle_2{
			font-weight: bold;
			font-size: 16px;
			color: #0000CD;
		}
		#emp_no{
			text-align: center;
			font-weight: bold;
			color: #0000CD;
			font-size: 22px;
		}
		#card_footer{
			text-align: center;
			font-weight: bolder;
			color: #0000CD;
			font-size: 15px;
			padding: 5px;
		}
		#bar_code{
			width: 90px;
			height: 90px;
			border: 5px solid black;
			border-radius: 3%;
		}
	</style>
</head>
<body>
	<div id="card">
		<div id="card_header">
			<div><img id="logo" src="template/logo.jpg"></div>
			<div id="card_content">ABC Socical Institution</div>
		</div>

		<div id="card_body">
			<table>
				<tr>
					<td rowspan="4"><img id="card_img" src="images/test.jpg"></td>
					<td class="tittle">ID No.</td>
					<td class="tittle_1"> : </td>
					<td class="tittle_2">ABC1345</td>
					<td></td>
				</tr>
				<tr>
					<td class="tittle">Name</td>
					<td class="tittle_1"> : </td>
					<td class="tittle_2">Vidyanand Shailendra Jha</td>
					<td></td>
				</tr>
				<tr>
					<td class="tittle">Date of Birth</td>
					<td class="tittle_1"> : </td>
					<td class="tittle_2">25 Aug 2002</td>
					<td rowspan="3"><img id="bar_code" src="images/test.jpg"></td>
				</tr>
				<tr>
					<td class="tittle">Mobile No.</td>
					<td class="tittle_1"> : </td>
					<td class="tittle_2">9898787825</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
				</tr>
		 	</table>
		</div>
		<div id="card_footer">
			Thahking You For Joining Our Socical Institution
		</div>
	</div>
</body>
</html>