<?php
include "data.php";

echo "Connected successfully";
$nombre = $_POST["nombre"];

$sql = 'INSERT INTO saga (nombre) VALUES ("'.$nombre.'")';

if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

if (isset($_SERVER["HTTP_REFERER"])) {         header("Location: " . $_SERVER["HTTP_REFERER"]);     }
?>