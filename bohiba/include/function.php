<?php
    function checkLogin($conn){
        
       if ( isset($_SESSION['user_email'])) {

           $id = $_SESSION['user_email'];
           $query = "SELECT * FROM user_signup WHERE user_email = '$id' LIMIT 1";

           $result = mysqli_query($conn, $query);
           if($result && mysqli_num_rows($result) > 0) {
               $userdata = mysqli_fetch_assoc($result);
               return $userdata;
           }
       }
       header("Location: user-login.php");
       die;
    }
?>