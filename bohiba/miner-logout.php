<?php
    session_start();

    if (isset($_SESSION['miner_uid'])) {

        unset($_SESSION['miner_uid']);
    
    }
    header('Location: index.php');
?>
