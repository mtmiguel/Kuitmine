<?php

    $conn = new mysqli("localhost:3306", "root", "D@n!#l!ll01188390", "kuitmine");

    if($conn->connect_error){
        die("Hubo un fallo en la conexión". $conn->$connect_error);
    };


    $conn2 = new mysqli("localhost:3306", "root", "D@n!#l!ll01188390", "kuitmine");

    if($conn2->connect_error){
        die("Hubo un fallo en la conexión". $conn2->$connect_error);
    };
    
?>