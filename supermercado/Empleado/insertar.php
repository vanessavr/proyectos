<?php
$nombre_empleado = $_POST["Nom_emp"];
$tel_empleado = $_POST["Tel_emp"];
$fecha_nacimiento = $_POST["Fec_nac_emp"];
$caja = $_POST["Caj_emp"];

#Conexion
include '../conexion.php';
#Hace la insersion del nuevo empleado
$sql="insert into empleado (Nom_emp, Tel_emp, Fec_nac_emp, Caj_emp) values('$nombre_empleado', $tel_empleado, '$fecha_nacimiento', $caja)";
if ($conn->query($sql) === TRUE) {
  echo "se creo un nuevo empleado";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
#Cierra conexion
$conn->close();
?>