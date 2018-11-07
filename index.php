<?php
$mysqli = new mysqli("localhost","root","", "datamodel");
$mysqli->query("SET NAMES utf8");
$data = $mysqli -> query("SELECT * FROM department")

?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>DM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

</head>
<body>
  <div class="container">
    <h1>部門</h1>

  <br><br>
    <table class="table table-striped">
      <tr>
        <td>ID</td>
        <td>名稱</td>

      </tr>
      <?php
      while($rs = mysqli_fetch_row($data)) {
      ?>
       <tr>
        <td><?php echo $rs[0];?></td>
        <td><?php echo $rs[1];?></td>

      </tr>
      <?php
    }
    ?>
  </table>
  </div>
</body>
</html>
