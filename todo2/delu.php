<?php
require_once('dbconn.php');
if(isset($_POST['username'])){
     $username = $_GET['username'];
     $stmt = "DELETE FROM `user` WHERE username = $username";
     if($conn->query($stmt) === TRUE){
        header("Location: todo.php");
      }else {
          echo "noooo";
        //header("Location: createtodo.php");
      }

 }
 ?>