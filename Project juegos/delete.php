<?php
include "data.php";

echo "Connected successfully";

$sql = 'DELETE FROM juego WHERE idJuegos = "'.$_POST['id'].'"';

if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);

?>