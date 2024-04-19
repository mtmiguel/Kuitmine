<?php

    include("conexion.php");
    
    session_start();

    if(isset($_POST["datoUActu1"])){

        
        $dato1 = $_POST["datoUActu1"];
        $dato2 = $_POST["datoUActu2"];
        $dato3 = $_POST["datoUActu3"];
        $dato4 = $_POST["datoUActu4"];
        $dato5 = $_POST["datoUActu5"];
        $dato6 = $_POST["datoUActu6"];
        $dato7 = $_POST["datoUActu7"];
        $dato8 = $_POST["datoUActu8"];




        $conn2 = new conexion("kuitmine");
        
        $actu2 = $conn2->ejecutar("UPDATE `kuitmine`.`usuario` SET `usuario`.`Contrasenia` = '".$dato7."', `usuario`.`palabraClave` = '".$dato8."' WHERE `kuitmine`.`usuario`.`Id_usuario` = ".$_SESSION["iniciado"].";");
        $actualizacion = $conn2->ejecutar("UPDATE `kuitmine`.`detallesusuario` SET `kuitmine`.`detallesusuario`.`Sexo` = '".$dato2."', `kuitmine`.`detallesusuario`.`f_nacimiento` = '".$dato1."', `kuitmine`.`detallesusuario`.`Direccion` = '".$dato6."', `kuitmine`.`detallesusuario`.`Celular` = '".$dato4."', `kuitmine`.`detallesusuario`.`E_mail` = '".$dato5."', `kuitmine`.`detallesusuario`.`e_civil` = '".$dato3."' WHERE `kuitmine`.`detallesusuario`.`Id_detallesusuario` = ".$_SESSION["iniciado"].";");


        $refrescarDatos = $conn2->consultar("SELECT * FROM `kuitmine`.`usuario` INNER JOIN `detallesUsuario` ON `usuario`.`Id_detallesUsuario` = `detallesUsuario`.`Id_detallesUsuario` WHERE `usuario`.`Id_usuario` = ".$_SESSION["iniciado"]);

        
        $array = $refrescarDatos[0];
        

        echo json_encode($array, JSON_UNESCAPED_UNICODE);


    }


    if(isset($_POST["sqlCancelActu"])){

        $conn2 = new conexion("kuitmine");

        $query = $_POST["sqlCancelActu"];

        $cancelInput = $conn2->consultar($query);

        $cancelInput2 = $cancelInput[0];

        echo json_encode($cancelInput2, JSON_UNESCAPED_UNICODE);

    }

?>