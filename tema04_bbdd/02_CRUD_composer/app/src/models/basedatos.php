<?php
    namespace App\models;

    require __DIR__ . "/../../vendor/autoload.php";

    use App\models\Usuario;
    //require_once __DIR__ . "/../config.php";

    use PDO;
    use PDOException;

    class Basedatos{

        private ?PDO $conexionPDO;
        private static $instancia;
        private $dbmotor;
        private $host;
        private $database;
        private $username;
        private $password;

        //Constructor
        private function __construct(){
            // global $dbMotor;
            // global $mysqlHost;
            // global $mysqlDatabase;
            // global $mysqlUser;
            // global $mysqlPassword;

            //Lo cargamos desde el json
            $configPath = __DIR__ . '/../config.json';
            $config = json_decode(file_get_contents($configPath), true);

            $this->dbmotor = $config["dbMotor"];
            $this->host = $config["mysqlHost"];
            $this->database = $config["mysqlDatabase"];
            $this->username = $config["mysqlUser"];
            $this->password = $config["mysqlPassword"];

            $dsn_conbbdd = "$this->dbmotor:host=$this->host;dbname=$this->database;charset=utf8mb4";
            $dsn_sinbbdd = "$this->dbmotor:host=$this->host;charset=utf8mb4";

            try {
                $this->conexionPDO = new PDO($dsn_conbbdd, $this->username, $this->password);
                //echo "<p>Exito en la conexionPDO a la bbdd con PDO</p>";
            } catch (PDOException $e) {
                print "<p>ERROR: No puede conectarse con la base de datos!! {$e->getMessage()}</p>\n";
            }

            $this->conexionPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        public function getMessage(){
            
        }

        
        public static function getInstance(){
            if(!self::$instancia){
                self::$instancia = new self();
            }
            return self::$instancia;
        }
        

        public function getConnection():PDO | null{
            return $this->conexionPDO;
        }

        public function get_data($sql){
            try{
                $sentencia = $this->conexionPDO->prepare($sql);
                $sentencia->execute();
                return $sentencia;
            }catch(PDOException $e){
                echo $e->getMessage();
                die;
            }
        }

        public function borrar_usuario(int $_id){
            $sql = "DELETE FROM usuarios WHERE id = :id";


            try{
                $sentencia = $this->conexionPDO->prepare($sql);
                $sentencia -> bindParam(":id", $_id);
                $sentencia -> execute();
                return true;

            }catch(PDOException $e){
                echo $e->getMessage();
                die;
            }
        }

        public function crear_usuario(Usuario $usuario){
            $nombre = $usuario->nombre;
            $apellidos = $usuario->apellidos;
            $usu = $usuario->usuario;
            $password = $usuario->password;
            $fecha_nac = $usuario->fecha_nac->format("Y-m-d");

            $sql = "INSERT INTO usuarios(nombre,apellidos,usuario,password,fecha_nac) VALUES(:nombre,:apellidos,:usuario,:password,:fecha_nac)";

            try {
                $sentencia = $this->conexionPDO->prepare($sql);
                $sentencia -> bindParam(":nombre", $nombre);
                $sentencia -> bindParam(":apellidos", $apellidos);
                $sentencia -> bindParam(":usuario", $usu);
                $sentencia -> bindParam(":password", $password);
                $sentencia -> bindParam(":fecha_nac", $fecha_nac);
                $sentencia -> execute();
                return true;
            } catch (PDOException $e) {
                echo $e->getMessage();
                die;
            }
        }

        public function actualizar_usuario(Usuario $usuario){

            $id = $usuario->id;
            $nombre = $usuario->nombre;
            $apellidos = $usuario->apellidos;
            $usu = $usuario->usuario;
            $password = $usuario->password;
            $fecha_nac = $usuario->fecha_nac->format("Y-m-d");

            if(is_null($password)){
                $sql = "UPDATE usuarios
                SET nombre = :nombre,
                apellidos = :apellidos,
                usuario = :usuario,
                fecha_nac = :fecha_nac
                WHERE id = :id";


            }else{
                $sql = "UPDATE usuarios
                    SET     nombre = :nombre,
                            apellidos = :apellidos,
                            usuario = :usuario,
                            password = :password,
                            fecha_nac = :fecha_nac
                    WHERE id = :id";
            }

            try{

                $sentencia = $this->conexionPDO->prepare($sql);
                 $sentencia -> bindParam(":id", $id);
                $sentencia -> bindParam(":nombre", $nombre);
                $sentencia -> bindParam(":apellidos", $apellidos);
                $sentencia -> bindParam(":usuario", $usu);
                if(!is_null($password)){
                    $sentencia -> bindParam(":password", $password);
                }
                $sentencia -> bindParam(":fecha_nac", $fecha_nac);
                $sentencia -> execute();

                var_dump($sentencia->queryString);

                $sentencia -> execute();
                return true;

            }catch(Exception $e){
                echo $e->getMessage();
                die;
            }
            
        }
    }
?>