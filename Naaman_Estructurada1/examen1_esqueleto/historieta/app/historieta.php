<?php
    session_start();
    
    if(!isset($_POST["movimiento"])){
        $movimiento = "";
    }else{
        $movimiento = $_POST["movimiento"];
    }



    if(!isset($_SESSION["img"])){
        $_SESSION["img"] = 1;
    }else{
        if($movimiento == "inicio"){
            session_unset();
            header("location: index.php");
        }elseif($movimiento == "siguiente" &&  $_SESSION["img"] < 6){
            $_SESSION["img"]++;
        }elseif($movimiento == "anterior" &&  $_SESSION["img"] > 1){
            $_SESSION["img"]--;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historieta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
if($_SESSION["img"]);
?>


<div class="viñeta">
    <img src="./img/<?php echo $_SESSION["img"]; ?>.png" alt="Image <?php echo $_SESSION["img"]; ?>" width="500px">
</div>


    <form action="historieta.php" method="POST">
        <div style="text-align: center;">
            <button class="movimiento" name="movimiento" id="movimiento" value="anterior">⬅️ Anterior</button>
            <button class="movimiento" id="movimiento" name="movimiento" value="siguiente">Siguiente ➡️</button>
        </div>
        <button class="movimiento" name="movimiento" id="movimiento" value="inicio">INICIO</button>
    </form>


</body>
</html>
