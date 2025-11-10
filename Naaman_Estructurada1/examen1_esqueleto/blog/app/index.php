<?php
    session_start();
    include("./includes/funciones.php");

    if(!isset($_COOKIE["idioma"])){
        $_COOKIE["idioma"] = "es";
        setcookie("idioma", "es", time() + (7*24*60*60), "/");
    }else{
        if(isset($_POST["idioma"]) && $_POST["idioma"] == "es"){
            $_COOKIE["idioma"] = "es";
            setcookie("idioma", "es", time() + (7*24*60*60), "/");
        }elseif(isset($_POST["idioma"]) && $_POST["idioma"] == "uk"){
            $_COOKIE["idioma"] = "uk";
            setcookie("idioma", "uk", time() + (7*24*60*60), "/");
        }
    }

    $_SESSION["Y"] = date("Y");

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
    <div class="selector-idioma">
        <form action="index.php" method="POST">
            <button class="boton-idioma" name="idioma" id="idioma" value="es"><img src="img/spain.png" width="50px"></button> 
            <button class="boton-idioma" name="idioma" id="idioma" value="uk"><img src="img/uk.png" width="50px"></button> 
        </form>
    </div>

    <main>
        
        <ul>
            <?php
            $articulos = recogerArticulos();
                if($_COOKIE["idioma"] == "es"){
                    foreach ($articulos as $articulo) {
                        echo "<li><a href='articulo.php?id=$articulo->id'><h3>{$articulo->title->es}</h3></a></li>";
                    }
                }elseif($_COOKIE["idioma"] == "uk"){
                    foreach ($articulos as $articulo) {
                        echo "<li><a href='articulo.php?id=$articulo->id'><h3>{$articulo->title->uk}</h3></a></li>";
                    }
                }
            ?>
        </ul>
        
    </main>

    <?php include("footer.php");?>
</body>
</html>