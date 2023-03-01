<?php
#Se hace la conexion
include '../conexion.php';

#Trae todas las categorias de la base de datos
$sql="SELECT * FROM `categorias`";
$result = $conn->query($sql);

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
  <title>Registro producto</title>
</head>

<body>
  <form method="post" action="insertar.php">
    <label for="Nom_pro">Nombre del producto:</label><br>
    <input type="text" id="Nom_pro" name="Nom_pro" required><br>
    
    <label for="Stock_pro">Stock:</label><br>
    <input type="number" id="Stock_pro" name="Stock_pro" required><BR>
  
  <label for="Pre_pro">Precio:</label><br>
    <input type="number" id="Pre_pro" name="Pre_pro" required><br>

   <!-- llave foranea de Id categoria -->
  <select name="Id_cat" required id="Id_cat">
  <?php while($row = $result->fetch_assoc()): ?>
    <option value="<?php echo $row['Id_cat']; ?>"><?php echo $row['Nom_cat']; ?></option>
  
  <?php endwhile; ?>
  </select>
    <input type="submit" value="enviar datos" class="submit">
  </form>
  
  
 
</body>
</html>