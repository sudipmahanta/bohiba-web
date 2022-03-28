<?php
    function checkLogin($conn){
        
       if ( isset($_SESSION['miner_uid'])) {
           $id = $_SESSION['miner_uid'];
           $query = "SELECT * FROM miner_signup WHERE miner_uid = '$id' LIMIT 1";

           $result = mysqli_query($conn, $query);
           if($result && mysqli_num_rows($result) > 0) {
               $minerdata = mysqli_fetch_assoc($result);
               return $minerdata;
           }
            header('Location: miner-login.php');
            die;
       }
    }
?>