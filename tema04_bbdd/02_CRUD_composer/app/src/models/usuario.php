<?php
    namespace App\models;
    // require __DIR__ . "/../../vendor/autoload.php";


    use JsonSerializable;
    use DateTime;
     class Usuario implements JsonSerializable {
        private int | null $id;
        private string $nombre;
        private string $apellidos;
        private string $usuario;
        private string | null $password;
        private DateTime $fecha_nac;

        public function __construct(int | null $id, string $nombre, string $apellidos, string $usuario, string $passwordCifrado, DateTime $fecha_nac) {
            $this->id = $id;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->usuario = $usuario;
            $this->password = $passwordCifrado;
            $this->fecha_nac = $fecha_nac;
        }


        public function __get($property){
            if(property_exists($this, $property)){
                return $this->$property;
            }
        }

        public function __set($property, $value){
            if(property_exists($this, $property)){
                $this->$property = $value;
            }
        }

        public function verificarPassword(string $passwordCifrado): bool{
            return password_verify($passwordCifrado, $this->password);
        }

        public function getEdad(): int{
            $hoy = new DateTime();
            return $hoy->diff($this->fecha_nac)->y;
        }

        public function jsonSerialize(): array{
            return[
                'id' => $this->id,
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'usuario' => $this->usuario,
                'fecha_nac' => $this->fecha_nac->format('d/m/Y')
            ];
        }
     }
?>