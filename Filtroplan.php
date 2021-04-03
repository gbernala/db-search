<?php
$host = "localhost";
$dbname = "planagencias";
$username = "root";
$password = "";

$cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$sql = "SELECT cod_plan,nom_plan,dest_plan,valor_plan,nom_age FROM planturistico as pl JOIN agencias as ag ON pl.nit_age = ag.nit_age";

$q = $cnx->prepare($sql);

$result = $q->execute();

$Planturistico= $q->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Consulta</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

  <form action="/Consultabasededatos/Reporteplan.php"method="post">
    <div class="form-group">
      <label for="Nombre PlanTuristico">Nombre PlanTuristico:</label>
      <input type="text" class="form-control" id="nombre" placeholder="nombre PlanTuristico" name="nom_plan">
    </div>
    <div class="form-group">
      <label for="Destino">Destino PlanTuristico:</label>
      <input type="text" class="form-control" id="Destino PlanTuristico" placeholder="Digite el Destino" name="dest_plan">
    </div>
    <div class="form-group">
      <label for="Nombre Agencias">Nombre Agencias:</label>
      <input type="text"class="form-control" id="Nombre agencias" placeholder="Nombre Agencias" name="nom_age">
    </div>
    <button type="submit" class="btn btn-primary" id="and" name="and" value="1">AND</button>
    <button type="submit" class="btn btn-primary" id="and" name="and" value="0">OR</button>
    </form>
  <div class="container">
  <h2>Reportes plan</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Destino</th>
        <th>valorPlan</th>
        <th>nombre agencia</th>
      </tr>
    </thead>
    <tbody>
      <?php
        for ($i=0; $i < count($Planturistico); $i++) {
      ?>
      <tr>
        <td><?php echo $Planturistico[$i]["cod_plan"] ?></td>
        <td><?php echo $Planturistico[$i]["nom_plan"] ?></td>
        <td><?php echo $Planturistico[$i]["dest_plan"] ?></td>
        <td><?php echo $Planturistico[$i]["valor_plan"] ?></td>
        <td><?php echo $Planturistico[$i]["nom_age"] ?></td>

      </tr>


      <?php
        }
       ?>

    </tbody>
  </table>
</div>
</body>
</html>
