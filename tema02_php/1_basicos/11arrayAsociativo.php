<?php

$persona = ["nombre" => "Alicia Camacho", "años" => "24", "correo" => "alicia@gmail.com"];
echo "Me llamo ".$persona["nombre"]." y tengo ".$persona["años"].", mi correo es ".$persona["correo"];


$edades = ["Bárbara" => "19", "Andrés" => "21", "Camilo" => "15",];

print "<p>Bárbara tiene $edades[Bárbara] años</p>";
print "<p>Camilo tiene {$edades["Camilo"]} años</p>";
print "<p>Andrés tiene " . $edades["Andrés"] . " años</p>";

print "<p>En la lista hay ".count($edades)." personas</p>";

foreach ($edades as $edad) {
    print "<p>Edad: ".$edad."</p><br>";
}

?>