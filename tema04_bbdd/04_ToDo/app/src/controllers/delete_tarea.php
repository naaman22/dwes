<?php 
    session_start();
    require "../../vendor/autoload.php";
    use App\models\Basedatos;

    $id = $_POST["id"];

    $db = new Basedatos();

    $db->borrar_tarea($id);
    header("location: ../views/listado.php");
    die;
?>