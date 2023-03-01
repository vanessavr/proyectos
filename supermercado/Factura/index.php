<?php
#Se hace la conexion
include '../conexion.php';

#Trae los productos, empleados y cliented correspondiente a la base de datos
$sql="SELECT factura.*, productos.Nom_pro, cliente.Nom_cli, empleado.Nom_emp FROM `factura` JOIN productos ON factura.Id_pro = productos.Id_pro JOIN cliente ON factura.Id_cli = cliente.Id_cli JOIN empleado ON factura.Id_emp = empleado.Id_emp" ;
$result = $conn->query($sql);

#Hacer delete en la factura
if (isset($_POST['id'])) {
    $id_factura = $_POST['id'];
    $sqlDelete = "DELETE FROM `factura` WHERE Id_fac = $id_factura";
    $conn->query($sqlDelete);

    #Actualizar la lista despues de eliminar
    $sql="SELECT factura.*, productos.Nom_pro, cliente.Nom_cli, empleado.Nom_emp FROM `factura` JOIN productos ON factura.Id_pro = productos.Id_pro JOIN cliente ON factura.Id_cli = cliente.Id_cli JOIN empleado ON factura.Id_emp = empleado.Id_emp" ;

    $result = $conn->query($sql);
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
  <title>Factura</title>
</head>

<body>
<a href="http://localhost/supermercado/factura/formulario.php">Crear factura</a>
<table>
  <tr>
    <th>Cantidad del producto</th>
    <th>Tipo de pago</th>
    <th>Fecha</th>
    <th>Producto</th>
    <th>Cliente</th>
    <th>Empleado</th>

    <th>Acciones</th>
  </tr>
  <?php while($row = $result->fetch_assoc()): ?>
  <tr>
    <td><?php echo $row['cant_pro']; ?></td>
    <td><?php echo $row['tip_pag']; ?></td>
    <td><?php echo $row['fec_fac']; ?></td>
    <td><?php echo $row['Nom_pro']; ?></td>
    <td><?php echo $row['Nom_cli']; ?></td>
    <td><?php echo $row['Nom_emp']; ?></td>
    <td class="acciones">
        <a href="http://localhost/supermercado/factura/editar.php?id=<?php echo $row['Id_fac'];?>">Editar</a>
        <form action="http://localhost/supermercado/factura/index.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['Id_fac'];?>">
            <button type="submit">Eliminar</button>
        </form>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
</body>
</html>