<?php
    if(!isset($_SESSION["user"])){
        //html no login
?>
        <header>
        <h1>ALTA Y LOGIN DE USUARIOS</h1>
        </header>
        <nav>
        <ul>
            <li class="izda"><a class="menu" href="registro.php">Registrarse</a></li>
            <li class="drcha"><a class='menu' href='index.php'>Login</a></li>
        </ul>
        <br>
        </nav>
<?php   
    }else{
        
        if($_SESSION["esAdmin"]){
            //html Admin
?>
        <header>
        <h1>Biblioteca (admin)</h1>
        </header>
        <nav>
        <ul>
            <li class="izda"><a class="menu" href="index.php">Home</a></li>
            <li class="izda"><a class="menu" href="editarL.php">Editar (admin)</a></li>
            <li class="drcha"><a class='menu' href='logout.php'>Logout</a></li>
        </ul>
        <br>
        </nav>
<?php
        }else{
            //html noAdmin
?>
        <header>
        <h1>Biblioteca Regional</h1>
        </header>
        <nav>
        <ul>
            <li class="izda"><a class="menu" href="index.php">Home</a></li>
            <li class="drcha"><a class='menu' href='logout.php'>Logout</a></li>
        </ul>
        <br>
        </nav>
<?php   
    }}
?>