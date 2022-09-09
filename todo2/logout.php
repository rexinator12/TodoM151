<?php 
 session_start();
 //session wird gelöscht
 if(isset($_REQUEST['logout'])){
     session_destroy();
     unset($_SESSION['name']);
     header("Location: login.php");
    }
    //if(isset($_REQUEST['del'])){
      //  $stmt = ""
        //header("Location: user.php");
       //}
   
?>