<?php
include "data.php";
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Mis juegos</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<meta name="viewport" content="width=device-width"/>
		<link href="terminados.css" rel="stylesheet" type="text/css" media="screen"/>
        <link rel="icon" type="image/png" href="imagenes/icono.png" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js"></script>
        


        <script src="misjuegos.js"></script>

    </head>

    <body>
        <?php
        include "nav.php";
        ?>
        <div class="filtros">
            <img >
            <img >
        </div>
        <section>
            <?php
                $query = $conn -> query ("SELECT j.idJuegos Id, j.veces Veces, j.nombre Juego, s.nombre Saga, e.nombre Estado, j.img Imagen from juego j
                INNER JOIN saga s
                ON s.idSaga = j.idSaga
                INNER JOIN estado e
                ON e.idEstado = j.idEstado 
                WHERE j.idEstado = 2
                order by j.idJuegos desc");
                while ($valores = mysqli_fetch_array($query)) {
                    if ($valores['Estado']== 'por pasar'){
                        $estado = 'red';
                        $estado2 = 'Planeo pasarme';
                    } else if ($valores['Estado']== 'pasando'){
                        $estado = 'orange';
                        $estado2 = 'En proceso';
                    } else {
                        $estado = 'rgb(8, 153, 8)';
                        $estado2 = 'Terminados';
                    }
                    if ($valores['Veces'] == '0'){
                        $veces ='none';
                    } else {
                        $veces ='block';
                    }
                    
                    echo "<article>";
                    echo "<div style='overflow:hidden'>";
                    echo "<p style='background-color:".$estado."' class='estado'>".$estado2."</p>";
                    echo "<p style='display:".$veces."' class='veces'>".$valores['Veces']."</p>";
                    echo "<img class='imgjuego' src=".$valores['Imagen'].">";
                    echo "</div>";
                    echo "<div class='nome' onclick='deletee(".$valores['Id'].")'>";
                    echo "<p>".$valores['Juego']."</p>";
                    echo "<p>".$valores['Saga']."</p>";
                    echo "</div>";
                    echo "</article>";
                }
            ?>
            
        </section>
        <?php
        include "footer.php";
        ?>
    </body>
</html>