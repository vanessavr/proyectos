<?php
#Se hace la conexion
include '../conexion.php';
#Trae todos los productos, clientes y empleados a la base de datos
$sqlpro="SELECT * FROM `productos`";
$resultpro = $conn->query($sqlpro);

$sqlcli="SELECT * FROM `cliente`";
$resultcli = $conn->query($sqlcli);

$sqlemp="SELECT * FROM `empleado`";
$resultemp = $conn->query($sqlemp);


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
  <title>Factura</title>
</head>

<body>
  <form method="post" action="insertar.php">
    <label for="cant_pro">Cantidad del producto:</label><br>
    <input type="number" id="cant_pro" name="cant_pro" required><br>
    <br>
    <label for="tip_pag">Tipo de pago:</label><br>
    <select name="tip_pag" id="tip_pag" required>
      <option value="Efectivo">Efectivo</option>
      <option value="Tarjeta de credito">Tarjeta de credito</option>
      <option value="Tarjeta debito">Tarjeta debito</option>
      <option value="PSE">PSE</option> 
    </select>

  <br>
   <label for="fec_fac">Fecha de la factura:</label><br>
    <input type="date" id="fec_fac" name="fec_fac" required><br>

   <!-- llave foranea de Id producto, Id cliente, Id empleado -->
  <select name="Id_pro" required id="Id_pro">
  <?php while($row = $resultpro->fetch_assoc()): ?>
    <option value="<?php echo $row['Id_pro']; ?>"><?php echo $row['Nom_pro']; ?></option>
  <?php endwhile; ?>
  </select>
<br>
  <select name="Id_cli" required id="Id_cli">
  <?php while($row = $resultcli->fetch_assoc()): ?>
    <option value="<?php echo $row['Id_cli']; ?>"><?php echo $row['Nom_cli']; ?></option>
  <?php endwhile; ?>
  </select>
<br>

  <select name="Id_emp" required id="Id_emp">
  <?php while($row = $resultemp->fetch_assoc()): ?>
    <option value="<?php echo $row['Id_emp']; ?>"><?php echo $row['Nom_emp']; ?></option>
  
  
  
  <?php endwhile; ?>
  </select>
  <br>
    <input type="submit" value="enviar datos">
  </form>
  
  
 
</body>
</html>