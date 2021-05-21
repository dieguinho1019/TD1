<?php
$mysqli = new mysqli("localhost","diego","TesisDiego123","dbSigfox");

if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

$sql = "SELECT * FROM tblMensajes";
$result -> $mysqli -> query($sql);

// Fetch all
$result -> fetch_all(MYSQLI_ASSOC);

// Free result set
$result -> free_result();

$mysqli -> close();
echo "Query success";
?>