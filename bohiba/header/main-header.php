
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initaial-scale=1.0">
	<meta name="description" content="Kevtal- India&#x27;s biggest stock broker offering the lowest, cheapest brokerage rates for futures and options, commodity trading, equity and mutual funds" />
	<meta name="keywords" content="discount broker, discount brokerage, lowest brokerage commissions, lowest brokerage fees, indian discount brokerage, indian discount broker, cheap brokerage, discount brokerage bangalore, fixed brokerage bangalore, cheap trading, cheap commodity trading, trading terminal, futures trading, stock broker, fixed stock brokerage, cheapest brokerage, cheapest brokerage in india, online trading, online brokerage, cheap demat account, bangalore broker, commodities trading"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
</head>
    <body>
        <nav>
		    <input type="checkbox" id="check">
		    <label for="check" class="humberg">
			    <i class="fa fa-bars"></i>
		    </label>

		    <div class="logo"><p><a href="index.php" style="color: #047bfc;">BOHIBA</a></p></div>
		    <ul>
			<li>
				<a href="user-login.php">Login</a></li>
			    <li><a href="product.php">Product</a></li>
			    <li><a href="pricing.php">Pricing</a></li>
				<li><a href="about.php">About</a></li>
			    <li><a href="support.php">Support</a></li>
			    <li><i class= "bi bi-telephone"></i><a href="tel:8249860429"> +91-8249860429</a></li>
			</ul>	
	    </nav>

		<script>
			let arrow = document.querySelectorAll(".arrow");
				for (var i = 0; i < arrow.length; i++)
				{
  					arrow[i].addEventListener("click", (e)=>{
 						let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
 						arrowParent.classList.toggle("showMenu");
  					});
				}
					let sidebar = document.querySelector(".sidebar");
					let sidebarBtn = document.querySelector(".bx-menu");
					console.log(sidebarBtn);
					sidebarBtn.addEventListener("click", ()=>{
  					sidebar.classList.toggle("close")});
		</script> 
    </body>
</html>