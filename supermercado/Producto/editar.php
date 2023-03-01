<?php
$id_producto = $_GET['id'];
#Hace la conexion
include '../conexion.php';

#Trae el producto a editar
$sql="SELECT * FROM `productos` WHERE Id_pro = $id_producto LIMIT 1";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

#Trae todas las categorias de la base de datos
$sqlCat="SELECT * FROM `categorias`";
$resultCat = $conn->query($sqlCat);

#Actualiza el producto
if (isset($_POST['Nom_pro'])) {
  $nombre = $_POST['Nom_pro'];
  $stock = $_POST["Stock_pro"];
  $id_categoria = $_POST["Id_cat"];
  $precio_producto = $_POST["Pre_pro"];

  $sqlUpdate = "UPDATE `productos` SET Nom_pro = '$nombre', Stock_pro = $stock, Id_cat = $id_categoria, Pre_pro = $precio_producto WHERE Id_pro = $id_producto";
  $conn->query($sqlUpdate);
  
#Trae el producto actualizado
  $sql="SELECT * FROM `productos` WHERE Id_pro = $id_producto LIMIT 1";
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
  <title>Registro de productos</title>
</head>

<body>
  <form method="post" action="http://localhost/supermercado/producto/editar.php?id=<?php echo $row['Id_pro'];?>">

    <label for="Nom_pro">Nombre del producto:</label><br>
    <input type="text" id="Nom_pro" name="Nom_pro" required value="<?php echo $row['Nom_pro']; ?>"><br>
    
    <label for="Stock_pro">Stock:</label><br>
    <input type="number" id="Stock_pro" name="Stock_pro" required value="<?php echo $row['Stock_pro']; ?>"><br>
  
  <label for="Pre_pro">Precio:</label><br>
    <input type="number" id="Pre_pro" name="Pre_pro" required value="<?php echo $row['Pre_pro']; ?>"><br>
   <!-- llave foranea de Id categoria -->
   <label for="Id_cat">Categoría:</label><br>
  <select name="Id_cat" required id="Id_cat">
  <?php while($rowCat = $resultCat->fetch_assoc()): ?>
    <option value="<?php echo $rowCat['Id_cat']; ?>"  <?= $rowCat['Id_cat'] == $row['Id_cat'] ? 'selected' : ''; ?>><?php echo $rowCat['Nom_cat']; ?></option>
  
  <?php endwhile; ?>
  </select>
  <br>
    <button type="submit">Enviar datos</button>
  </form>
</body>
</html>