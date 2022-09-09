<?php
session_start();
include('dbconn.php');

    if(isset($_POST['sub']))
    {
        //Hier wird durch eine sql befehl der User gesucht
        $stmt = "SELECT Password , iduser FROM user WHERE username = '$username'";
        if ($stmt = $conn->prepare('SELECT Password, iduser FROM user WHERE username = ?')) {
        $stmt->bind_param('s', $_POST['username']);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0) {
            $stmt->bind_result($Password, $iduser);
            $stmt->fetch();
            //passwort wird mit gehashete passwort verglichen
            if (password_verify($_POST['password'],$Password)) {
                session_regenerate_id();
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['name'] = $_POST['username'];
                $_SESSION['id'] = $iduser;
                header("Location: todo.php");
                $_SESSION['message'] = "You are Logged In Successfully";
            } else {

                echo 'Incorrect password!';
                $_SESSION['message'] = "Invalid Email or Password";
                header("Location: login.php");
            }
        } else {
            echo 'Incorrect username!';
            $_SESSION['message'] = "Invalid Email or Password";
            header("Location: login.php");
        }
        }
        
}
?>