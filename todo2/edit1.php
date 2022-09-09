<?php
require_once('dbconn.php');
if(isset($_GET['idtodo']) && isset ($_POST['sub'])){
    $titel = $_POST['Titel'];
$info = $_POST['info'];
$Kategorie_idKategorie = $_POST['kat'];
$ablaufdate = $_POST['date_end'];
$erstdate = date("Y-m-d",$timestamp);
$prio = $_POST['prio'];
$status = 1;
$iduser = $_SESSION['id'];
$sql = "UPDATE `todo` SET `titel` = $titel, `kategorie_idkategorie`= $Kategorie_idKategorie, `info` = $info,
 `user_iduser` = $iduser, `erstdate` = $erstdate,
 `ablaufdate` = $ablaufdate, `prio` = $prio, `status`=$status WHERE idtodo = $idtodo";
 if($conn->query($stmt) === TRUE){
    header("Location: todo.php");
  }else {
    header("Location: createtodo.php");
  }
}
?>