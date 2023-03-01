<?php
#Se hace la conexion
include '../conexion.php';
#Trae todos los clientes de la base de datos
$sql="SELECT * FROM `cliente`";
$result = $conn->query($sql);

#Hacer delete
if (isset($_POST['id'])) {
    $id_cliente = $_POST['id'];
    $sqlDelete = "DELETE FROM `cliente` WHERE Id_cli = $id_cliente";
    $conn->query($sqlDelete);

    #Actualizar la lista despues de eliminar
        $sql="SELECT * FROM `cliente`";
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
<a href="http://localhost/supermercado/cliente/formulario.html">Crear cliente</a>
<table>
  <tr>
    <th>Nombre del cliente</th>
    <th>Fecha de nacimiento</th>
    <th>Teléfono</th>
    <th>Email</th>
    <th>Acciones</th>
  </tr>
  <?php while($row = $result->fetch_assoc()): ?>
  <tr>
    <td><?php echo $row['Nom_cli']; ?></td>
    <td><?php echo $row['Fec_nac_cli']; ?></td>
    <td><?php echo $row['Tel_cli']; ?></td>
    <td><?php echo $row['Email_cli']; ?></td>
    <td class="acciones">
        <a href="http://localhost/supermercado/cliente/editar.php?id=<?php echo $row['Id_cli'];?>">Editar</a>
        <form action="http://localhost/supermercado/cliente/index.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['Id_cli'];?>">
            <button type="submit">Eliminar</button>
        </form>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
</body>
</html>
