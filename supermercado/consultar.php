<?php
$servername = "localhost";
$username = "sergio";
$password = "123456789";
$dbname = "grupo1bd";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// aquÃ­ va todo ok
$sql = "SELECT cod,nom,edad from alumnos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "código: " . $row["cod"]. " - Nombre del : <b>" . utf8_encode($row["nom"]). "</b> " . $row["edad"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>