<?php

function dividir($a, $b){

    if($a == 0 || $b == 0){
        throw new Exception("ERROR: Division por cero");
    }else{
        return $a/$b;
    }

}

$x = 1;
$y = 2;

try{
    echo "$x dividido entre $y es ".number_format(dividir($x,$y),2);
}
catch(Exception $e){
    echo ($e->getMessage());
}



//-------------------//

echo "<hr>";

require_once ("funciones/utilidades.php");

$lista = [2, 14, 8, 12, 3];

try{
    echo "El mayor es: ".mayor_numero($lista)."<br>";
}
catch(Exception $e){
    echo ($e -> getMessage());
}
?>