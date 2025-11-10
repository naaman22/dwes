<?php
    session_start();
    if (!isset($_SESSION["email"])) {
        header("Location: index.php");
        exit;
    }


    $lista_usuarios = [];
    $file = "./bbdd/usuarios.json";

    $jsonData = file_get_contents($file, FILE_USE_INCLUDE_PATH);
    $lista_usuarios = json_decode($jsonData);

    $lista_libros = [];
    $file2 = "./bbdd/libros.json";

    $jsonData2 = file_get_contents($file2, FILE_USE_INCLUDE_PATH);
    $lista_libros = json_decode($jsonData2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./estilos.css">
</head>
<body>
    <header>
        <?php include "menu.php"?>
    </header>

    <table class="tabla-libros">
        <tr>
            <th>Caratula</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>Genero</th>
            <th></th>
            
            <form action="">
                <input type="hidden" >
                <a href="" ></a>
            </form>
            
        </tr>
            <?php
                foreach ($lista_libros as $libro) {
                    // Sanitizar datos
                    $caratula = htmlspecialchars($libro->caratula ?? '', ENT_QUOTES, 'UTF-8');
                    $titulo   = htmlspecialchars($libro->titulo ?? '', ENT_QUOTES, 'UTF-8');
                    $autor    = htmlspecialchars($libro->autor ?? '', ENT_QUOTES, 'UTF-8');
                    
                    // --- Manejo correcto de generos ---
                    $generos = $libro->generos ?? [];
                    if (is_array($generos)) {
                        $generosTexto = implode(', ', $generos);
                    } else {
                        $generosTexto = htmlspecialchars((string)$generos, ENT_QUOTES, 'UTF-8');
                    }
                    
                    
                    
                    echo "<tr>";
                        echo "<td><img width='100px' src='./bbdd/portadas/{$caratula}' alt='Carátula de {$titulo}'></td>";
                        echo "<td><p>{$titulo}</p></td>";
                        echo "<td><p>{$autor}</p></td>";
                        echo "<td><span style='border:'>{$generosTexto}</span></td>";
                        echo "<td> 
                            <div class='accion'>"; 
                        echo "<form action='./borrar.php' method='POST'>
                                <button class='btnBorrar' method='POST'>Borrar</button>
                                <input type='hidden' name='titulo_a_borrar' id='titulo_a_borrar' value='{$titulo}'>";                            
                        echo    "</form>";
                        echo "<form action='./detalles.php' method='POST'>
                                <input type='hidden' name='titulo_a_ver' id='titulo_a_ver' value='{$titulo}'>";
                        echo "<button  value='{$titulo}' id='btnVer' class='btnVer'>Ver</button>                            
                                </form>
                            </div>";
                        echo "</td>";
                    echo "</tr>";
                }
            ?>
    </table>


</body>
</html>