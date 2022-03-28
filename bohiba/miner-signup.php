<?php
	session_start();
	$displayError= "";

	include "include\db-handler.php";
	include "include\miner\check-minerlogin.php";
	//include "header\sub-header.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		$miner_uid = $_POST['miner-uid'];
		$miner_name = $_POST['miner-name'];
		$miner_email = $_POST['miner-email'];
		$miner_phone = $_POST['company-phone'];
		$miner_password = $_POST['miner-password'];

		if(!empty($miner_uid) && !empty($miner_name) && !empty($miner_email) && !empty($miner_phone) && !empty($miner_password)){

			$query= "INSERT INTO miner_signup(miner_uid,miner_name,miner_email,miner_phone,miner_password) VALUES('$miner_uid','$miner_name',
			'$miner_email','$miner_phone','$miner_password')";
			mysqli_query($conn, $query);

			header('Location: index.php');
			die;
			
		}else{
			$displayError="Please fill-up all field and try again.";
		}
	}

function checkKeys($conn, $ranStr){
	$sql = "SELECT * FROM miner_signup";
	$result = mysqli_query($conn, $sql);

	while ($row = mysqli_fetch_assoc($result)) {

		if($row['miner_uid'] == $ranStr){

			$keyExist = true;
			break;
		}else{
			$keyExist = false;
		}
	}
}

function generateKey($conn){
	$keyLength = 6;
	$str = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

	$randStr = substr(str_shuffle($str), 0, $keyLength);
	$checkKey = checkKeys($conn, $randStr);

	while ($checkKey == true) {
		$randStr = substr(str_shuffle($str), 0, $keyLength);
		$checkKey = checkKeys($conn, $randStr);
	}
	return $randStr;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>BOHIBA- Create your account with Bohiba</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initaial-scale=1.0">
	<meta name="description" content="Kevtal- India&#x27;s biggest stock broker offering the lowest, cheapest brokerage rates for futures and options, commodity trading, equity and mutual funds" />
	<meta name="keywords" content="discount broker, discount brokerage, lowest brokerage commissions, lowest brokerage fees, indian discount brokerage, indian discount broker, cheap brokerage, discount brokerage bangalore, fixed brokerage bangalore, cheap trading, cheap commodity trading, trading terminal, futures trading, stock broker, fixed stock brokerage, cheapest brokerage, cheapest brokerage in india, online trading, online brokerage, cheap demat account, bangalore broker, commodities trading"/>

	<link rel="stylesheet" type="text/css" href="css\style.css">
	<script src="js/miner/miner-signup.js"></script>
</head>
<body>
	<div style="height: 130px;"></div>

	<div class="center">
		<!--Client Verification Form-->
		<form class="card" id="minerSignup" method="POST">
			<div style="color: black;">Register to Get Started!</div>
			<p style="color: red;"><?php echo $displayError; ?></p>

			<!--Miner UID-->
			<input type="hidden" name="miner-uid" value=<?php echo generateKey($conn);?>>

			<!--Company Name-->
			<input type="text" name="miner-name" placeholder="Company Name">
			
			<!--Company Email-->
			<input type="email" name="miner-email" placeholder="Email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$">
			
			<!--Company Tel-->
			<input type="tel" name= "company-phone" placeholder="Mobile Number" >

			<!--Company Password-->
			<input type="password" name="miner-password" id="minerpwd" placeholder="Password" minlength="6" >
			
			<input type="checkbox" onclick="myFunction()">
			<label style="color: grey;" for="checkbox"> Show Password</label>
			
			<!--Submit Button-->
			<input class="formbutton" type="submit">
			<p style="color: grey; margin-top: -20px;">Already have an account? <a href="miner-login.php" style= "color:#005cff">Login</a></p>
		</form>
	</div>
</body>
</html>