<?php
    if(!isset($_GET['idtodo'])){
        die('id not provided');

    }
    //hier werden durch select gefiltert und dann on $data gespeichert
    require_once('dbconn.php');
    $idtodo = $_GET['idtodo'];
    $sqlb= "select * from todo where idtodo = $idtodo";
    $ergebnis = $conn->query($sqlb);
    if($ergebnis->num_rows !=1){
        die('iduser exestoert nicht');
    }
    $data = $ergebnis->fetch_assoc();
    print_r($data);
?>
<!doctype html>
<html lang="en">
<head>  
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery1124/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  
    <title>Hello, world!</title>
  </head>
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
<form method="post" action="edit1.php?idtodo=<?= $idtodo ?>">
  <div class="createtodo">
    <label for="Titel">Titel</label> 
    <input id="Titel" name="Titel" placeholder="Titel eingeben!" type="text" required="required" class="form-control" value="<?=$data['info']?>">
  </div>
<div class="form-check">
  <input type="radio" class="form-check-input" id="1" name="kat" value="1" >
  <label class="form-check-label" for="1">Hausaufgaben</label><br>
  <input type="radio" class="form-check-input" id="2" name="kat" value="2" >
  <label class="form-check-label" for="2">Schule</label><br>
  <input type="radio" class="form-check-input" id="3" name="kat" value="3" >
  <label class="form-check-label" for="3">Freizeit</label><br>
  <input type="radio" class="form-check-input" id="4" name="kat" value="4" >
  <label class="form-check-label" for="4">Arbeiten</label><br>
</div>
<label for="prio">Priorität:</label>

<select name="prio" id="prio">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
</select>
    </div>
  </div>
  <div class="form-group">
    <label for="info">Informationen</label> 
    <textarea id="info" name="info" cols="40" rows="5" class="form-control" required="required"><?=$data['info']?></textarea>
</div>
<input class="form-control" data-provide="datepicker" data-date-format="yyyy-mm-dd" pattern="\d{4}-\d{1,2}-\d{1,2}" value="<?php echo $zeile[3]; ?>" name="date_end" placeholder="sda">
<?php echo $data['ablaufdate'] ?>
<script>
          $(document).ready(function(){
            var date_input=$('input[name="date_end"]'); //our date input has the name "date"
            var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
            date_input.datepicker({
                format: 'yyyy-mm-dd',
                weekStart: 1,
                container: container,
                todayHighlight: true,
                autoclose: true,
                daysOfWeekHighlighted: "1,2,3,4,5",
                calendarWeeks: true,
                language: "de"
            })
          })
        </script>


</div>
    <button type="submit" class="btn btn-primary" name="sub">Submit</button>
  </div>
</form>
</body>
</html>