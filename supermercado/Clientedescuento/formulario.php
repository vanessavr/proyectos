<?php
#Se hace la conexion
include '../conexion.php';
#Trae todos los clientes y descuentos de la base de datos
$sql="SELECT * FROM `cliente`";
$resultCli = $conn->query($sql);

$sqldes="SELECT * FROM `descuento`";
$resultdes = $conn->query($sqldes);


#Cierra la conexion
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Registro descuento para clientes</title>
</head>

<body>
  <form method="post" action="insertar.php">

   <!-- llave foranea de Id cliente, Id descuento -->

  <label for="Id_cli">Cliente:</label><br>
  <select name="Id_cli" required id="Id_cli">
  <?php while($row = $resultCli->fetch_assoc()): ?>
    <option value="<?php echo $row['Id_cli']; ?>"><?php echo $row['Nom_cli']; ?></option>
  
  <?php endwhile; ?>
  </select>
  <br>
  <label for="Id_des">Descuento:</label><br>
  <select name="Id_des" required id="Id_des">
  <?php while($row = $resultdes->fetch_assoc()): ?>
    <option value="<?php echo $row['Id_des']; ?>"><?php echo $row['Nom_des']; ?></option>
  
  <?php endwhile; ?>

  </select>
  <br>
    <input type="submit" value="enviar datos">
  </form>
  
  
 
</body>
</html>