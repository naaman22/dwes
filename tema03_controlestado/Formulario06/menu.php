<?php if(!isset($_SESSION["email"])){?>
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
<?php }else{?>
    <header>
    <h1>ALTA Y LOGIN DE USUARIOS</h1>
    </header>
    <nav>
    <ul>
        <li class="izda"><a class="menu" href="index.php">Home</a></li>
        <li class="drcha"><a class='menu' href='logout.php'>Logout</a></li>
    </ul>
    <br>
    </nav>
<?php } ?>