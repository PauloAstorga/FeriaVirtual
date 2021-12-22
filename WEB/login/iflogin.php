<?php
    include '../../resources/php/db.php';

    $codigo = $_GET['codigo'];

    if(!isset($_SESSION['nombre'])){
        $_SESSION['log'] = FALSE;
        header ('Location: login.php');
    } else {
        header('Location: ../pago/pago.php?codigo=$codigo');
    }

?>