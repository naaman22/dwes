<?php

$original = "ojo";

function palindromo($palabra){
    $longitud = strlen($palabra);
    $nueva = "";
    for ($i = $longitud-1; $i >= 0; $i--) { 
        $nueva = $nueva . $palabra[$i];
    }

    if ($palabra == $nueva){
        return true;
    }else{
        return false;
    }
}

if(palindromo($original)){
    echo "$original si es una palabra palindroma";
}else{
    echo "$original no es una palabra palindroma";
}



//function palindromo($palabra){
//        $longitud = strlen($palabra);
//        for ($i=0; $i < $longitud; $i++) {
//            if ($palabra[$i]!=$palabra[$longitud-$i-1]) {
               
           
//                return false;
//            }
//        }




//        return true;
//    }
//    $palabra = "ojojo";
//    if (palindromo($palabra)){
//        echo "La palabra $palabra es Palindromo";
//    } else {
//        echo "La palabra $palabra no es Palindromo";
//    }

?>