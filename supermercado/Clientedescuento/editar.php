<?php
$id = $_GET['id'];
#Hace la conexion
include '../conexion.php';
#Trae el clientedescuento a editar
$sql="SELECT * FROM `clientedescuento` WHERE id = $id LIMIT 1";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

#Trae todas las tablas de los clientes y descuento de la base de datos
$sqlCat="SELECT * FROM `cliente`";
$resultCat = $conn->query($sqlCat);

$sqldes="SELECT * FROM `descuento`";
$resultdes = $conn->query($sqldes);

#Actualiza clientedescuento
if (isset($_POST['Id_cli'])) {
  $id_cliente = $_POST['Id_cli'];
  $id_descuento = $_POST["Id_des"];
 

  $sqlUpdate = "UPDATE `clientedescuento` SET Id_cli = $id_cliente, Id_des = $id_descuento WHERE id = $id";
  $conn->query($sqlUpdate);
#Trae la informacion actualizada
  $sql="SELECT * FROM `clientedescuento` WHERE id = $id LIMIT 1";
  $result = $conn->query($sql);

  $row = mysqli_fetch_assoc($result);
}
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
  <title>Registro de descuentos</title>
</head>

<body>
  <form method="post" action="http://localhost/supermercado/clientedescuento/editar.php?id=<?php echo $row['id'];?>">


   <!-- llave foranea de Id categoria -->
   <label for="Id_cli">Cliente:</label><br>
  <select name="Id_cli" required id="Id_cli">
  <?php while($rowCat = $resultCat->fetch_assoc()): ?>
    <option value="<?php echo $rowCat['Id_cli']; ?>"  <?= $rowCat['Id_cli'] == $row['Id_cli'] ? 'selected' : ''; ?>><?php echo $rowCat['Nom_cli']; ?></option>
  
  <?php endwhile; ?>
  </select>
  <br>
  <label for="Id_des">Descuento:</label><br>
  <select name="Id_des" required id="Id_des">
  <?php while($rowdes = $resultdes->fetch_assoc()): ?>
    <option value="<?php echo $rowdes['Id_des']; ?>"  <?= $rowdes['Id_des'] == $row['Id_des'] ? 'selected' : ''; ?>><?php echo $rowdes['Nom_des']; ?></option>
  
  <?php endwhile; ?>
  </select>
    <button type="submit">Enviar datos</button>
  </form>
</body>
</html>