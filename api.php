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
    echo "Connected successfully";


    $sql = "SELECT * FROM dbSigfox.tblMensajes;";
    $result -> $mysqli -> query($sql);
    
    mysqli_fetch_all($result, MYSQLI_ASSOC);

    echo($result);

    $stmt->close();
    $conn->close();

} 

?>