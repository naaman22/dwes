<?php
session_start();
include("./includes/funciones.php");

$año = date("Y")

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <title>BLOG</title>
</head>

<?php include("header.php");?>

<body>
    
    <main>
        
        <article class="centrado">

            <?php
                if($_GET["id"] != ""){
                    $articulos = recogerArticulos();
                    $vali = false;
                    if($_COOKIE["idioma"] == "es"){
                        foreach ($articulos as $articulo) {
                            if($articulo->id == $_GET["id"]){
                                echo "<a class='volver' href='index.php'>VOLVER</a>";
                                echo "<h3>{$articulo->title->es}</h3>";
                                echo "{$articulo->description->es}";
                                echo "<div><img src='{$articulo->image}' width='300px'></div>";
                                $vali = true;
                            }
                            
                        }
                        if(!$vali){
                            echo "No se puede encontrar el articulo con id {$_GET['id']}";
                        }
                    }elseif($_COOKIE["idioma"] == "uk"){
                        foreach ($articulos as $articulo) {
                            if($articulo->id == $_GET["id"]){
                                echo "<a class='volver' href='index.php'>RETURN</a>";
                                echo "<h3>{$articulo->title->uk}</h3>";
                                echo "{$articulo->description->uk}";
                                echo "<div><img src='{$articulo->image}' width='300px'></div>";
                            }
                        }
                        if(!$vali){
                            echo "You cant go to article {$_GET['id']} because is not here";
                        }
                    }
                }else{
                    header("location: index.php");
                }
            ?>
        </article>
        
    </main>

    <?php include("footer.php");?>
  
</body>
</html>

