<?php include("conexion.php");?>
<?php

    session_start();
    if(!isset($_SESSION['iniciado'])){
        header("location:InicioSesion.php");
    }

    $tipoUser="";

    //Verificamos que el usuario alla iniciado sesión
    if(isset($_SESSION['iniciado'])){
        
        //echo "iniciado en modo: ".$_SESSION['tipoUsuario']."<br><br>";
        if($_SESSION['tipoUsuario'] === "Cliente"){
            $tipoUser = "#ld45";
        }else{
            if($_SESSION['tipoUsuario'] === "Administrador"){
                $tipoUser = "#ad64";
            }
        }

    }else{

        $tipoUser = "neutral";
        
    }

    $conn=new conexion("kuitmine");

    $id=0;
    $id2=0;
    $datos = "";
    $cantV2=0;

    $meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

?>
<script>
    history.replaceState(null, null, location.pathname)
</script>
<?php
    $id = $_SESSION['idPdt'];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(!empty($_POST["Id"])){
            $id2 = $_SESSION['iniciado'];
        }else{
            date_default_timezone_set('America/Bogota');

            $fechaActual = date("d-m-Y");
            $horaActual = date("h:i:s");
            
            $id2 = $_SESSION['iniciado'];

            $user = $conn->consultar("SELECT `Nombres`, `Apellidos` FROM `usuario` WHERE `usuario`.`Id_usuario`=". $id2);
            $user2 = $conn->consultar("SELECT `E_mail` FROM `detallesusuario` WHERE `detallesusuario`.`Id_detallesUsuario`=". $id2);
            $nombre = $user[0]["Nombres"]." ".$user[0]["Apellidos"];

            $iva = $_POST["ivaInOculto"];
            $Descu = $_POST["DescuentoInOculto"];
            $precioU = $_POST["PrecioInOculto"];
            $Tpago = $_POST["TipoPagoInOculto"];
            if($Tpago === "1"){
                $NumTarje = $_POST["input-numTarjeta"];
                $NomTarje = $_POST["input-nomTarjeta"];
                $MesV = $_POST["input-mesVen"];
                $AñoV = $_POST["input-añoVen"];
                $CVV = $_POST["input-cvv"];
                $datos = $Tpago.",".$NumTarje.",".$NomTarje.",".$MesV.",".$AñoV.",".$CVV;
            }
            $Depa = $_POST["selectDepa"];
            $Muni = $_POST["selectMuni"];
            $Distri = $_POST["distritoEnvi"];
            $Direcc = $_POST["direccionEnvi"];
            $FHactual = $fechaActual;
            $fechaVen = strtotime('+7 day', strtotime($fechaActual));
            $fechaVen = date('d-m-Y', $fechaVen);
            $cantV2 = $_POST["cantInOculto"];
            $serieF = explode("-",$fechaActual);
            $precioT = $precioU*$cantV2;
            $precioT = $precioT-($precioT*($Descu/100));
            $precioT = $precioT+($precioT*($iva/100));
            
            for($i=1 ; $i<=12 ; $i++){
                if($serieF[1]==="0".$i){
                    $serieF = $meses[$i-1]."-".$serieF[2];
                    break;
                }else{
                    if($serieF[1]==="10"){
                        $serieF = $meses[9]."-".$serieF[2];
                        break;
                    }else{
                        if($serieF[1]==="11"){
                            $serieF = $meses[10]."-".$serieF[2];
                            break;
                        }else{
                            if($serieF[1]==="12"){
                                $serieF = $meses[11]."-".$serieF[2];
                                break;
                            }else{
                                continue;
                            }
                        }
                    }
                }
            }

            $sql = "INSERT INTO `detallesventa` (`prodCantidad`,`metodoPago`,`direccionVenta`,`precioTotalVenta`,
            `Id_usuario`, `Id_producto`)
            VALUES ('$cantV2','$datos','$Direcc','$precioT','$id2','$id')";
            $lastId = $conn->ejecutar($sql);

            $sql = "INSERT INTO `ventas` (`fh_venta`,`Id_detallesVenta`)
            VALUES ('$FHactual', $lastId)";  
            $lastId = $conn->ejecutar($sql);
            
            $sql = "INSERT INTO `factura` (`serieFactura`,`fechaHoraFactura`,`Id_venta`)
            VALUES ('$serieF', '$FHactual', $lastId)";
            $lastId = $conn->ejecutar($sql);
        }

        $sql="SELECT * FROM `producto` INNER JOIN `productodetail`
        ON `producto`.`Id_productodetail` = `productoDetail`.`Id_productoDetail`
        WHERE `producto`.`Id_producto` =".$id;
        $result=$conn->consultar($sql);

        $imgPrin=$result[0]["imagenPrin"];
        $imgSecun=explode(",",$result[0]["imagenesSecun"]);

        $_SESSION["pdtData"] = [$nombre, $Depa, $FHactual, $fechaVen, $cantV2, $precioU, $Descu, $iva, $precioT, $Muni, $Distri, $Direcc];
        
    }else{

        $nombre = $_SESSION["pdtData"][0];
        $Depa = $_SESSION["pdtData"][1];
        $FHactual = $_SESSION["pdtData"][2];
        $fechaVen = $_SESSION["pdtData"][3];
        $cantV2 = $_SESSION["pdtData"][4];
        $precioU = $_SESSION["pdtData"][5];
        $Descu = $_SESSION["pdtData"][6];
        $iva = $_SESSION["pdtData"][7];
        $precioT = $_SESSION["pdtData"][8];
        $Muni = $_SESSION["pdtData"][9];
        $Distri = $_SESSION["pdtData"][10];
        $Direcc = $_SESSION["pdtData"][11];
        
    }
    
    

