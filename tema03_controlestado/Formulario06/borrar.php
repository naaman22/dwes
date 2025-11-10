<?php
    $lista_libros = [];
    $file = "bbdd/libros.json";
    $jsonData = file_get_contents($file, FILE_USE_INCLUDE_PATH);
    $lista_libros = json_decode($jsonData);

    $nueva_lista = [];

    foreach ($lista_libros as $libro) {
        if($libro->titulo != $_POST["titulo_a_borrar"]){
            array_push($nueva_lista, $libro);
        }
    }

    $jsonData = json_encode($nueva_lista, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    file_put_contents($file, $jsonData);

    header("location: home.php");
?>