<?php
#Se hace la conexion
include '../conexion.php';

#Trae los productos y su categoria correspondiente
$sql="SELECT productos.*, categorias.Nom_cat FROM `productos` JOIN categorias ON productos.Id_cat = categorias.Id_cat";
$result = $conn->query($sql);

#Hacer delete del producto
if (isset($_POST['id'])) {
    $id_producto = $_POST['id'];
    $sqlDelete = "DELETE FROM `productos` WHERE Id_pro = $id_producto";
    $conn->query($sqlDelete);

    #Actualizar la lista despues de eliminar
    $sql="SELECT productos.*, categorias.Nom_cat FROM `productos` JOIN categorias ON productos.Id_cat = categorias.Id_cat";

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
  <title>Lista de productos</title>
</head>

<body>
<a href="http://localhost/supermercado/producto/formulario.php">Crear producto</a>
<table>
  <tr>
    <th>Nombre del producto</th>
    <th>Stock</th>
    <th>Precio</th>
    <th>Categoría</th>
    <th>Acciones</th>
  </tr>
  <?php while($row = $result->fetch_assoc()): ?>
  <tr>
    <td><?php echo $row['Nom_pro']; ?></td>
    <td><?php echo $row['Stock_pro']; ?></td>
    <td><?php echo $row['Pre_pro']; ?></td>
    <td><?php echo $row['Nom_cat']; ?></td>
    <td class="acciones">
        <a href="http://localhost/supermercado/producto/editar.php?id=<?php echo $row['Id_pro'];?>">Editar</a>
        <form action="http://localhost/supermercado/producto/index.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['Id_pro'];?>">
            <button type="submit">Eliminar</button>
        </form>
    </td>
  </tr>
  <?php endwhile; ?>
</table>
</body>
</html>