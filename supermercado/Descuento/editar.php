<?php
$id_descuento = $_GET["id"];
#Hace la conexion
include '../conexion.php';
#Trae el descuento a editar
$sql="SELECT * FROM `descuento` WHERE Id_des = $id_descuento LIMIT 1";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

#Actualiza el descuento
if (isset($_POST['Nom_des'])) {
  $nombre_descuento = $_POST['Nom_des'];
  $porcentaje_descuento = $_POST['Por_des'];
  $sqlUpdate = "UPDATE `descuento` SET Nom_des = '$nombre_descuento', Por_des = $porcentaje_descuento WHERE Id_des = $id_descuento";
  $conn->query($sqlUpdate);
#Trae el descuento actualizada
  $sql="SELECT * FROM `descuento` WHERE Id_des = $id_descuento LIMIT 1";
  $result = $conn->query($sql);

  $row = mysqli_fetch_assoc($result);
}
#Cierra el conexion
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="style.css">
  <title>Registro de descuento</title>
</head>

<body>
  <form method="post" action="http://localhost/supermercado/descuento/editar.php?id=<?php echo $row['Id_des'];?>">
    <label for="Nom_des">Nombre del descuento:</label><br>
    <input type="text" id="Nom_des" name="Nom_des" required value="<?php echo $row['Nom_des']; ?>"><br>

    <label for="Por_des">Porcentaje del descuento:</label><br>
    <input type="text" id="Por_des" name="Por_des" required value="<?php echo $row['Por_des']; ?>"><br>
  
    <button type="submit">Enviar datos</button>
  </form>
</body>
</html>