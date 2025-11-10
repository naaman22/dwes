<?php

## Recogemos los datos con POST, y solo permitimos POST

if ($_SERVER["REQUEST_METHOD"] != "POST"){
    
    echo ("⚠️ Petición no válida (Hay que pasar por el formlario)");
    //Volvemos al formulario
    print "<p><a href='index.html'>Formulario</a></p>";

}else{
    if(isset($_POST["nombre"]) && $_POST["nombre"]!=""){
        $nombre = trim(htmlspecialchars(strip_tags($_POST["nombre"])));
    }else{
        $nombreError = "No se ha indicado el nombre";
    }

    if(isset($_POST["edad"]) && $_POST["edad"]!=""){
        $edad = trim(htmlspecialchars(strip_tags($_POST["edad"])));
    }else{
        $edadError = "No se ha indicado la edad";
    }

    
    //muestro datos
    if(isset($nombre)){
        echo ("Nombre: $nombre <br>");
    }else{
        echo ("ERROR: $nombreError <br>");
    }

    if(isset($edad)){
        echo ("Edad: $edad");
    }else{
        echo ("ERROR: $edadError");
    }
}