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
      <th scope="col">#</th>
      <th scope="col">Titel</th>
      <th scope="col">Informationen</th>
      <th scope="col">Erstell Datum</th>
      <th scope="col">Ablauf Datum</th>
      <th scope="col">Priorität</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    //hier mache ich eine sql statement wo all die todos auswählen, danach wird es alles in eine array gespeichert und durch eine schlaufe geprintet
    $sqlb= "select * from todo";
    $ergebnis = $conn->query($sqlb);
    while($Ergebnis_als_Array= $ergebnis->fetch_assoc()){
      echo "<tr>";
      echo "<th scope='row'>1</th>"; 
      echo "<td>".$Ergebnis_als_Array['Titel']." </td>";
      echo "<td>".$Ergebnis_als_Array['info']." </td>";
      echo "<td>".$Ergebnis_als_Array['erstdate']." </td>";
      echo "<td>".$Ergebnis_als_Array['ablaufdate']." </td>";
      echo "<td>".$Ergebnis_als_Array['prio']." </td>";
      echo "<td>".$Ergebnis_als_Array['status']." </td>";
      echo"<td>";
      echo"<div class='btn-group'>";
      echo"<td> <form action=edit.php?idtodo=$Ergebnis_als_Array[idtodo] method=POST><input type=submit name=benutzer_edit_button class=btn btn-default value=✎></form> </td>";
      echo "<td> <form action=del.php?idtodo=$Ergebnis_als_Array[idtodo] method=POST><input type=submit naem=benutzer_delete_button class=btn btn-default value=🗑></form> </td>";
      echo"</div>";
      echo "</td>";
      echo "</tr>";
      echo "</tbody>";
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



<!--echo "<a class='btn btn-danger' herf='del.php?idtodo=".$Ergebnis_als_Array['idtodo']."'>Delete</a>";
      echo "<a class='btn btn-default' herf='./edit.php?idtodo=".$Ergebnis_als_Array['idtodo']."'>Edit</a>";