?>

<!DOCTYPE html>
<html lang="en" class="ventaExitosaHTML" typeu="<?php echo $tipoUser ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Productos</title>
        <link rel="stylesheet" href="estilos\ventaCorfirmada.css">
        <input type="hidden" class="class1VConfirmada" value="<?php echo $tipoUser?>">
    </head>
    <body class="body">
        <div class="div-administrador">
            <div class="divAdmi-1">
                <a class="administracionA" href="administracion.php">Administración</a>
            </div>
            <div class="divAdmi-2">
                <span>Modo Cliente</span>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 405.91 230.73"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M403.86,110.64C383.94,84.7,361.06,61.83,334,43.3,300.21,20.14,263.5,4.66,222.25.9c-42-3.83-81.57,4.65-118.92,23.63-40.67,20.66-74,50.16-101.45,86.41-2.44,3.21-2.55,5.52-.08,8.75,21.56,28.13,46.54,52.58,76.36,71.93,37.88,24.58,78.91,39.08,128.9,39.07,9,.3,22.22-1.13,35.33-3.65,37.21-7.16,70.25-23.45,100.46-45.93,23.43-17.43,43.46-38.22,61.21-61.33C406.73,116.31,406.37,113.91,403.86,110.64ZM136.2,190.53C96.54,176.23,63.83,152,36.08,120.61c-4.81-5.43-4.59-5.49.33-11,27.22-30.69,59.49-54.19,98-68.81,1.24-.48,2.5-.92,3.76-1.34a9.65,9.65,0,0,1,1.58-.21C90.87,79.79,95,153.13,140.44,191.69,138.43,191.15,137.29,190.92,136.2,190.53ZM202.12,189c-39.77-.28-73-34-72.81-73.87.19-40.54,33.57-73.57,74.27-73.47,39.91.09,73.28,33.93,73.1,74.14S242.67,189.32,202.12,189Zm167.54-68c-27.56,31.39-60.61,54.8-99.72,69.57a12,12,0,0,1-3.64.81c22.21-20.3,34.68-45.06,34.92-75.32s-11.83-55.42-34-76c7.48,1.26,14,4.47,20.58,7.51,32.05,14.89,59.05,36.43,82.48,62.73C374.09,114.61,373.1,117.14,369.66,121.05Z"/><path d="M244.22,119c-1.1,13.64-8.18,26.64-23.87,33.73-16.14,7.29-31.53,5-44.69-6.51-12.55-11-16.41-25.37-12.56-41.7.87-3.68,1.8-5.28,5.79-2.23,7.41,5.65,16.19,5.18,23.57-.45a19.32,19.32,0,0,0,6-22.5C196.6,75,198,74.18,202,74.07,225.25,73.42,244.37,92.31,244.22,119Z"/></g></g></svg>
                    <span class="VistaPrevia">Vista Previa</span>
                </div>
            </div>
        </div>
        <header class="Header">
            <div class="headerdiv">
                <div class="img-logo-containt">
                    <a class="logo-contain" title="Inicio" href="index.php"><img src="img\logoPequeño.png" alt="Logo"></a>
                    <div class="imgPath"><img src="img\imgfondoPrin.jpg" alt=""></div>
                    <div class="imgPath2"><div></div><img src="img\imgFondo3.jpg" alt=""></div>
                    <div class="imgPath3"><div></div><img src="img\imgFondoProducts.jpg" alt=""></div>
                </div>
                <div class="btnTemaContainer">
                </div>
                <nav class="Header_Nav">
                    <ul class="Header_Nav-UL">
                    </ul>
                    <div class="divRelle"></div>
                </nav>
            </div>
        </header>
        <main>
            <div class="divPrin">
                <span>Venta Exitosa</span>
                <svg class="facturaIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 476.26 502.2"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M475.84,130.89c-2.79-28.4-27.11-50.64-55.6-50.75-12.2,0-24.4-.09-36.6.06-3,0-3.95-.85-3.92-3.88.14-13.38.07-26.77.06-40.16,0-6.67-1.82-8.49-8.46-8.49-23.61,0-47.21-.05-70.82,0a8.51,8.51,0,0,1-6.93-3C278.38,8.12,259.42-.31,237,0c-21.58.31-39.83,8.8-54.42,24.79a8.17,8.17,0,0,1-6.71,2.92c-23.7-.1-47.41-.06-71.11,0-6.44,0-8.28,1.86-8.29,8.36q0,20.09,0,40.17c0,3.91,0,3.93-4,3.93-12,0-24-.07-36,0-14.83.12-27.82,5.19-38.55,15.4A55.7,55.7,0,0,0,0,137.27q-.09,55.2,0,110.39T0,358.34a57.9,57.9,0,0,0,2.59,17.88C10.43,400.46,31.83,416,57.39,416h145.2c4,0,4,0,4,3.93q0,13.83,0,27.67c0,3.83-.15,4-4.07,4-11.9,0-23.8,0-35.7,0-5.24,0-7.41,2.32-7.42,7.5q0,17.55,0,35.11c0,5.81,2.09,7.94,7.84,7.94q71,0,141.93,0c5.41,0,7.61-2.2,7.62-7.55q0-17.11,0-34.22c0-7-1.77-8.8-8.77-8.81-11.61,0-23.21-.06-34.81,0-2.69,0-3.69-.84-3.66-3.59.12-9.22,0-18.44.05-27.67,0-4.35,0-4.36,4.5-4.36H417.85a62.69,62.69,0,0,0,7.13-.2c30-3.44,51.28-27.33,51.28-57.64V139.79A88.36,88.36,0,0,0,475.84,130.89ZM379.78,247.76q0-60.67,0-121.35c0-4.41,0-4.42,4.44-4.42,12.29,0,24.58,0,36.87,0,8.24,0,13.28,4.9,13.28,13.08q0,113,0,226c0,7.94-5.14,13-13,13.06-12.59,0-25.18-.08-37.77.07-3.07,0-3.86-1-3.85-3.95Q379.85,309,379.78,247.76ZM238.13,12.39A62.46,62.46,0,1,1,238,137.3c-34.36.06-62.23-27.93-62.3-62.57A62.2,62.2,0,0,1,238.13,12.39ZM109,44.86c0-5,0-5,5.1-5q27.22,0,54.44,0c3.35,0,3.36,0,1.93,3-17.45,36.51-1.89,81.16,34.43,98.84,37.07,18.05,80.77,4,99.65-32.61,11.15-21.58,11.32-43.78,1.38-66-1.47-3.29-1.54-3.27,2.15-3.27,18.45,0,36.9.06,55.34-.06,3,0,3.93.84,3.93,3.87q-.09,163.35-.06,326.68c0,3.68-.13,3.8-3.9,3.8H112.87c-3.82,0-3.87-.06-3.88-4.12V44.86ZM300.65,464.09c4,0,4,0,4,4,0,6.14-.08,12.29.05,18.43.05,2.47-.86,3.27-3.29,3.27q-63.33-.08-126.66,0c-2.29,0-3.18-.76-3.14-3.1.11-6.35.15-12.69,0-19-.08-2.78.91-3.58,3.6-3.57,21,.09,42,0,63,0ZM219.1,419.15c0-2.27.7-3.21,3.08-3.15,5.34.12,10.69,0,16,0s10.5.07,15.75,0c2.23,0,3.23.6,3.21,3q-.14,14.72,0,29.42c0,2.24-.69,3.23-3.07,3.21q-15.89-.12-31.79,0c-2.52,0-3.23-1-3.21-3.38Q219.24,433.71,219.1,419.15Zm240.83-41.53c-8,16.46-21.24,25.3-39.47,26.12-10.49.47-21,.1-31.53.1H238.39q-90.28,0-180.59,0c-22.38,0-40.11-14.37-44.62-36.19a51.12,51.12,0,0,1-.91-10.34q-.07-109.49,0-219c0-22.76,14.69-40.94,36.35-45.15a43.21,43.21,0,0,1,8.27-.85c12,0,24,.08,36,0,2.92,0,3.84,1,3.69,3.77-.2,3.56-.1,7.14,0,10.71,0,2.14-.88,3-3,3-12.4-.11-24.8.14-37.18-.3-14.73-.54-26.61,10.31-26.61,25,0,75.08.15,150.15-.17,225.22-.06,14.54,9.57,27.1,27,27,17-.13,34.11,0,51.17,0q155,0,310,0c4.46,0,8.92-.11,13.19-1.73a24.09,24.09,0,0,0,15.75-22.45q0-114.24,0-228.49a24,24,0,0,0-24.17-24.2q-19.49-.15-39,0c-2.9,0-3.85-.92-3.7-3.75.19-3.76.07-7.54.05-11.31,0-1.52.5-2.47,2.22-2.44,14.46.27,29-.93,43.39.57,20.09,2.09,36.58,19.5,38.27,39.57.29,3.47.38,6.93.38,10.4V354.11C464.05,362.19,463.55,370.18,459.93,377.62ZM96.49,248.08V369.72c0,4.45,0,4.46-4.42,4.46-12.29,0-24.58,0-36.88,0-8.32,0-13.3-5-13.3-13.36q0-112.72,0-225.44c0-8.4,5-13.35,13.3-13.37q18.59,0,37.18,0c4.1,0,4.12,0,4.12,4.16Z"/><path d="M200,309.62c-1.28-.12-2.57-.19-3.85-.19q-27.06,0-54.11,0a27.54,27.54,0,0,0-3.85.23c-3.67.53-5.78,2.61-5.84,6.33-.14,7.63-.17,15.27,0,22.89.12,4.85,2.53,6.95,7.36,7q15.15,0,30.32,0,14.87,0,29.73,0c5.7,0,7.84-1.94,8-7.56.14-6.84.15-13.68,0-20.51C207.54,311.64,206,310.16,200,309.62Zm-12.47,24H170c-7.33,0-14.66-.07-22,0-2.43,0-3.34-.78-3.28-3.25.24-10.19-1.39-8.42,8.39-8.5,12.77-.11,25.55.06,38.32-.09,3,0,4,.89,3.9,3.89C195.2,333.66,195.32,333.66,187.49,333.66Z"/><path d="M139.74,251.84h30q15.31,0,30.62,0c4.7,0,6.86-1.77,7.14-6.47a211.21,211.21,0,0,0,0-23.47c-.22-4.32-2.42-6-6.78-6.2-15-.64-30.12-.15-45.18-.29-5.35,0-10.7-.12-16.05.09-5,.19-7.19,2.5-7.26,7.5q-.15,10.69,0,21.4C132.33,249.63,134.62,251.83,139.74,251.84Zm13.35-23.9c12.87-.1,25.74,0,38.61-.07,2.71,0,3.62.83,3.6,3.57,0,8.21.07,8.21-8.1,8.21H170c-7.32,0-14.65-.07-22,0-2.43,0-3.36-.79-3.3-3.26C144.94,226.27,143.26,228,153.09,227.94Z"/><path d="M198.54,262.69a19.81,19.81,0,0,1-3.27,0q-27.66,0-55.33,0c-5.48,0-7.61,2-7.68,7.46-.09,7-.08,14.08,0,21.11.06,5.36,2.34,7.53,7.71,7.54,10,0,20,0,30,0h29.45c6.16,0,8.19-2,8.26-8.19.08-6.44-.06-12.89,0-19.33C207.87,263.9,204.13,261.76,198.54,262.69Zm-6.4,24c-7.43-.09-14.86,0-22.28,0s-14.66-.06-22,0c-2.25,0-3.33-.66-3.18-3.05.14-2.07.07-4.16,0-6.23,0-1.77.79-2.48,2.53-2.48q22.73,0,45.45,0c2,0,2.6.94,2.55,2.75-.06,2-.11,4,0,5.94C195.43,285.94,194.43,286.7,192.14,286.67Z"/><path d="M139.86,204.84q30,0,60.08,0c5.45,0,7.67-2,7.73-7.45.08-7.34.36-14.68-.2-22-.38-5-2.1-6.66-7.13-6.67-10,0-20,0-30,0s-20.23,0-30.34,0c-5.51,0-7.63,2-7.7,7.45q-.13,10.56,0,21.12C132.32,202.77,134.44,204.83,139.86,204.84Zm13.23-23.91c12.77-.11,25.55,0,38.32-.09,3,0,4,.87,3.91,3.88-.13,7.91,0,7.91-7.83,7.91H170c-7.33,0-14.66-.07-22,0-2.44,0-3.35-.78-3.29-3.25C145,179.27,143.26,181,153.09,180.93Z"/><path d="M230.55,239.88q52.79,0,105.57,0a15.71,15.71,0,0,0,2.66-.12,6.08,6.08,0,0,0,4.61-8.37c-1.26-3.06-3.86-3.7-6.81-3.69H264c-11.5,0-23,0-34.49,0-5.13,0-8,4.62-5.8,9C225.18,239.52,227.75,239.88,230.55,239.88Z"/><path d="M335.47,321.69h-102c-1.69,0-3.38-.09-5.05.07a5.85,5.85,0,0,0-5.44,6,6,6,0,0,0,5.39,6.06,27.42,27.42,0,0,0,3.27.09H335.42c5.48,0,8.38-2.12,8.43-6.15S341.19,321.69,335.47,321.69Z"/><path d="M337,286.86c4.29,0,6.8-2.38,6.82-6.17,0-3.54-2.57-5.86-6.7-6-1.09,0-2.18,0-3.27,0H231.3c-1.77,0-3.58-.21-5.23.74a6.16,6.16,0,0,0-2.86,6.9c.68,2.83,3,4.54,6.49,4.55q26.75,0,53.51,0h0Q310.12,286.88,337,286.86Z"/><path d="M230.06,192.85q26.61,0,53.21,0H335a26.37,26.37,0,0,0,3.56-.11,6.05,6.05,0,0,0-.25-12c-1.08-.1-2.18-.06-3.27-.06H231a19.8,19.8,0,0,0-2.67.09,5.92,5.92,0,0,0-5.26,6.44C223.28,190.74,225.79,192.85,230.06,192.85Z"/><path d="M233.79,98.51c-4.09-1.41-4.85-4.79-5-8.54-.23-4-2.71-6.46-6.36-6.33s-5.73,2.61-5.83,6.55c-.25,9.25,4.08,16,12.75,19.79,1.52.65,2.21,1.47,2.13,3.09a20.26,20.26,0,0,0,.06,3.57,5.91,5.91,0,0,0,7.82,5c2.93-.9,4.46-2.9,4.23-6.65-.2-3.31.8-5,4-6.45,7.25-3.18,11.61-8.76,11.72-17.07a18.1,18.1,0,0,0-2.54-9.92c-4.23-6.86-10.77-10.63-18-13.37a25.75,25.75,0,0,1-7.33-3.87c-1.24-1-2.32-2.16-2.33-3.95,0-6.46,6.57-11.33,12.65-9.21,4.24,1.48,5.63,4.87,5.86,9.08.21,3.75,2.6,5.93,6.1,5.92s5.92-2.22,6-6c.18-7.64-2.37-14.24-9.12-18.2-3.77-2.2-6.48-4-5.92-9.08.35-3.1-2.75-5.27-6-5.24a5.75,5.75,0,0,0-5.87,5.2,19.24,19.24,0,0,0-.08,3.56,3.23,3.23,0,0,1-2.28,3.64c-7.47,3-11.38,8.92-13.21,16.45-1.61,6.62.46,12.08,5.47,16.55,3.86,3.43,8.55,5.32,13.24,7.21a22.38,22.38,0,0,1,9.08,6c2.52,3,2.67,6.38.48,8.92A11.7,11.7,0,0,1,233.79,98.51Z"/></g></g></svg>
                <span class="descargueASpan">Descargue la factura</span>
                <button class="btnDescarFactura">Click Aquí</button>
            </div>
            <form action="facturaGenerador.php" method="POST" Id="formFactura">
                <input type="hidden" value="<?php echo $nombre ?>" name="nombre">
                <input type="hidden" value="<?php echo $Depa."-".$Muni.", ".$Distri." ".$Direcc ?>" name="direccion">
                <input type="hidden" value="<?php echo $FHactual ?>" name="fecha">
                <input type="hidden" value="<?php echo $fechaVen ?>" name="fechaVen">
                <input type="hidden" value="<?php echo $cantV2 ?>" name="cantidad">
                <input type="hidden" value="<?php echo $precioU ?>" name="precio">
                <input type="hidden" value="<?php echo $Descu ?>" name="descu">
                <input type="hidden" value="<?php echo $iva ?>" name="iva">
                <input type="hidden" value="<?php echo round($precioT,0)?>" name="precioT">
            </form>
        </main>
    </body>
    <script src="js\app4.js"></script>
</html>