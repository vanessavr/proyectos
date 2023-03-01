<?php

$id_cliente = $_GET["id"];
#Hace la conexion
include '../conexion.php';
#Trae la cliente a editar
$sql="SELECT * FROM `cliente` WHERE Id_cli = $id_cliente LIMIT 1";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

#Actualiza el cliente
if (isset($_POST['Nom_cli'])) {
  $nombre_cliente = $_POST["Nom_cli"];
  $fecha_nacimiento = $_POST["Fec_nac_cli"];
  $telefono = $_POST["Tel_cli"];
  $email = $_POST["Email_cli"];
  $sqlUpdate = "UPDATE `cliente` SET Nom_cli = '$nombre_cliente', Fec_nac_cli = '$fecha_nacimiento', Tel_cli = $telefono, Email_cli = '$email' WHERE Id_cli = $id_cliente";
  $conn->query($sqlUpdate);
#Trae el cliente actualizado
  $sql="SELECT * FROM `cliente` WHERE Id_cli = $id_cliente LIMIT 1";
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
  <title>Registro de clientes</title>
</head>

<body>
<form method="post" action="http://localhost/supermercado/cliente/editar.php?id=<?php echo $row['Id_cli'];?>">
  
  <label for="Nom_cli">Nombre del cliente:</label><br>
  <input type="text" id="Nom_cli" name="Nom_cli" required value="<?php echo $row['Nom_cli']; ?>"><br>

  <label for="Fec_nac_cli">Fecha nacimiento</label><br>
  <input type="date" id="Fec_nac_cli" name="Fec_nac_cli" required value="<?php echo $row['Fec_nac_cli']; ?>"><br>

  <label for="Tel_cli">Teléfono</label><br>
  <input type="number" id="Tel_cli" name="Tel_cli" required value="<?php echo $row['Tel_cli']; ?>"><br>

  <label for="Email_cli">Email</label><br>
  <input type="text" id="Email_cli" name="Email_cli" required value="<?php echo $row['Email_cli']; ?>"><br>
  <input type="submit" value="enviar datos">
</form>

  </form>
</body>
</html>