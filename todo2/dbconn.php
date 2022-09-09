<?php

$host = 'localhost';
$database = 'todo3';
$username = 'root';
$password = '';

// mit datenbank verbinden
$conn = new mysqli($host, $username, $password, $database);

// fehlermeldung, falls die Verbindung fehl schlägt.
if ($conn->connect_error) {
    die('Connect Error (' . $conn->connect_error . ') '. $conn->connect_error);
}

?>