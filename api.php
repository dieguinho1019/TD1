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
    echo "Connected successfully 2";


    $sql = "SELECT * FROM dbSigfox.tblMensajes;";
    $result -> $conn -> query($sql);
    
    $result -> fetch_all(MYSQLI_ASSOC);

    var_dump($result);
    echo($result);

    $stmt->close();
    $conn->close();

    echo "Query  2";
} 

?>