<?php
	session_start(); 
?>
<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>ระบบคลังพัสดุ</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
	<style type="text/css">
		h1{
			color: #CC9900;
		}
		h2{
			text-align: center;
			color: #000033;
			font-size:24px;
		}
		h4{
			color: #CC9900;
			font-size:24px;
			text-align: center;
		}
		p.w{
			color: white;
			font-size:20px;
		}
		p.f{
			font-size:12px;
		}
		p.m{
			text-align: left;
		}
		p.wid{

		}
		i{
			color: #000066;
		}
		

	</style>
</head>
<body background="bg11.jpg" style="width: 100%;"><center>
<form method="post" action="checklogin.php" autocomplete="off">

	<div class="contriner-fluid" align='center'>
		<div class="row" style="height : 200px;">
			<div class="col-sm-12" style="background-color: #000066  ; text-align: center" >
				<h1><br><b>ระบบคลังพัสดุ<br></h1>
				<p class="w">Stock system</p>
				<p class="w">มหาวิทยาลัยสงขลานครินทร์ วิทยาเขตสุราษฎร์ธานี</p>
			</div>
		</div>
	</div>
	<br>
	<div class="contriner-fluid" align='center'>
		<div class="row" style="height : 430px;">
			<div class="col-sm-2" style="background-color: ;text-align: center;">
				<br><br><br><br><p class="m">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="psulogo.png" width="70%"></p>
			</div>
			<div class="col-sm-6" style="background-color: ;text-align: center;">
				<div class="container"width="70%">
   					<div class="card" >
    					<br><h4><marquee bgcolor="#A9E0B8"  behavior="alternate">ประชาสัมพันธ์</marquee></h4>
					</div>
				</div>
				<div id="demo" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  					<ul class="carousel-indicators">
    					<li data-target="#demo" data-slide-to="0" class="active"></li>
   						<li data-target="#demo" data-slide-to="1"></li>
    					<li data-target="#demo" data-slide-to="2"></li>
  					</ul>
  <!-- The slideshow -->
  				<div class="carousel-inner">
    				<div class="carousel-item active">
      					<img src="psu1.jpg" alt="Los Angeles" width="90%" height="350px">
      				</div>
    				<div class="carousel-item">
      					<img src="psu3.jpg" alt="Chicago" width="90%" height="350px">
    				</div>
    				<div class="carousel-item">
      					<img src="psu.jpg" alt="New York" width="90%" height="350px">
    				</div>
  				</div>
  <!-- Left and right controls -->
 	 				<a class="carousel-control-prev" href="#demo" data-slide="prev">
    					<span class="carousel-control-prev-icon"></span>
  					</a>
  					<a class="carousel-control-next" href="#demo" data-slide="next">
    					<span class="carousel-control-next-icon"></span>
  					</a>
				</div>	
			</div>

		
			<div class="col-sm-4" style="background-color: ;text-align: center;">
				<div class="container mt-5" style="width: 70% ">
				<div class="card" style="background-color:#b1d9e6">
				
   				<div class="card-body">
      				<img src="psu2.png"width="70px">
     				<br><br><p class="f">Please input your passport account name and your Password / กรุณากรอกบัญชี PSU Passport และรหัสผ่าน</p>


     				<div class="form-group" >
     					<div class="input-group mb-3">
     						<div class="input-group-prepend">	
       			 				<span class="input-group-text">
       			 					<i class="fa fa-user"></i>
       			 				</span>
      						</div>
      						<input type="text" name="username"class="form-control" placeholder="Username" autofocus >
      					</div>
      				</div>

      				<div class="form-group">
     					<div class="input-group mb-3">
     						<div class="input-group-prepend">
       			 				<span class="input-group-text">
       			 					<i class="fa fa-key"></i>
       			 				</span>
      						</div>
      						<input type="text" class="form-control" placeholder="Password"  name="pass">
      					</div>
      				</div>
    				<center>
    					<button type="submit" style=" background-color: #CC9900; color:#000066  "class="btn btn-light" name="submit" >Submit</button>
    				</center>
    			</div>
  				</div>
				</div>
			</div>
		</div>
	</div>

 	   	
</form>	
</center>
</body>
</html>

      						
      						