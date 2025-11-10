<?php

    session_start();
    require_once "../models/basedatos.php";


    if($_SERVER["REQUEST_METHOD"] != "POST"){
        die;
    }else{
        $id = $_POST["id_a_borrar"];
        $dbInstancia = Basedatos::getInstance();

        $dbInstancia->borrar_usuario($id);
        header("location: ../views/listado.php");
    }

    


?>