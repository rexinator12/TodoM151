<?php
include('dbconn.php');
//durch betätigen des sub knopf, wird diese prepared statement ausgeführt
if(isset($_POST['sub']))
{
$stmt = $conn->prepare("INSERT INTO user (username, password, admin) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $username, $password, $admin);
//wird nachgeschaut, ob es nicht empty ist und es wird getrimt
if(empty(trim($_POST["username"]))){
    $username_err = "Please enter username.";
} else{
    $username = $_POST["username"];
}
if(empty(trim($_POST["password"]))){
    $password_err = "Please enter your password.";
} else{
    $passwordt = $_POST["password"];
}
//spezielle zeichen werden maskiert
$username = mysqli_real_escape_string($conn, $username);
//Passwort wird gehasht
$passwordh = password_hash($passwordt, PASSWORD_DEFAULT);
$password = $passwordh;
// 0 = Kein admin
$admin = 0;

$stmt->execute();
header("Location: login.php");
}
?>
<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"><title>Page Title</title>
</head>
<body>
<form action="createlog.php" method="post">
<div class="container py-5 h-100">
    <div class="row d-flex justify-content-center">
      <div class="col-20 col-md-8 col-lg-12 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">
            <h3 class="mb-5">create login in</h3>

            <div class="form-outline mb-4">
              <input type="text" name="username" class="form-control form-control-lg" />
              <label class="form-label" for="username">Username</label>

            </div>

            <div class="form-outline mb-4">
              <input type="password" name="password" class="form-control form-control-lg" />
              <label class="form-label" for="password">Password</label>
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-start mb-4">
              <input
                class="form-check-input"
                type="checkbox"
                value=""
                id="form1Example3"
              />
              <label class="form-check-label" for="form1Example3"> Remember password </label>
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit" name="sub">Login</button>
            </form>
            <hr class="my-4">

          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
    
