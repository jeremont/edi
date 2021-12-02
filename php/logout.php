<?php

session_start();
unset($SESSION['user']);
unset($SESSION['loggedin']);

session_destroy();

header("Location: ../login.php")

?>
