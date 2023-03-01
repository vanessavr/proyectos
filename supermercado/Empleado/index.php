<?php
#Se hace la conexion
include '../conexion.php';
#Trae toda la informacion de empleado de la base de datos
$sql="SELECT * FROM `empleado`";
$result = $conn->query($sql);

#Hacer delete
if (isset($_POST['id'])) {
    $id_empleado = $_POST['id'];
    $sqlDelete = "DELETE FROM `empleado` WHERE Id_emp = $id_empleado";
    $conn->query($sqlDelete);

    #Actualizar la lista despues de eliminar
        $sql="SELECT * FROM `empleado`";
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
  <title>Lista de empleados</title>
</head>

<body>
<a href="http://localhost/supermercado/empleado/formulario.html">Crear empleado</a>
<table>
  <tr>
    <th>Nombre del empleado</th>
    <th>Fecha de nacimiento</th>
    <th>Teléfono</th>
    <th>Caja</th>
    <th>Acciones</th>
  </tr>
  <?php while($row = $result->fetch_assoc()): ?>
  <tr>
    <td><?php echo $row['Nom_emp']; ?></td>
    <td><?php echo $row['Fec_nac_emp']; ?></td>
    <td><?php echo $row['Tel_emp']; ?></td>
    <td><?php echo $row['Caj_emp']; ?></td>
    <td class="acciones">
        <a href="http://localhost/supermercado/empleado/editar.php?id=<?php echo $row['Id_emp'];?>">Editar</a>
        <form action="http://localhost/supermercado/empleado/index.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['Id_emp'];?>">
            <button type="submit">Eliminar</button>
        </form>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
</body>
</html>