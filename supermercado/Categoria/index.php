<?php
#Se hace la conexion
include '../conexion.php';
#Trae todas las categorias de la base de datos
$sql="SELECT * FROM `categorias`";
$result = $conn->query($sql);
#Hacer delete
if (isset($_POST['id'])) {
    $id_categoria = $_POST['id'];
    $sqlDelete = "DELETE FROM `categorias` WHERE Id_cat = $id_categoria";
    $conn->query($sqlDelete);

    #Actualizar la lista despues de eliminar
        $sql="SELECT * FROM `categorias`";
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
  <title>Lista de categorías</title>
</head>

<body>
<a href="http://localhost/supermercado/categoria/formulario.html">Crear categoría</a>
<table>
  <tr>
    <th>Nombre de la categoría</th>
    <th>Acciones</th>
  </tr>
  <?php while($row = $result->fetch_assoc()): ?>
  <tr>
    <td><?php echo $row['Nom_cat']; ?></td>
    <td class="acciones">
        <a href="http://localhost/supermercado/categoria/editar.php?id=<?php echo $row['Id_cat'];?>">Editar</a>
        <form action="http://localhost/supermercado/categoria/index.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['Id_cat'];?>">
            <button type="submit">Eliminar</button>
        </form>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
</body>
</html>
