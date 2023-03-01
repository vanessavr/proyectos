<?php
#Se hace la conexion
include '../conexion.php';
#Trae todaos los descuentos de la base de datos
$sql="SELECT * FROM `descuento`";
$result = $conn->query($sql);
#Hacer delete
if (isset($_POST['id'])) {
    $id_descuento = $_POST['id'];
    $sqlDelete = "DELETE FROM `descuento` WHERE Id_des = $id_descuento";
    $conn->query($sqlDelete);

    #Actualizar la lista despues de eliminar
        $sql="SELECT * FROM `descuento`";
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
  <title>Lista de descuento</title>
</head>

<body>
<a href="http://localhost/supermercado/descuento/formulario.html">Crear descuento</a>
<table>
  <tr>
    <th>Nombre del descuento</th>
    <th>Porcentaje del descuento</th>
    <th>Acciones</th>
  </tr>
  <?php while($row = $result->fetch_assoc()): ?>
  <tr>
    <td><?php echo $row['Nom_des']; ?></td>
    <td><?php echo $row['Por_des']; ?></td>
    <td class="acciones">

        <a href="http://localhost/supermercado/descuento/editar.php?id=<?php echo $row['Id_des'];?>">Editar</a>
        <form action="http://localhost/supermercado/descuento/index.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['Id_des'];?>">
            <button type="submit">Eliminar</button>
        </form>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
</body>
</html>
