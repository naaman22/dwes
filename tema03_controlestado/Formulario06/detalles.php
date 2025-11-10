<?php
    session_start();
    include "./funciones/utilidades.php";

    $lista_libros = [];
    $file = "bbdd/libros.json";
    $jsonData = file_get_contents($file, FILE_USE_INCLUDE_PATH);
    $lista_libros = json_decode($jsonData);

    foreach ($lista_libros as $libro) {
        if($libro->titulo == $_POST["titulo_a_ver"]){
            $src = $libro->caratula;
            $titulo = $libro->titulo;
            $autor = $libro->autor;
            $generos = $libro->generos;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./estilos.css">
</head>
<body>
    <?php
        include "./menu.php"
    ?>

    <div>
        <img src="./bbdd/portadas/<?=$src?>" alt="">
        <h1><?=$titulo?></h1>
        <h3><?=$autor?></h3>
    </div>
</body>
</html>