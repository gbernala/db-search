<?php

$and=$_REQUEST["and"];
$genero;
$edad;
$nombre;
$where ='';

if($and == 1){
  if(isset($_REQUEST['gen_cli'])){
    $genero = $_REQUEST['gen_cli'];
    if ($genero == 0 || $genero ==1 ){
      $where="WHERE gen_cli = '$genero'";
    }
  }
}

  if(isset($_REQUEST['edad_cli'])){
    $edad = $_REQUEST['edad_cli'];
    if ($edad != "" ){
      if($where == ""){
          $where="WHERE edad_cli = '$edad'";
      }

      else {
        $where = "$where AND edad_cli = '$edad'";
      }

    }
  }
  if(isset($_REQUEST['nom_cli'])){
    $nombre = $_REQUEST['nom_cli'];
    if ($nombre != "" ){
      if($where == ""){
          $where="WHERE nom_cli = '$nombre'";
      }

      else {
        $where = "$where AND nom_cli = '$nombre'";
      }

    }
  }


else {
  if(isset($_REQUEST['gen_cli'])){
    $genero = $_REQUEST['gen_cli'];
    if ($genero == 0 || $genero ==1 ){
      $where="WHERE gen_cli = '$genero'";
    }
  }

  if(isset($_REQUEST['edad_cli'])){
    $edad = $_REQUEST['edad_cli'];
    if ($edad != "" ){
      if($where == ""){
          $where="WHERE edad_cli = '$edad'";
      }

      else {
        $where = "$where AND edad_cli = '$edad'";
      }

    }
  }
  if(isset($_REQUEST['nom_cli'])){
    $nombre = $_REQUEST['nom_cli'];
    if ($nombre != "" ){
      if($where == ""){
          $where="WHERE nom_cli = '$nombre'";
      }

      else {
        $where = "$where AND nom_cli = '$nombre'";
      }

    }
  }
}


$host = "localhost";
$dbname = "planagencias";
$username = "root";
$password = "";

$cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

$sql = "SELECT cod_cli,nom_cli,tel_cli,gen_cli,edad_cli FROM clientes $where";

$q = $cnx->prepare($sql);

$result = $q->execute();

$clientes= $q->fetchAll();

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

  <form action="/Consultabasededatos/Reporteclientes.php"method="get">
    <div class="form-group">
      <label for="Codigo Reporteclientes">Edad clientes:</label>
      <input type="text" class="form-control" id="edad" placeholder="edad clientes" name="edad_cli">
    </div>
    <div class="form-group">
      <label for="Name">Nombre clientes:</label>
      <input type="text" class="form-control" id="nombre clientes" placeholder="Digite el nombre" name="nom_cli">
    </div>
    <div class="form-group">
      <label for="genero">Genero</label>
      <select class="form-control" name="gen_cli" placeholder="Seleccione">>
        <option value="0">Femenino</option>
        <option value="1">Masculino</option>
        <option value="2">Todos los datos</option>
      </select>
    </div>

    <button type="submit" class="btn btn-primary" id="and" name="and" value="1">AND</button>
    <button type="submit" class="btn btn-primary" id="and" name="and" value="0">OR</button>
  </form>

  <div class="container">
  <h2>Reportes clientes</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Telefono</th>
        <th>Genero</th>
        <th>Edad</th>
      </tr>
    </thead>
    <tbody>
      <?php
        for ($i=0; $i < count($clientes); $i++) {
      ?>
      <tr>
        <td><?php echo $clientes[$i]["cod_cli"] ?></td>
        <td><?php echo $clientes[$i]["nom_cli"] ?></td>
        <td><?php echo $clientes[$i]["tel_cli"] ?></td>
        <td><?php
                $genero =  $clientes[$i]["gen_cli"];
                if($genero =="0"){
                  echo "femenino";
                }
                else{
                  echo "masculino";
                }
              ?></td>
        <td><?php echo $clientes[$i]["edad_cli"] ?></td>

      </tr>


      <?php
        }
       ?>

    </tbody>
  </table>
</div>
</body>
</html>
