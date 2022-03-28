<?php
    ob_start();
    session_start();
    $_SESSION;

    include 'include\db-handler.php';
    include 'include\miner\check-minerlogin.php';
     
    $minerdata = checkLogin($conn);
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initaial-scale=1.0">
	<meta name="description" content="Kevtal- India&#x27;s biggest stock broker offering the lowest, cheapest brokerage rates for futures and options, commodity trading, equity and mutual funds" />
	<meta name="keywords" content="discount broker, discount brokerage, lowest brokerage commissions, lowest brokerage fees, indian discount brokerage, indian discount broker, cheap brokerage, discount brokerage bangalore, fixed brokerage bangalore, cheap trading, cheap commodity trading, trading terminal, futures trading, stock broker, fixed stock brokerage, cheapest brokerage, cheapest brokerage in india, online trading, online brokerage, cheap demat account, bangalore broker, commodities trading"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css/transporter/transporter-header.css">
</head>
    
    <body>
        <!--Side-Nav Bar-->
        <div class="sidebar close">
            <div class="logo-details">
                <i class='bi bi-list' ></i>
                <span class="logo_name">BOHIBA</span>
            </div>
            
            <ul class="nav-links">
                <!--Dashboard-->
                <li>
                    <div class="iocn-link">
                        <a href="miner-dashboard.php">
                            <i class="bi bi-grid"></i>
                            <span class="link_name">Dashboard</span>
                        </a>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="miner-dashboard.php">Dashboard</a></li>
                    </ul>
                </li>

                <!--Load-->
                <li>
                    <div class="iocn-link">
                        <a href="miner-load.php">
                        <i class="bi bi-minecart-loaded"></i>
                            <span class="link_name">Load</span>
                        </a>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="miner-load.php">Load</a></li>
                    </ul>
                </li>

                <!--Orders-->
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class="bi bi-bag"></i>
                            <span class="link_name">Orders</span>
                        </a>
                        <i class="bi bi-chevron-down arrow"></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Orders</a></li>
                        <li><a href="#">Open</a></li>
                        <li><a href="#">Load</a></li>
                        <li><a href="#">Complete</a></li>
                    </ul>
                </li>

                <!--History-->
                <li>
                    <div class="iocn-link">
                        <a href="miner-profile.php">
                            <i class="bi bi-clock-history"></i>
                            <span class="link_name">History</span>
                        </a>
                    </div>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">History</a></li>
                    </ul>
                </li>

                <!--Documentation-->
                <li>
                    <div class="iocn-link">
                        <a href="miner-verification.php">
                            <i class="bi bi-collection"></i>
                            <span class="link_name">Documentation</span>
                        </a>
                    </div>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="miner-verification.php">Documentation</a></li>
                    </ul>
                </li>

                <!--Profile-->
                <li>
                    <div class="iocn-link">
                        <a href="miner-profile.php">
                            <i class="bi bi-person"></i>
                            <span class="link_name">Profile</span>
                        </a>
                    </div>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="miner-profile.php">Profile</a></li>
                    </ul>
                </li>

                <!--Settings-->
                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class="bi bi-gear"></i>
                            <span class="link_name">Settings</span>
                        </a>
                    </div>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Settings</a></li>
                    </ul>
                </li>

                <!--Help Center-->
                <li>
                    <div class="iocn-link">
                        <a href="miner-profile.php">
                            <i class="bi bi-question-circle"></i>
                            <span class="link_name">Help Center?</span>
                        </a>
                    </div>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Help Center?</a></li>
                    </ul>
                </li>

                <!--Logout-->
                <li>
                    <div class="profile-details">
                        <div class="profile-content">
                            <!--img src="assets\image\bohibalogo.jpeg" alt="profileImg"-->
                        </div>
                        <div class="name-job">
                            <div class="profile_name"> <?php echo $minerdata['miner_name']?></div>
                            <div class="job">MINER</div>
                        </div>
                        <a href="miner-logout.php"><i class="bi bi-box-arrow-left"></i></a>
                    </div>
                </li>
            </ul>
        </div>

        <script>
            //Humberg
            let arrow = document.querySelectorAll(".arrow");
            for (var i = 0; i < arrow.length; i++) 
            {
                arrow[i].addEventListener("click", (e)=>
                {
                    let arrowParent = e.target.parentElement.parentElement;//selecting main parent of arrow
                    arrowParent.classList.toggle("showMenu");
                });
            }
            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".bi-list");
            console.log(sidebarBtn);
            sidebarBtn.addEventListener("click", ()=>{
              sidebar.classList.toggle("close");
            });
        </script>
    </body>
</html>