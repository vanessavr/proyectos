<?php
#Se hace la conexion
include '../conexion.php';

#Trae los clientes y su descuento correspondiente
$sql="SELECT clientedescuento.*, cliente.Nom_cli, descuento.Nom_des FROM `clientedescuento` JOIN cliente ON clientedescuento.Id_cli = cliente.Id_cli JOIN descuento ON clientedescuento.Id_des = descuento.Id_des";
$result = $conn->query($sql);

#Hacer delete
if (isset($_POST['id'])) {
    $id_clientedescuento = $_POST['id'];
    $sqlDelete = "DELETE FROM `clientedescuento` WHERE id = $id_clientedescuento";
    $conn->query($sqlDelete);

    #Actualizar la lista despues de eliminar
    $sql="SELECT clientedescuento.*, cliente.Nom_cli, descuento.Nom_des FROM `clientedescuento` JOIN cliente ON clientedescuento.Id_cli = cliente.Id_cli JOIN descuento ON clientedescuento.Id_des = descuento.Id_des";

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
  <title>Lista de clientes</title>
</head>

<body>
<a href="http://localhost/supermercado/clientedescuento/formulario.php">Crear descuento para el cliente</a>
<table>
  <tr>
    <th>Cliente</th>
    <th>Descuento</th>
    <th>Acciones</th>
  </tr>
  <?php while($row = $result->fetch_assoc()): ?>
  <tr>
    <td><?php echo $row['Nom_cli']; ?></td>
    <td><?php echo $row['Nom_des']; ?></td>

    <td class="acciones">
        <a href="http://localhost/supermercado/clientedescuento/editar.php?id=<?php echo $row['id'];?>">Editar</a>
        <form action="http://localhost/supermercado/clientedescuento/index.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <button type="submit">Eliminar</button>
        </form>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
</body>
</html>