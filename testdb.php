<?php
$servername = "localhost";
$username = "diego";
$password = "TesisDiego123";
$dbname = "dbSigfox";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
else
{
    echo "Connected successfully2";
    
    $stmt = $conn->prepare("INSERT INTO tblMensajes (numSecuencia, fechaHora, idDispositivo, latitud, longitud, confianza, idUsuario) VALUES (?,?,?,?,?,?,?);");
    $stmt->bind_param("isiddii", $numSecuencia, $fechaHora, $idDispositivo, $latitud, $longitud, $confianza, $idUsuario);


    $numSecuencia=12;
    $fechaHora="2021-04-05 13:03:20";
    $idDispositivo=2312;
    $latitud=-0.12246449291706085;
    $longitud=-78.4659194946289;
    $confianza=75;
    $idUsuario=3;
    $rc = $stmt->execute();

    $stmt->close();
    $conn->close();

}    
?>