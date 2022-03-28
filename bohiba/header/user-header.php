<?php 
    session_start();
	$_SESSION;
    include 'include\db-handler.php';
	include 'include\function.php';
    
    $userdata = checkLogin($conn);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initaial-scale=1.0">
	<meta name="description" content="Kevtal- India&#x27;s biggest stock broker offering the lowest, cheapest brokerage rates for futures and options, commodity trading, equity and mutual funds" />
	<meta name="keywords" content="discount broker, discount brokerage, lowest brokerage commissions, lowest brokerage fees, indian discount brokerage, indian discount broker, cheap brokerage, discount brokerage bangalore, fixed brokerage bangalore, cheap trading, cheap commodity trading, trading terminal, futures trading, stock broker, fixed stock brokerage, cheapest brokerage, cheapest brokerage in india, online trading, online brokerage, cheap demat account, bangalore broker, commodities trading"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="css\user\user-header.css">
</head>
    <body>
        <nav>
		    <input type="checkbox" id="check">
		    <label for="check" onclick = hamburg() class="humberg">
			    <i class="bi bi-list"></i>
		    </label>

		    <div class="logo"><p>BOHIBA</p></div>
		    <ul>
            	<li><a href="user-dashboard.php">Dashboard</a></li>
			    <li><a href="user-market.php">Market</a></li>
			    <li><a href="user-status.php">Status</a></li>
			    <li><a href="user-track.php">Track</a></li>
				<li class="logout"><a href="user-logout.php">Logout</a></li>
				<li class="profile"><a onclick=toggle()><button><img class= "avatar" src="assets\image\bohibalogo.jpeg" alt="" srcset=""><?php echo $userdata['user_name']?></button></a></li>
			</ul>	
	    </nav>

		<div id= "dropdown">
			<ul>
				<div class= "head">
					<li><a><?php echo $userdata['user_name']?></a></li>	
					<li><a style= "font-size: small"><?php echo $userdata['user_email']?></a></li>
				</div>
				<div class= "hline"></div>
				<div class= "sub-head">
					<a href="user-profile.php"><i class= "bi bi-person"></i>My Profile</a>
					<a href=""><i class= "bi bi-journal"></i><span>Report</span></a>
					<a href=""><i class= "bi bi-calculator"></i><span>Calculator</span></a>
					<div class= "hline"></div>

					<a href="user-support.php"><i class="bi bi-question-square"></i><span>Support</span></a>
					<a href=""><i class= "bi bi-share"></i><span>Invite Friends</span></a>
					<div class= "hline"></div>

					<a href="user-logout.php"><i class="bi bi-box-arrow-right"></i><span>Logout</span></a>				
				</div>
			</ul>
		</div>

		<script>
			function hamburg(){
				let sidebarBtn = document.querySelector(".bi-list");
				console.log(sidebarBtn);
				sidebarBtn.addEventListener("click", ()=>{
  				sidebar.classList.toggle("close")});
			}

			function toggle(){
				var x = document.getElementById("dropdown");
  				if (x.style.display === "block") {
    				x.style.display = "none";
  				} else {
    				x.style.display = "block";
  				}
			}
		</script> 
	</body>
</html>