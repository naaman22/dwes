<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //Compruebo que existe el campo nombre y no esta vacio
    if(isset($_POST["nombre"]) && $_POST["nombre"] != ""){
        $nombre = trim((htmlspecialchars((strip_tags(($_POST["nombre"]))))));
    }else{
        $nombreError = ("ERROR: No se ha escrito ningun nombre");
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./estilos.css" title="Color">
  <title>form_02</title>
</head>

<body>
  <header>
    <h1>Formulario 02 - el form recibe los datos</h1>
  </header>
  <main>
    
    <!-- usar 
       action = "< ?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"  
     -->
    <form action="index.php" method="post">
        <fieldset>
          <legend>Envio tipo POST</legend>
          <p>
            <!-- al usar <label> y que coincida con el id del <input> correspondiente, permite que al hacer click 
            en el texto del <label>, el cursor se coloque directamente en el campo asociado -->
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre">
          </p>
          <p>
            <label for="edad">Edad:</label>
            <input type="number" id="edad" name="edad">
          </p>

            <p>
                <input type="radio" id="sexo_masculino" name="sexo" value="M">
                <label for="sexo_masculino">Masculino</label>
                <input type="radio" id="sexo_femenino" name="sexo" value="F">
                <label for="sexo_femenino">Femenino</label>
                <input type="radio" id="sexo_raro" name="sexo" value="R">
                <label for="sexo_raro">Raro</label>
            </p>

            <p>
                <input type="checkbox" name="aficiones" value="musica"> Musica <br>
                <input type="checkbox" name="aficiones" value="cine"> Cine <br>
                <input type="checkbox" name="aficiones" value="lectura"> Lectura <br>
            </p>
        </fieldset>

          <p>
            <button type="submit">Enviar</button>
            <button type="reset">Borrar</button>
          </p>

          

    </form>


    
    <br><br>
    <div class="datos-recibidos">
        <?php

            if(isset($_POST["edad"]) && $_POST["nombre"] != ""){
                if(is_numeric($_POST["edad"]) && $_POST["edad"] > 0 && $_POST["edad"] < 150){
                    $edad = trim(htmlspecialchars(strip_tags($_POST["nombre"])));
                }else{
                        $errorEdad = ("ERROR: Te equivocaste con el formato de la edad");
                }
            }else{
                $errorEdad = ("ERROR: No se ha escrito ninguna edad");
            }

            if(isset($nombre)){
                echo ("<p class='datos-recibidos'>Nombre: $nombre</p>");
            }else{
                echo ("<p class='error'>$nombreError</p>");
            }

            if(isset($edad)){
                echo ("<p class='datos-recibidos'>Edad: $edad</p>");
            }else{
                echo ("<p class='error'>$errorEdad</p>");
            }

        ?>
    </div>
    

    
  </main>
  <footer>
    <hr>
    <p>Autor: Naaman Lopez Valera</p>
  </footer>
</body>

</html>