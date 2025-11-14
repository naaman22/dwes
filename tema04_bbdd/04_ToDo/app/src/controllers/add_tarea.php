<?php 
    session_start();
    require __DIR__ . '/../../vendor/autoload.php';
    use App\models\Basedatos;
    use App\models\Tarea;

    if(!$_SESSION["conectado"]){
        header("location: ../../public/index.php");
        die;
    }

    $descripcion = $_POST["descripcion"];

    $db = new Basedatos();

    $sql = "INSERT INTO tareas (descripcion) VALUES (:descripcion)";
    $sentencia = $db->ejecutar($sql, [":descripcion" => $descripcion]);

    header("location: ../../src/views/listado.php");
?>