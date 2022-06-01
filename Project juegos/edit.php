<?php
include "data.php";
?>
<!DOCTYPE html> 


<html>
	<head>
		<title>mis juegos</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width"/>
		<link href="inicio.css" rel="stylesheet" type="text/css" media="screen"/>
        <link rel="icon" type="image/png" href="imagenes/icono.png" />
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
    </head>
    
	<body>
        
        <?php
        include "nav.php";
        ?>
        <?php  if(isset($_GET['e'])){     
            echo '<h2>'.$_GET["e"].'</h2>';
        }
        ?>
        <section>
            <div> 
                <h1>Nuevo juego</h1>
                <form action="conector3.php" method="POST" id="formulario">
                    <p>
                        <label>Nombre del juego: </label>
                        <?php
                            $query = ("SELECT nombre FROM juego where idJuegos = ".$_GET['e']);
                            $resultID = mysqli_query($conn, $query) or die("Data not found."); 
                            $result = mysqli_fetch_assoc($resultID);
                            echo '<input type="text" name="nombre" value="'.$result["nombre"].'">'
                        ?>
                    </p>
                    <p>
                        <label>Nombre de la saga: </label>
                        <select name="saga" form="formulario">
                            <option value="0">Seleccione:</option>
                            <?php
                                $query = $conn -> query ("SELECT * FROM saga ORDER BY nombre ASC");
                                $query2 = ("SELECT idSaga FROM juego where idJuegos = ".$_GET['e']);
                                $resultID = mysqli_query($conn, $query2) or die("Data not found."); 
                                $result = mysqli_fetch_assoc($resultID);
                                while ($valores = mysqli_fetch_array($query)) {
                                    if ( $result['idSaga'] == $valores['idSaga']){
                                        echo '<option selected value="'.$valores['idSaga'].'">'.$valores['nombre'].'</option>';
                                    } else {
                                        echo '<option value="'.$valores['idSaga'].'">'.$valores['nombre'].'</option>';
                                    }
                                }
                            ?>
                        </select>
                    </p>
                    <p>
                        <?php
                            $query = $conn -> query ("SELECT * FROM estado");
                            $query2 = ("SELECT idEstado FROM juego where idJuegos = ".$_GET['e']);
                            $resultID = mysqli_query($conn, $query2) or die("Data not found."); 
                            $result = mysqli_fetch_assoc($resultID);
                            while ($valores = mysqli_fetch_array($query)) {
                                if ($result['idEstado'] == $valores['idEstado']){
                                    echo '<label class="est">'.$valores['nombre'].'</label> <input checked type="radio" name="estado" value="'.$valores['idEstado'].'">';
                                } else {
                                    echo '<label class="est">'.$valores['nombre'].'</label> <input type="radio" name="estado" value="'.$valores['idEstado'].'">';
                                }
                                
                            }
                        ?>
                    </P>
                    <p>
                        <label>Imagen: </label>
                        <?php
                            $query = ("SELECT img FROM juego where idJuegos = ".$_GET['e']);
                            $resultID = mysqli_query($conn, $query) or die("Data not found."); 
                            $result = mysqli_fetch_assoc($resultID);
                            echo '<input type="text" name="img" value="'.$result['img'].'">'
                        ?>
                    </p>
                    <p>
                        <label>Veces: </label>
                        <?php
                            $query = ("SELECT veces FROM juego where idJuegos = ".$_GET['e']);
                            $resultID = mysqli_query($conn, $query) or die("Data not found."); 
                            $result = mysqli_fetch_assoc($resultID);
                            echo '<input type="number" name="veces" min="0" max="5" value="'.$result['veces'].'">'
                        ?>
                    </p>
                    <p class="boton">
                        <button type="submit" name="Introducir datos" value="Submit">Insertar</button>
                    </p>
                    <input type="hidden" name="idJuego" value="<?php echo $_GET['e'] ?>">
                </form>
            </div>
        </section>
	</body>
</html>