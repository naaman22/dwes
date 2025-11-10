<?php

$persona["nombre"] = "Alicia";
$persona["apellido"] = "Cano Molina";
$persona["edad"] = "24";
$persona["email"] = ["alicia@gmail.com","alicia2@gmail.com"];
$persona["calificaciones"] = ["Programacion" => 8,"Base_de_Datos" => 10, "Sostenibilidad" => 8];

echo "<pre>";
print_r($persona);
echo "</pre>";

echo "El primer email de $persona[nombre] es {$persona["email"][0]} <br>";
echo "El segundo email de $persona[nombre] es {$persona["email"][1]} <br>";

echo "Alicia ha sacado un ".$persona["calificaciones"]["Programacion"]." en Programacion y un ".$persona["calificaciones"]["Base_de_Datos"]." en Base de Datos";

echo "<p><strong>Lista de materias: </strong></p>";

foreach ($persona["calificaciones"] as $materia => $nota) {
    echo "<p>--------$materia: $nota</p>";
}
?>