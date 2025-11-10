<?php

class Persona{
    public $DNI;
    public $nombre;
    public $apellido;

    function __construct($DNI, $nombre, $apellido){
        $this -> DNI = $DNI;
        $this -> nombre = $nombre;
        $this -> apellido = $apellido;
    }
    
    public function getDNI(){
        return $this -> DNI;
    }

    public function getNombre(){
        return $this -> nombre;
    }

    public function getApellido(){
        return $this -> apellido;
    }

    public function setDNI($dni){
        $this -> DNI = $dni;
    }

    public function setNombre($nom){
        $this -> nombre = $nom;
    }

    public function setApellido($apell){
        $this -> apellido = $apell;
    }

    public function __toString(){
        return "Persona: $this->nombre $this->apellido &nbsp&nbsp [DNI:$this->DNI]";
    }
}

$per = new Persona("74441384Z", "Naaman", "Lopez");

echo ($per);
echo "<br>";

print("<pre>");
print_r($per);

$per->setNombre("Pedro");

echo ($per);
echo "<br>";

?>