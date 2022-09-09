<?php
session_start();
include('dbconn.php');
//wird gebraucht um Zeitzone auszuwählen
date_default_timezone_set("Europe/Berlin");
$timestamp = time();
if(isset($_POST['sub']))
{
//attribute definiert
$titel = $_POST['Titel'];
$info = $_POST['info'];
$Kategorie_idKategorie = $_POST['kat'];
$ablaufdate = $_POST['date_end'];
//heutige tag ausgewählt
$erstdate = date("Y-m-d",$timestamp);
$prio = $_POST['prio'];
$status = 1;
$iduser = $_SESSION['id'];
$stmt = "INSERT INTO `todo` (`titel`, `kategorie_idkategorie`, `info`, `user_iduser`, `erstdate`, `ablaufdate`, `prio`, `status`) VALUES 
('$titel', '$Kategorie_idKategorie', '$info', '$iduser','$erstdate','$ablaufdate','$prio', '$status')";
//echo"$ablaufdate, $Kategorie_idKategorie, $info, $titel, $iduser, $erstdate, $prio, $status ";
//echo $stmt;
if($conn->query($stmt) === TRUE){
  header("Location: todo.php");
}else {
  header("Location: createtodo.php");
}
}
?>