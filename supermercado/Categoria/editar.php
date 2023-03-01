<?php
$id_categoria = $_GET["id"];
#Hace la conexion
include '../conexion.php';
#Trae la categoria a editar
$sql="SELECT * FROM `categorias` WHERE Id_cat = $id_categoria LIMIT 1";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

#Actualiza la categoria
if (isset($_POST['Nom_cat'])) {
  $nombre = $_POST['Nom_cat'];
  $sqlUpdate = "UPDATE `categorias` SET Nom_cat = '$nombre' WHERE Id_cat = $id_categoria";
  $conn->query($sqlUpdate);
#Trae la categoria actualizada
  $sql="SELECT * FROM `categorias` WHERE Id_cat = $id_categoria LIMIT 1";
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
  <title>Registro de categoría</title>
</head>

<body>
  <form method="post" action="http://localhost/supermercado/categoria/editar.php?id=<?php echo $row['Id_cat'];?>">

    <label for="lname">Nombre categoría:</label><br>
    <input type="text" id="lname" name="Nom_cat" required value="<?php echo $row['Nom_cat']; ?>"><BR>
  
    <button type="submit">Enviar datos</button>
  </form>
</body>
</html>