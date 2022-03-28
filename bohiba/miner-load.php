<?php

    $displayError= "";

    include 'include\db-handler.php';
    include 'header\miner-header.php';

    
    if($_SERVER['REQUEST_METHOD'] == "POST") {

	    $m_uid = $_POST['m-uid'];
        $order_id = $_POST['order-id'];
	    $company_name = $_POST['company-name'];
        $company_city = $_POST['company-city'];
        $company_dist = $_POST['company-dist'];
        $company_state = $_POST['company-state'];
        $company_pin = $_POST['company-pin'];
        $company_gst = $_POST['company-gst'];
	    $material_type = $_POST['material-type'];
	    $grade = $_POST['grade'];
	    $total_material = $_POST['total-material'];
        $price = $_POST['price'];

        if (!empty($company_name) && !empty($company_gst) && !empty($company_city) && !empty($company_dist) && !empty($company_state)) {

            $loadquery= "INSERT INTO miner_load(m_uid,order_id,company_name,company_city,company_dist,company_state,company_pin,company_gst,
            material_type,grade,total_material,price) VALUES('$m_uid','$order_id','$company_name','$company_city','$company_dist','$company_state',
            '$company_pin','$company_gst','$material_type','$grade','$total_material','$price')";

			mysqli_query($conn, $loadquery);
            header('Location: miner-load.php');
            die;

            $uid= $minerdata['miner_uid'];

        }else{
            $displayError= "Complete all field before submitting.";
        }
    }

    //ORDER ID GENERATING
    function checkKeys($conn, $ranStr){
        $sql = "SELECT * FROM miner_load";
        $result = mysqli_query($conn, $sql);
    
        while ($row = mysqli_fetch_assoc($result)) {
    
            if($row['order_id'] == $ranStr){
    
                $keyExist = true;
                break;
            }else{
                $keyExist = false;
            }
        }
    }
    
    function orderID($conn){
        $keyLength = 10;
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
    <meta charset="UTF-8">

    <title>Load</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="css\transporter\transporter-load.css">
    <script src="js/miner/miner_load.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>


<!--Body Section-->
<section class="home-section">
    <div class="home-content">
        <span class="text">Load</span> &nbsp;<i class="bi bi-plus" onclick="openForm()"></i><span>[Add new load]</span>
    </div>
    <div style="height: 15vh;"></div>

    <!--Form For New Load-->
    <div class="formcenter">
        
        <form method="POST" class="card formpopup" id="myForm">

            <i class="bi bi-x" onclick="closeForm()" style="float: right"></i><br>
            <div style="height: 10px"></div>
            <!--input type="hidden" name="load-date"-->
            <input type="hidden"  name="order-id" value="<?php echo orderID($conn)?>" >
            <input type="hidden" name="m-uid" value="<?php echo $minerdata['miner_uid']?>">
            
            <div class="formrow">
                 <!--Load Information-->
                 <div class="formcolumn cardBorder">
                    <label><h3 style="color: #040404; font-weight: normal;">Load Details</h3></label>
                    <div class="formrow">
                        <div class="formcolumn">
                            <input type="text" name="material-type" placeholder="Material Type" required>
                        </div>
                        &nbsp;
                        <div class="formcolumn">
                            <input type="text" placeholder="Material Grade" name="grade" required>
                        </div>
                    </div>                       
                    <div class="formrow">
                        <div class="formcolumn">
                            <input type="text" placeholder="Total Material(in Tonne)" name="total-material" required>
                        </div>
                        &nbsp;
                        <div class="formcolumn">
                            <input type="text" placeholder="Price(per Tonne)" name="price" required>
                        </div>
                    </div>
                    <label class="detail">&nbsp;<input type="checkbox" onclick='chekAll(this)' value="Select All"/>All Vechile<br></label>    
                    <div class="formrow">
                        <div class="formcolumn">
                            <label class="detail"> &nbsp;<input type="checkbox" name="chk" value="6">6 Wheeler</label><br>
                            <label class="detail"> &nbsp;<input type="checkbox" name="chk" value="10">10 Wheeler</label><br>
                            <label class="detail"> &nbsp;<input type="checkbox" name="chk" value="12">12 Wheeler</label><br>
                        </div>
                        <div class="formcolumn">
                            <label class="detail"> &nbsp;<input type="checkbox" name="chk" value="14">14 Wheeler</label><br>
                            <label class="detail"> &nbsp;<input type="checkbox" name="chk" value="16">16 Wheeler</label><br>
                            <label class="detail"> &nbsp;<input type="checkbox" name="chk" value="22">22 Wheeler</label><br>
                        </div>
                    </div> 
                </div>
                <div style="width: 20px"></div>
                
                <!--To Information-->
                <div class="formcolumn cardBorder">
                    <label><h3 style="color: #040404; font-weight: normal;">To</h3></label>
                    
                    <input type="text" placeholder="Company Name" name="company-name" required>
                    <input type="text" placeholder="GST Number" name="company-gst" >
                    
                    <div class="formrow">
                        <div class="formcolumn">
                            <input type="text" placeholder="Village/City" name="company-city" required>
                        </div>
                        &nbsp;
                        <div class="formcolumn">
                            <input type="text" placeholder="District" name='company-dist' required>
                        </div>
                    </div>
                    <div class="formrow">
                        <div class="formcolumn">
                            <input type="text" placeholder="State" name='company-state' required>
                        </div>
                        &nbsp;
                        <div class="formcolumn">
                            <input type="text" placeholder="Pincode" name='company-pin' min-length="6" required>
                        </div>
                    </div>
                </div>
            </div>
            <div style="height:20px"></div>

            <input class="primarybutton" type="submit">
        </form>
    </div>

    <!--Load Table-->
    <div>
        <p style="color: red;"><?php echo $displayError;?></p>
        <table>
            <tr>
                <th>Date</th>
                <th>Order ID</th>
                <th>Company Name</th>
                <th>Location</th>
                <th>GST</th>
                <th>Material Type</th>
                <th>Grade</th>
                <th>Wheeler</th>
                <th>Total Material<p style="font-size: 10px">in Tonne</p></th>
                <th>Price<p style="font-size: 10px">per Tonne</p></th>
            </tr>

            <?php

                $query = "SELECT * FROM miner_load";
                $result = $conn-> query($query);

                if ($result-> num_rows > 0) {
                
                    while ($minerdata = $result-> fetch_assoc()) {
                        
                        echo "<tr><td>". $minerdata['load_date'] ."</td><td>". $minerdata['order_id'] ."</td><td>". 
                            $minerdata['company_name'] ."</td><td>". $minerdata['company_dist'] ."&nbsp;". $minerdata['company_state'] 
                            ."</td><td>". $minerdata['company_gst'] ."</td><td>". $minerdata['material_type'] 
                            ."</td><td>". $minerdata['grade']."</td><td>". $minerdata['company_pin'] ."</td><td>". $minerdata['total_material'] 
                            ."</td><td>". $minerdata['price'] ."</tr></td>" ;
                    }
                }
                else{
                    echo "Yet not posted any load.";
                }
            
            ?>
            </table>

    </div>            
    <div style="height: 90px;"></div>
</section>

  <!--JavaScripts-->
  <script>
      function chekAll(ele) {
        var checkboxes = document.getElementsByName('chk');
        if (ele.checked) {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type=='checkbox') {
                checkboxes[i].checked= true;
                }
            }
        }else {
            for (var i = 0; i < checkboxes.length; i++) {
                if (checkboxes[i].type=='checkbox') {
                    checkboxes[i].checked=false;
                }
            }
        }
    }
  </script>
</body>
</html>
