<?php
$nombres = ["Ana", "Luis", "Carlos", "Marta"];

//For
for ($i=0; $i < count($nombres); $i++) { 
    //echo "Nombre $i: $nombres[$i]<br>";
    echo "Nombre ".($i+1).": $nombres[$i]<br>";
}

echo "-------- <br>";

//ForEach
$cont = 0;
foreach ($nombres as $nombre) {
    $cont++;
    echo "Nombre $cont: $nombre<br>";
}

echo "<br>";

$lista = [];
$lista[] = 34;
$lista[] = "hola";

foreach ($lista as $item) {
    echo "$item<br>";
}
?>