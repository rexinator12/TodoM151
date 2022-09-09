<?php
 require_once('dbconn.php');
//wird durch sql befehl einträge gelöscht
 if(isset($_GET['idtodo'])){
     $idtodo = $_GET['idtodo'];
     $stmt = "DELETE FROM `todo` WHERE idtodo = $idtodo";
     if($conn->query($stmt) === TRUE){
        header("Location: todo.php");
      }else {
          echo "noooo";
        //header("Location: createtodo.php");
      }

 }

?>