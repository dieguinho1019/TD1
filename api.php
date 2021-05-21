<?php
header('Content-type: application/json');
$servername = "localhost";
$username = "diego";
$password = "TesisDiego123";
$dbname = "dbSigfox";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {

    $sql = "SELECT * FROM dbSigfox.tblMensajes";
    $result = $conn->query($sql);


    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          //echo "Numero Secuencia: " . $row["numSecuencia"]. " - fecha Hora: " . $row["fechaHora"]. " idDispositivo " . $row["idDispositivo"]. " latitud ".$row["latitud"]. " longitud ".$row["longitud"]. " confianza ".$row["confianza"]. " idUsuario ".$row["idUsuario"]."<br>";
          $emparray["mensaje".$row["numSecuencia"]] = $row;
        }
        echo json_encode($emparray);
      } else {
        echo "0 results";
      }
      $conn->close();
}
