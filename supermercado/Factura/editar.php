<?php
$id_factura = $_GET['id'];
#Hace la conexion
include '../conexion.php';
#Trae el producto a editar
$sql="SELECT * FROM `factura` WHERE Id_fac = $id_factura LIMIT 1";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);


#Trae todas las tablas en informacios de la base de datos requerida
$sqlCat="SELECT * FROM `factura`";
$resultCat = $conn->query($sqlCat);

$sqlPro="SELECT * FROM `productos`";
$resultPro = $conn->query($sqlPro);

$sqlCli="SELECT * FROM `cliente`";
$resultCli = $conn->query($sqlCli);

$sqlEmp="SELECT * FROM `empleado`";
$resultEmp = $conn->query($sqlEmp);

#Actualiza la factura
if (isset($_POST['cant_pro'])) {
  $cantidad_producto = $_POST['cant_pro'];
  $tipo_pago = $_POST["tip_pag"];
  $fecha = $_POST["fec_fac"];
  $id_producto = $_POST["Id_pro"];
  $id_cliente = $_POST["Id_cli"];
  $id_empleado = $_POST["Id_emp"];

  $sqlUpdate = "UPDATE `factura` SET cant_pro = '$cantidad_producto', tip_pag = '$tipo_pago', fec_fac = '$fecha', Id_pro = $id_producto, Id_cli = $id_cliente, Id_emp = $id_empleado WHERE Id_fac = $id_factura";
  $conn->query($sqlUpdate);
#Trae la factura actualizada
  $sql="SELECT * FROM `factura` WHERE Id_fac = $id_factura LIMIT 1";
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
  <title>Registro de factura</title>
</head>

<body>
  <form method="post" action="http://localhost/supermercado/factura/editar.php?id=<?php echo $row['Id_fac'];?>">

    <label for="cant_pro">Cantidad del producto:</label><br>
    <input type="number" id="cant_pro" name="cant_pro" value="<?php echo $row['cant_pro']; ?>"><br>
    
    <label for="tip_pag">Tipo de pago:</label><br>
    <select name="tip_pag" id="tip_pag">
      <option value="Efectivo" <?= 'Efectivo' == $row['tip_pag'] ? 'selected' : ''; ?>>Efectivo</option>
      <option value="Tarjeta de credito" <?php 'Tarj= de credito' == $row['tip_pag'] ? 'selected' : ''; ?>>Tarjeta de credito</option>
      <option value="Tarjeta debito" <?p='Tarjeta debito' == $row['tip_pag'] ? 'selected' : ''; ?>>Tarjeta debito</option>
      <option value="PSE" <?= 'PSE' == $row['tip_pag'] ? 'selected' : ''; ?>>PSE</option> 
    </select>
  <br>
  <label for="fec_fac">Fecha:</label><br>
    <input type="date" id="fec_fac" name="fec_fac" required value="<?php echo $row['fec_fac']; ?>"><br>

   <!-- llave foranea de Id producto, Id cliente, Id empleado -->
   <label for="Id_pro">Producto:</label><br>
  <select name="Id_pro" required id="Id_pro">
  <?php while($rowPro = $resultPro->fetch_assoc()): ?>
    <option value="<?php echo $rowPro['Id_pro']; ?>"  <?php $rowPro['Id_pro'] == $row['Id_pro'] ? 'selected' : ''; ?>><?php echo $rowPro['Nom_pro']; ?></option>
  
  <?php endwhile; ?>
  </select>
<br>
 <label for="Id_cli">Cliente:</label><br>
  <select name="Id_cli" required id="Id_cli">
  <?php while($rowCli = $resultCli->fetch_assoc()): ?>
    <option value="<?php echo $rowCli['Id_cli']; ?>"  <?php $rowCli['Id_cli'] == $row['Id_cli'] ? 'selected' : ''; ?>><?php echo $rowCli['Nom_cli']; ?></option>
  
  <?php endwhile; ?>
  </select>
  <br>
  <label for="Id_emp">Empleado:</label><br>
  <select name="Id_emp" required id="Id_emp">
  <?php while($rowEmp = $resultEmp->fetch_assoc()): ?>
    <option value="<?php echo $rowEmp['Id_emp']; ?>"  <?php $rowEmp['Id_emp'] == $row['Id_emp'] ? 'selected' : ''; ?>><?php echo $rowEmp['Nom_emp']; ?></option>
  
  <?php endwhile; ?>
  </select>
  <br>

    <button type="submit">Enviar datos</button>
  </form>
</body>
</html>