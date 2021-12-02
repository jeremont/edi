<?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    if ($pid == 3) {

        echo "<li class='nav-item dropdown'>
              <a class='nav-link dropdown-toggle' id='navbarDropdown' data-toggle='dropdown'>Administrar</a>
              <div class='dropdown-menu'>
              <a class='dropdown-item'  href='vistaProducto.php'>Productos</a>
              <a class='dropdown-item' href='vistaUsuario.php'>Usuarios</a>
              <div class='dropdown-divider'></div>
              <a class='dropdown-item' href='cuenta.php'>Cuenta personal</a>
              </div>
            </li> ";
        //<a class='dropdown-item' href='menu.php'>Productos</a>

    } else {
        echo "<li class='nav-item'>
        <a class='nav-link' href='cuenta.php'>Cuenta personal</a>
        </li>";
    }
}
