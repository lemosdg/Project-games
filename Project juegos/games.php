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
        <script src="misjuegos.js"></script>
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
                <form action="conector.php" method="POST" id="formulario">
                    <p>
                        <label>Nombre del juego: </label>
                        <input type="text" name="nombre">
                    </p>
                    <p>
                        <label>Nombre de la saga: </label>
                        <select name="saga" form="formulario">
                            <option value="0">Seleccione:</option>
                            <?php
                                $query = $conn -> query ("SELECT * FROM saga ORDER BY nombre ASC");
                                while ($valores = mysqli_fetch_array($query)) {
                                    echo '<option value="'.$valores['idSaga'].'">'.$valores['nombre'].'</option>';
                                }
                            ?>
                        </select>
                    </p>
                    <p>
                        <?php
                            $query = $conn -> query ("SELECT * FROM estado");
                            while ($valores = mysqli_fetch_array($query)) {
                                echo '<label class="est">'.$valores['nombre'].'</label> <input type="radio" name="estado" value="'.$valores['idEstado'].'">';
                            }
                        ?>
                    </P>
                    <p>
                        <label>Imagen: </label>
                        <input type="text"  name="img">
                    </p>
                    <p>
                        <label>Veces: </label>
                        <input type="number" name="veces" min="0" max="5" >
                    </p>
                    <p class="boton">
                        <button type="submit" name="Introducir datos" value="Submit">Insertar</button>
                    </p>
                </form>
            </div>
            <div>
                <h1>Nueva saga</h1>
                <form action="conector2.php" method="POST">
                    <p>
                        <label>Nombre del Saga: </label>
                        <input type="text" name="nombre">
                    </p>
                    <p class="boton">
                        <button type="submit" name="Introducir datos" value="Submit">Insertar</button>
                    </p>
                </form>
            </div>
        </section>
	</body>
</html>