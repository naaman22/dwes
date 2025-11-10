<header>
  
</header>
<nav>
<?php if (isset($_SESSION["usuario"])):?>
  <header>
  <h1>Menu</h1>
</header>
    <ul>
        <li><a class="menu" href="index.php">Listado</a></li>
        <li><a class="menu" href="alta-libro.php">Nuevo Libro</a></li>
        <li><a class="menu" href="">Log out</a></li>
    </ul>
    <br>
<?php else:?>
  <header>
  <h1>LOGIN DE USUARIOS</h1>
</header>
    <br>

<?php endif;?>
  
</nav>