<?php
include "data.php";

echo "Connected successfully";
$nombre = $_POST["nombre"];
$img = $_POST["img"];
$veces = $_POST["veces"];
$saga = $_POST["saga"];
$estado = $_POST["estado"];

$sql = 'UPDATE juego SET nombre="'.$nombre.'", idSaga='.$saga.', idEstado='.$estado.', img="'.$img.'", veces='.$veces.' WHERE idJuegos = '.$_POST["idJuego"];
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: todos.php" );
}

mysqli_close($conn);

?>