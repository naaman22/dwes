<?php
    function precio(){
        $contador = 0;
        $butaca = $_SESSION["butacas"];
        for($f = 1; $f <= 3; $f++){
            for ($c=1; $c <= 4 ; $c++) {
            if($butaca[$f][$c]==1){
                $contador++;
            }
            }
        }
    return $contador*10;
    }
?>
