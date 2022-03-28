<?php
include 'header\miner-header.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">

    <!--Page Title-->
    <title>Miner Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css\transporter\transporter-profile.css">
    
    <!--JavaScripts-->
    <script src="js\miner\t-profile.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>

  <!--Body Section-->
<section class="home-section">
    <div class="home-content">
        <span class="text">Profile</span>
    </div>

    <!--Profile Card-->
    <div class= "pcard">
        <div class="row">
            <div class="column">
                <img class= "avatar center" src="assets\image\bohibalogo.jpeg" alt="" srcset="">
            </div>
            <div class="column pcenter word-wrap">
                <h5><?php echo $minerdata['miner_name']?></h5>
                <h6>User ID: <?php echo $minerdata['miner_uid']?></h6>
            </div>
        </div>
    </div>
    <div style="height: 20px;"></div>

    <div class= "row-td">
        <!--Company Details-->
        <div class= "column-td card">
            <h3>Company Detail</h3>
    
            <h5>Company Name</h5>
            <?php echo $minerdata['miner_name']?>
            <div style="height: 2vh"></div>

            <div class= "row">
                <div class= "column">
                    <h5>License Name</h5>
                    <?php echo $minerdata['miner_phone']?>
                </div>
                <div class= "column word-wrap">
                    <h5>License Number</h5>
                    <?php echo $minerdata['miner_licence']?>
                </div>
            </div>
            <div style="height: 2vh"></div>
            
            <div class= "row">
                <div class= "column">
                    <h5>PAN Number</h5>
                    <?php echo $minerdata['miner_pan']?>
                </div>
                <div class= "column word-wrap">
                    <h5>GST Number</h5>
                    <?php echo $minerdata['miner_gst']?>
                </div>
            </div>
        </div>
        <!--Bank Details-->
        <div class= "column-td card">
            <h3>Bank Detail <i class= "bi bi-pencil"></i></h3>
    
            <h5>A/c Number</h5>
            <?php echo $minerdata['miner_phone']?>
            <div style="height: 2vh"></div>
    
            <h5>IFSC</h5>
            <?php echo $minerdata['miner_phone']?>
            <div style="height: 2vh"></div>
    
            <h5>Branch</h5>
            <?php echo $minerdata['miner_phone']?>
        </div>
        <!--Other Details-->
        <div class= "column-td card">
            <h3>Other Detail <i class= "bi bi-pencil"></i></h3>

            <div class= "row">
                <div class= "column">
                    <h5>Mobile Number</h5>
                    <?php echo $minerdata['miner_phone']?>
                </div>
                <div class= "column word-wrap">
                    <h5>Website</h5>
                    <?php echo $minerdata['miner_website']?>
                </div>
            </div>
            <div style="height: 2vh"></div>
            
            <h5>E-mail</h5>
            <?php echo $minerdata['miner_email']?>
            <div style="height: 2vh"></div>   

            <div class="word-wrap">
                <h5>Address</h5>
                <?php echo $minerdata['miner_city'] ."&nbsp;". $minerdata['miner_dist']?>
                <?php echo $minerdata['miner_state'] ."&nbsp;" . $minerdata['miner_pin']?>
            </div>
        </div> 
   </div>
    
</section>
</body>
</html>
