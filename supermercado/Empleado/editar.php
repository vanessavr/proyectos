<?php
$id_empleado = $_GET["id"];
#Hace la conexion
include '../conexion.php';
#Trae la empleado a editar
$sql="SELECT * FROM `empleado` WHERE Id_emp = $id_empleado LIMIT 1";
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

#Actualiza el empleado
if (isset($_POST['Nom_emp'])) {
  $nombre_empleado = $_POST['Nom_emp'];
  $fecha_nacimiento = $_POST["Fec_nac_emp"];
  $telefono = $_POST["Tel_emp"];
  $caja= $_POST["Caj_emp"];

  $sqlUpdate = "UPDATE `empleado` SET Nom_emp = '$nombre_empleado', Fec_nac_emp = '$fecha_nacimiento', Tel_emp = $telefono, Caj_emp = $caja WHERE Id_emp = $id_empleado";
  $conn->query($sqlUpdate);
#Trae la tabla del empleado actualizada
  $sql="SELECT * FROM `empleado` WHERE Id_emp = $id_empleado LIMIT 1";
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
  <title>Registro de empleado</title>
</head>

<body>
  <form method="post" action="http://localhost/supermercado/empleado/editar.php?id=<?php echo $row['Id_emp'];?>">

    <label for="lname">Nombre empleado:</label><br>
    <input type="text" id="lname" name="Nom_emp" required value="<?php echo $row['Nom_emp']; ?>"><BR>
    

   <label for="Fec_nac_emp">Fecha nacimiento</label><br>
   <input type="date" id="Fec_nac_emp" name="Fec_nac_emp" required value="<?php echo $row['Fec_nac_emp']; ?>"><br>

   <label for="Tel_emp">Teléfono</label><br>
   <input type="number" id="Tel_emp" name="Tel_emp" required value="<?php echo $row['Tel_emp']; ?>"><br>

   <label for="Caj_emp">Caja</label><br>
   <input type="text" id="Caj_emp" name="Caj_emp" required value="<?php echo $row['Caj_emp']; ?>"><br>
  
    <button type="submit">Enviar datos</button>
  </form>
</body>
</html>