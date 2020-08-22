<?php
if(isset($_SESSION['code_error'])){
	echo $_SESSION['code_error']."</br>";
	unset($_SESSION['code_error']);	
}
if(isset($_POST['submit'])){
	require("inc/connectdb.inc.php");
	$sql = "USE stocksystem";
	if(!$conn->query($sql))
		die("error ".$conn->error);	
$username = (isset($_POST['username']) ? $_POST['username'] : '');
	$pass = (isset($_POST['pass']) ? $_POST['pass'] : '');
	$checkpass = md5($pass);	
	$sql = "SELECT * FROM User WHERE UserName = '$username' AND Password = '$checkpass'";
	$result = $conn->query($sql);
if($result->num_rows > 0) {
		$data = $result->fetch_array();
		$_SESSION['user_right'] = $data['UserRight'];
		$_SESSION['FirstName'] = $data['FirstName'];
		$_SESSION['LastName'] = $data['LastName'];
	}else{
	$_SESSION['code_error'] = "กรุณากรอก Username และ Password ใหม่ค่ะ</br>";
		//echo "<meta http-equiv=\"Refresh\" content=\"0\">";
		header("Location:stock.php");
	}	
	$conn->close();
}
if(isset($_SESSION['user_right'])){
	
		if($_SESSION['user_right']=="admin"){		
			require("homepage.php");
		}else if($_SESSION['user_right']=="user"){	
			require("user.php");
		}
}
if(!(isset($_SESSION['user_right']))){
?>

<?php
}
?>