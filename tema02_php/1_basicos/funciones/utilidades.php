<?php

function mayot($lista){
    $mayor = $lista[0];

    foreach ($lista as $value) {
        if($value > $mayor){
            $mayor = $value;
        }
    }

    return $mayor;
}


function mayor_numero($lista){

    $mayor = $lista[0];
    foreach ($lista as $value) {
        
        if(!is_integer($value)){
            throw new Exception("$value no es un numero entero");
        }else{
            if($value > $mayor){
                $mayor = $value;
            }
        }
    }
    return $mayor;
}
?>