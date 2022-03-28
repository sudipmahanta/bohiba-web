<?php
	session_start();
	$displayError = "";

	include 'include\db-handler.php';
	include 'include\miner\check-minerlogin.php';
	include "header\sub-header.php";

	if ($_SERVER['REQUEST_METHOD'] == "POST") {

		$miner_uid = $_POST['miner_uid'];
		$miner_password = $_POST['miner_password'];

		if (!empty($miner_uid) && !empty($miner_password)) {

			$query = "SELECT * FROM miner_signup WHERE miner_uid = '$miner_uid' LIMIT 1";

			mysqli_query($conn, $query);
			$result = mysqli_query($conn, $query);

			if ($result) {
				
				if ($result && mysqli_num_rows($result) > 0) {

					$minerdata = mysqli_fetch_assoc($result);
					
					if ($minerdata['miner_password'] === $miner_password) {

						$_SESSION['miner_uid'] = $minerdata['miner_uid'];

						header('Location: miner-dashboard.php');
						die;
					}
				}
			}
			$displayError='Invalid Email or Password. Please try again.';
		}else{
			echo $displayError;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>BOHIBA- Provide Complete Solution for Transporting</title>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initaial-scale=1.0">
	<meta name="description" content="Kevtal- India&#x27;s biggest stock broker offering the lowest, cheapest brokerage rates for futures and options, commodity trading, equity and mutual funds" />
	<meta name="keywords" content="discount broker, discount brokerage, lowest brokerage commissions, lowest brokerage fees, indian discount brokerage, indian discount broker, cheap brokerage, discount brokerage bangalore, fixed brokerage bangalore, cheap trading, cheap commodity trading, trading terminal, futures trading, stock broker, fixed stock brokerage, cheapest brokerage, cheapest brokerage in india, online trading, online brokerage, cheap demat account, bangalore broker, commodities trading"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/miner/miner_login.js"></script>
</head>
<body>
	<div style="height: 20vh; "></div>
	
	<form method="POST" class="card form_center">
		<h1 style="color: #005cff;">We are Minner</h1>
		<h4 style="color: grey; font-size: 15px;">Signup or track your existing application</h4>
		
		<p style="color: red;"><?php echo $displayError; ?></p>
		
		<!--email-->
		<input type="text" placeholder="User ID" name="miner_uid" required>
			
		<!--Password-->
		<input type="password" placeholder="Password" name="miner_password" required>
		
		<input type="checkbox" onclick="myFunction()">
		<label style="color: grey;" for="checkbox"> Show Password</label>
		<a href="#" style="float: right; color:#005cff;">Forgot Password?</a>
		<div style= "height: 4vh"></div>
		
		<!--Continue Button-->
		<button type="submit" class="formbutton" >Continue</button>
		<p style="color: grey; margin-top: -20px;">Don't have an account? <a href="miner-signup.php" style= "color:#005cff">Register Now</a></p>
	</form>	
</body>
</html>