<?php

function recogerArticulos(){
    $datos = [];
    $file = './articulos.json';

    $jsonData = file_get_contents($file, FILE_USE_INCLUDE_PATH);
    $datos = json_decode($jsonData);

    return $datos;
}


?>

