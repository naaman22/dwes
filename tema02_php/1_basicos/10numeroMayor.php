<?php

function mayor($array){
    $numMay = 0;

    foreach ($array as $item) {
        if($item > $numMay){
            $numMay = $item;
        }
    }
    return $numMay;
}

$lista = [3,6,11,8,9];

echo "El mayor valor es: ".mayor($lista);