<?php
    session_start();

   



    if($_POST["boton"] == "anterior"){
        header("location: formulario1.php");
    }elseif($_POST["boton"] == "mostrar"){
        // $_SESSION["errorC"] = "";
        // $listaClases = $_POST["clase1"];
        // if(count($listaClases)<3){
        //     $_SESSION["errorC"] = "Debes marcar al menos 3 clases";
        //     header("location: formulario2.php");
        // }
        //El count me da error, creo que no se crea como array pero bueno,
        header("location: mostrar.php");
    }
?>