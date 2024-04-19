<?php

    session_start();
    header("location: ".$_SERVER['HTTP_REFERER']."");
    unset($_SESSION['carrito']);

?>