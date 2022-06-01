<?php
include "data.php";

echo "Connected successfully";
$nombre = $_POST["nombre"];
$img = $_POST["img"];
$veces = $_POST["veces"];
$saga = $_POST["saga"];
$estado = $_POST["estado"];

$sql = 'INSERT INTO juego (nombre, idSaga, idEstado, img, veces) VALUES ("'.$nombre.'", "'.$saga.'", "'.$estado.'", "'.$img.'", '.$veces.')';
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"].'?e='.mysqli_error($conn).'');
}

mysqli_close($conn);

?>