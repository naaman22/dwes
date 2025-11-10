<?php
  session_start();
  require_once "includes/funciones.php";

  $filas = 3;
  $columnas = 4;
  $precio = 0;



  if (!isset($_SESSION["butacas"])) {
    $butacas = [];
      for($f = 1; $f <= $filas; $f++){
        for ($c=1; $c <= $columnas ; $c++) {
          $butacas[$f][$c]=0;
      }
    }
    $_SESSION["butacas"]=$butacas;
  }
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $butacas=$_SESSION["butacas"];
    for($f = 1; $f <= $filas; $f++){
      for ($c=1; $c <= $columnas ; $c++) {
        if ($_POST["fila_seleccionada"]==$f && $_POST["columna_seleccionada"]==$c) {
          if($butacas[$f][$c]==1){
            $butacas[$f][$c]=0;
          }else{
            $butacas[$f][$c]=1;
          }
        }
      }
    }
    $_SESSION["butacas"] = $butacas;
    header("location: index.php");
  }

  $precio = precio();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Butacas</title>
    <link rel="stylesheet" href="./assets/css/estilos2.css">
</head>
<body>

<h1>🎥 Vista de Butacas del Cine</h1>

<div class="pantalla">PANTALLA</div>

<!-- Formulario único -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="formButacas">
  <input type="hidden" name="fila_seleccionada" id="fila_seleccionada">
  <input type="hidden" name="columna_seleccionada" id="columna_seleccionada">
</form>

<div class="sala">
  <?php
    for ($f=1; $f <= $filas; $f++) { 
      for ($c=1; $c <= $columnas; $c++) { 
        if($_SESSION["butacas"][$f][$c] == 0){  //butaca libre
          echo "
          <div>
            <img src='./assets/asiento-libre.png' class='butaca' data-fila='$f' data-columna='$c'>
          </div>
          ";
        }else{ //butaca ocupada
          echo "
          <div>
            <img src='./assets/asiento-ocupado.png' class='butaca' data-fila='$f' data-columna='$c'>
          </div>
          ";
        }
      }
    }
  ?>
</div> 



<script>
// Al hacer clic en una imagen, guarda el número y envía el formulario. 
// Vamos a usar DATASET. Para ello, en las imagenes incluifremos el 
// atributo 'data-fila' y 'data-columna'

// let sala = document.querySelector(".sala");
// for (let i = 0; i < 3; i++) {
//   for (let j = 0; j < 4; j++) {
//     let img = document.createElement("img");
//     img.src = "./assets/asiento-libre.png";
//     img.classList.add("butaca");
//     img.dataset.fila = i;
//     img.dataset.columna = j;
//     sala.append(img);
//     console.log(i+" "+j);
//   }
// }

let contador = 0;
document.querySelectorAll('.butaca').forEach(butaca => {
  butaca.addEventListener('click', () => {
    const fila = butaca.dataset.fila;
    const columna = butaca.dataset.columna;

    console.log("fila:"+fila);
    console.log("columna:"+columna);
    if(!butaca.src.includes("asiento-ocupado.png")){
      butaca.src = "./assets/asiento-ocupado.png";
    }else{
      butaca.src = "./assets/asiento-libre.png";
      
    }
    
    //Asignamos a los campos input hidden el valor
    document.getElementById('fila_seleccionada').value = fila;
    document.getElementById('columna_seleccionada').value = columna;
    document.getElementById('formButacas').submit();
  });
});
</script>

<div class="leyenda">
  <div class="cuadro" style="background-color:red;"></div> Libre
  <div class="cuadro" style="background-color:yellow; margin-left:15px;"></div> Ocupada
</div>

<h2>PRECIO TOTAL: <?=$precio?>€</h2>

<?php

  // ----depuracion------
  print ("<pre>");
  // print("Butaca pulsada:<br>");
  // print_r($_POST); 
  // print ("<hr>");

  print_r($_SESSION); 
  print("</pre>");
  //------fin depura------      
?>

</body>
</html>






