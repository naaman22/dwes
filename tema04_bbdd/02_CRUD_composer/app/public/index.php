<?php
session_start();

require __DIR__ . "/../vendor/autoload.php";

use App\models\Basedatos;

//Nos conectamos a la base de datos
$dbInstancia = Basedatos::getInstance();


if ($dbInstancia->getConnection()!=null){
    //Hemos conectado bien. 
    $_SESSION["conectado"]=true;
   
    header ("Location: ../src/views/listado.php");
}else{
    echo "ERROR en la conexion a la base de datos.";
    die;
}
?>
