<?php
session_start();
require_once('dbconn.php');
?>
<!doctype html>
<html lang="en">
  <head>  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="shi.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <title>Hello, world!</title>
  </head>
  <?php if (!empty($_SESSION['loggedin'])){?>
  <body>
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Todolist</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="/todo2/todo.php">Home</a></li>
      <li><a href="/todo2/createtodo.php">Do Todos</a></li>
      <li><a href="/todo2/user.php">User</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/todo2/login.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><form method="POST" action="logout.php">
        <button class="btn btn-danger" name="logout">Logout</button>
</form></li>
    </ul>
  </div>
</nav>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Admin</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $sqlb= "select * from user";
    $ergebnis = $conn->query($sqlb);
    while($Ergebnis_als_Array= $ergebnis->fetch_assoc()){
      echo '<tr>
      <td>'.$Ergebnis_als_Array['username'].' </td>
      <td>'.$Ergebnis_als_Array['admin'].' </td>
      <td><form method="POST" action="delu.php">
      <button class="btn btn-danger" name="del">Delete</button>
</form></td>
    </tr>
  </tbody>';
    }
    
  ?>
</table>
<?php }else{?>
  <form action="http://localhost/todo2/login.php">
    <div class="butin">
    <input class="btn btn-primary" type="submit" value="Pls log in!">
  </div>
</form>
<?php }?>
  </body>
</html>