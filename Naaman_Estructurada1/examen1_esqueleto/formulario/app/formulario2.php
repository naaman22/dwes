<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/estilos.css" title="Color">
  <title>Sticky</title>
</head>

<body class="body-gris">
  <header>
    <h1>FORMULARIO DE MATRICULACION</h1>
    <h2>Eleccion de materias de XXXXXX</h2>
  </header>
  <main>
    <form action="procesar2.php" method="POST">
          <?php
            if(isset($_SESSION["curso"]) && $_SESSION["curso"] == "daw1"){
              echo "<input type='checkbox' name='clase1' value='programacion'>Programación<br />";
              echo "<input type='checkbox' name='clase1' value='basedatos'>Bases de Datos<br />";
              echo "<input type='checkbox' name='clase1' value='lmarcas'>Lenguaje de Marcas<br />";
              echo "<input type='checkbox' name='clase1' value='ingles'>Ingles<br />";
              echo "<input type='checkbox' name='clase1' value='digitalizacion'>Digitalizacion<br />";

            }elseif(isset($_SESSION["curso"]) && $_SESSION["curso"] == "daw2"){
              echo "<input type='checkbox' name='clase2' value='servidor'>Desarrollo Web Servidor<br />";
              echo "<input type='checkbox' name='clase2' value='cliente'>Desarrollo Web Cliente<br />";
              echo "<input type='checkbox' name='clase2' value='interfaces'>Diseño de Interfaces<br />";
              echo "<input type='checkbox' name='clase2' value='ia'>IA generativ<br />";
              echo "<input type='checkbox' name='clase2' value='despliegue'>Despliegue<br />";
            }
          ?>
        <p>
            <button type="submit" name="boton" id="boton" value="anterior">ANTERIOR</button>  
            <button type="submit" name="boton" id="boton" value="mostrar">MOSTRAR DATOS</button>
        </p>    
    </form>
            <?php
              if(isset($_SESSION["errorC"])) echo $_SESSION["errorC"];
            ?>
  </main>
  <footer>
    <hr>
    <p>IES Floridablanca</p>
  </footer>
</body>

</html>



