<?php 
namespace App\models;
require __DIR__ . "/../../vendor/autoload.php";

use PDO;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PDOException;
use PDOStatement;

class Basedatos{
    private PDO | null $conexionPDO;
    private Logger $log;
    private bool $conectado;
    
    public function __construct(){
        $this->log = new Logger('app');
        $this->log->pushHandler(new StreamHandler(__DIR__ . '/../../app.log'));

        //cargar configuracion del json
        $configPath = __DIR__ . '/../config.json';
        $config = json_decode(file_get_contents($configPath), true);

        $dbmotor = $config["dbMotor"];
        $host = $config["mysqlHost"];
        $user = $config["mysqlUser"];
        $password = $config["mysqlPassword"];
        $database = $config["mysqlDatabase"];

        //DSN ejemplo: 'mysql:dbname=test;host=localhost'
        $dsn = "$dbmotor:host=$host;dbname=$database;charset=utf8mb4";

        try {
            $this->conexionPDO = new PDO($dsn, $user, $password);
            $this->conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conectado = true;
        } catch (PDOException $e) {
            $this->conexionPDO = null;
            $this->conectado = false;
            $this->log->error("Fallo en la coneñion con la base de datos");
            $this->log->error($e->getMessage(),['archivo:'=>'basedatos.php']);
        }
    }

    public function estaConectado(){
        return $this->conectado;
    }

    //Metodo para consultas SELECT
    public function get_data(string $sql, array $parametros = []):PDOStatement | null{
        try{
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia->execute($parametros);
            return $sentencia;

        }catch(PDOException $e){
            $this->log->error("Error en el GET DATA");;
            $this->log->error($e->getMessage(),["archivo:"=>"basedatos.php"]);
            return null;
        }
    }

    public function ejecutar(string $sql, array $parametros = []): bool {
        try {
            $sentencia = $this->conexionPDO->prepare($sql);
            return $sentencia->execute($parametros);
        } catch (PDOException $e) {
            $this->log->error("Error en EJECUTAR");
            $this->log->error($e->getMessage(), ["archivo:" => "basedatos.php"]);
            return false;
        }
    }

    public function completar_tarea(int $_id){
        $sql = "UPDATE tareas SET completada = TRUE WHERE id=:id";
        $id = $_id;

        try {
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia -> bindParam(":id", $id);
            $sentencia->execute();
            return true;
        } catch (PDOException $e) {
            $this->log->error("Error en COMPLETAR tarea");
            $this->log->error($e->getMessage(), ["archivo:" => "basedatos.php"]);
            return false;
        }

    }

    public function borrar_tarea(int $_id){
        $sql = "DELETE FROM tareas WHERE id=:id";
        $id = $_id;

        try {
            $sentencia = $this->conexionPDO->prepare($sql);
            $sentencia -> bindParam(":id", $id);
            $sentencia->execute();
            return true;
        } catch (PDOException $e) {
            $this->log->error("Error en COMPLETAR tarea");
            $this->log->error($e->getMessage(), ["archivo:" => "basedatos.php"]);
            return false;
        }

    }

    
}


?>