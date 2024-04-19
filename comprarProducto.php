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

?>
<script>
    history.replaceState(null, null, location.pathname)
</script>
<?php

    $conn=new conexion("kuitmine");

    $id=0;
    $id2=0;
    $datos = "";
    $cantV2=0;

    $meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

    $id = $_SESSION["idPdt"];
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        if(!empty($_POST["Id"])){
            $id2 = $_SESSION['iniciado'];
        }else{
            
            date_default_timezone_set('America/Bogota');

            $fechaActual = date("d-m-Y");
            $horaActual = date("h:i:s");
            
            
            $id2 = $_SESSION['iniciado'];
            $iva = $_POST["IVA"];
            $Descu = $_POST["Descu"];
            $precioU = $_POST["Precio"];
            $precioT = $_POST["PrecioTotal"];
            $Tpago = $_POST["Tpago"];
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
            $FHactual = $fechaActual.",".$horaActual;
            $cantV2 = $_POST["cantV2"];
            $serieF = explode("-",$fechaActual);
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
    }


    $sql="SELECT * FROM `producto` INNER JOIN `productodetail`
        ON `producto`.`Id_productodetail` = `productoDetail`.`Id_productoDetail`
        WHERE `producto`.`Id_producto` =".$id;
    $result=$conn->consultar($sql);

    $imgPrin=$result[0]["imagenPrin"];
    $imgSecun=explode(",",$result[0]["imagenesSecun"]);
    
?>

<!DOCTYPE html>
<html lang="en" typeu="<?php echo $tipoUser ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="estilos\comprarProducto.css">
    <input type="hidden" class="class1CProducto" value="<?php echo $tipoUser?>">
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
    <div class="fondoNegro">
        <div class="baseCompra">
            <div class="divOJO">
                <svg class="imgOJO" fill="#ed8f32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 635.72 357.81"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M0,179.2C188.87,434,480.46,400.31,635.72,178.45,466-57.55,174.41-61.66,0,179.2Zm46.37-.28c46.7-56.25,102.52-97,176.72-123.27C138.39,140,156.5,240,217.38,298,148.7,276,93.07,234.79,46.37,178.92Zm273.19,117c-64.8.48-118.26-51.47-119-115.7-.76-63.95,51.89-117.6,116.27-118.45,64.14-.85,118.07,51.61,119,115.8C436.78,241.45,383.8,295.38,319.56,295.9Zm95.86,3C486.27,232.43,492,132.6,418.16,60.8c46.7,5.68,128.09,61.87,170.35,117.74C553.77,229,473.84,285.36,415.42,298.93Z"/><path d="M360.45,225.71c-19.38,17.35-49.73,20.85-72.74,8.32-26-14.22-35.83-38.19-29.45-73.87,41.4,11.91,56.53.37,57-41.6,28.69-2.69,50.24,10,61.25,36A62.89,62.89,0,0,1,360.45,225.71Z"/></g></g></svg>
                <span class="span1"><span>¡OJO! </span>Revise los siguientes datos antes de proceder con la compra</span>
            </div>
            <div class="detallesPro-CIMG">
                <img src="imgSubidas/<?php echo $imgPrin?>" alt="" id="imgPrinProCom">
            </div>
            <div class="detallesProductoDiv">
                <div class="detallesSecc">
                    <span>Detalles del Producto</span>
                    <div class="div1">
                        <span>Nombre del Producto</span>
                        <div class="nomP"><?php echo $result[0]["Nombre"]?></div>
                    </div>
                    <div class="div2">
                        <span>Precio x unidad</span>
                        <div class="preP"><?php echo $result[0]["Precio"]?></div>
                    </div>
                    <div class="div3">
                        <span>IVA</span>
                        <div class="ivaP"><?php echo $result[0]["IVA"]."%"?></div>
                    </div>
                    <div class="div4">
                        <span>Descuento</span>
                        <div class="descuentoP"><?php echo $result[0]["Descuento"]."%"?></div>
                    </div>
                    <div class="div5">
                        <span>Categoria</span>
                        <div class="catP"><?php echo $result[0]["Categoria"]?></div>
                    </div>
                    <div class="detallesMPDiv">
                        <span id="spanDP">Datos del Pago</span>
                        <div class="divp1">
                            <span>Método de Pago</span>
                            <div class="metP"></div>
                        </div>
                        <div class="divp2">
                            <span>Número de la Tarjeta</span>
                            <div class="numTar"></div>
                        </div>
                        <div class="divp3">
                            <span>Nombre de la Tarjeta</span>
                            <div class="nomTar"></div>
                        </div>
                        <div class="divp4">
                            <span>Fecha de Vencimiento</span>
                            <div class="fvTar"></div>
                        </div>
                        <div class="divp5">
                            <span>Número CVV</span>
                            <div class="numcvv"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="detallesEnvio">
                <div class="detailDiv1">
                <span class="span1e">Datos del envio</span>
                <div class="divE">
                    <span class="span2e">Ubicación Nacional</span>
                    <div>
                        <span class="span3e">Departamento</span>
                        <div class="departamentoE"></div>
                    </div>
                    <div>
                        <span class="span4e">Municipio</span>
                        <div class="municipioE"></div>
                    </div>
                </div>
                <div class="divE2">
                    <span class="span5e">Ubicación Específica</span>
                    <div>
                    <span class="span6e">Distrito</span>
                    <div class="distritoE"></div>
                    </div>
                    <div>
                    <span class="span7e">Dirección</span>
                    <div class="direccionE"></div>
                    </div>
                </div>
                </div>
                <div class="detailDiv2">
                    <span class="d2span1">Precio</span>
                    <div>
                        <span>Cantidad del producto</span>
                        <span class="cantidadP"></span>
                    </div>
                    <div>
                        <span>Precio Unitario</span>
                        <span class="PsinDes"><?php $result[0]["Precio"]?></span>
                    </div>
                    <div>
                        <span>Precio con descuento</span>
                        <span class="PconDes"></span>
                    </div>
                    <div>
                        <span>Precio con IVA y descuento</span>
                        <span class="PconDesI"></span>
                    </div>
                    <div id="precioTotalCont">
                        <span>TOTAL</span>
                        <span class="precioTotal"></span>
                    </div>
                </div>
            </div>
            <div class="btn_contain">
                <button class="cancelCompra">Cancelar</button>
                <input type="submit" class="btnComprar2" value="Comprar producto" form="formTarjetaC">
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
    <main class="main">
        <div class="containerPrin">
            <div class="datosProductoContain">
                <div class="ImgContaint">
                    <div class="flechaAtras flecha"><</div>
                    <img id="imgPrincipal" alt="">
                    <div class="flechaAdelante flecha">></div>
                </div>
                <span class="producNombre"><?php echo $result[0]["Nombre"] ?></span>
                <div class="containCalificacion">
                </div>
                <span class="categoria">Categoria: <?php echo $result[0]["Categoria"] ?></span>
                <span class="descriSpan">Descripción del producto:</span>
                <div id="descripcion">
                    <?php echo $result[0]["Descripcion"] ?>
                </div>
                <input type="hidden" id="imagenesInput" value="<?php echo $result[0]["imagenesSecun"]?>">
                <input type="hidden" id="imagenPrincipal" value="<?php echo $imgPrin?>">
            </div>
            <div class="opcionesCompra">
                <div class="precioContaint">
                    <span class="producPrecioTotal">$<?php echo round($result[0]["Precio"], 2) ?></span>
                    <span class="spanXu">Precio x Unidad</span>
                    <div class="divPUnidad">
                        <span class="dolar">$</span><span class="producPrecioUni"><?php echo $result[0]["Precio"] ?></span>
                    </div>
                    <div class="ivaDiv">
                        <span>IVA: </span><span class="IVA"><?php echo $result[0]["IVA"] ?></span><span>%</span>
                    </div>
                    <div class="descuDiv">
                        <span>Descuento: </span><span class="Descuento"><?php echo $result[0]["Descuento"] ?></span><span>%</span>
                    </div>
                </div>
                <span class="cantPdt">Cantidad</span>
                <input type="number" class="productCantidad" value="1" inputmode="numeric">
                <input type="hidden" id="idProductoCompra" name="idProductoCompra" value="<?php echo $result[0]["Id_producto"] ?>">
            </div>
        </div>
        <div class="MetodosPago">
            <span class="spanPrinPago">Escoja su método de Pago</span>
            <div class="btnMpagosContain">
                <button class="btnPago">
                    <svg xmlns="http://www.w3.org/2000/svg" class="imgBtnTarjetas" fill="#0f8a0b" viewBox="0 0 434.45 299.2"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M434.09,227.25c.12-29.34.2-58.67,0-88-.16-19.5-13.29-34.36-30.4-35.46-9.65-.62-19.3-.24-29-.38-23.6-.35-47.23.45-70.84.21-16.29-.17-32.59.07-48.89-.22-24.6-.45-49.22.28-73.84.24-22.16,0-36.28,13.78-36.29,36.07,0,41.17.37,82.34-.18,123.49-.26,19.14,14.37,36.09,36.4,36,36-.13,72,0,108,0v0H397.56c19.53,0,33.51-11.61,36-31C435.25,254.64,434,240.9,434.09,227.25ZM186.64,127.34q103.67,0,207.32,0a40.34,40.34,0,0,1,7.47.28c4.49.84,7.68,3.59,8.21,8.22a98,98,0,0,1,.13,12.48c-.06,3.76-2.91,3.43-5.4,3.44q-20.73,0-41.46,0H176.07c-6.92,0-6.92,0-7-6.87C168.88,128.82,170.43,127.34,186.64,127.34ZM409.86,262.59c0,8.55-3.63,12.29-12.14,12.29q-108.75.06-217.48,0c-7.83,0-11.12-3.39-11.14-11.43-.07-21.49.06-43-.11-64.49,0-4.45,1.56-5.67,5.84-5.66,38.33.13,76.66.08,115,.08v0c38,0,76,.08,114-.11,4.92,0,6.2,1.6,6.15,6.31C409.75,220.6,409.9,241.59,409.86,262.59Z"/><path d="M295,80.58c-6.88-18.94-13.83-37.85-20.54-56.85C267.83,5,249.16-4.41,230.32,2c-9.93,3.4-19.72,7.18-29.58,10.77Q112,45.07,23.26,77.32c-18.7,6.79-27.78,25.14-21,43.89Q23.59,180.69,45.54,240c7.36,19.87,25.11,27.86,45.18,20.82,11-3.85,21.89-8,32.89-11.87,3.15-1.09,4.52-2.79,4.5-6.16-.12-14.16,0-28.33-.08-42.49,0-5.24-.63-5.67-5.52-3.92-12.38,4.44-24.72,9-37.09,13.5-5,1.82-9.58.18-10.82-3.83-1.51-4.9.59-8.49,5.88-10.4,14.24-5.15,28.42-10.46,42.7-15.48,3.57-1.25,5-3.19,4.93-6.92-.14-11.5,0-23-.07-34.49,0-7.06.7-14,3.59-20.52C141,97.09,157.56,86.73,180.4,86.41c18-.26,36,0,54,0v0q28.23,0,56.48,0C297,86.38,297,86.18,295,80.58ZM97.86,155c-8.68,3.32-17.43,6.48-26.26,9.4-5.18,1.71-11.77-1.86-14.14-7.64S53,145,51.07,139a11.67,11.67,0,0,1,6.62-14.5c8.76-3.59,17.7-6.8,26.7-9.72,4.75-1.54,9.65-.5,12.57,3.76,5.05,7.34,7,16,9,22.87C106,148.88,103.18,153,97.86,155Z"/><path d="M321.31,222.13c0,5.15-3.39,8.27-9.66,8.29q-56.91.09-113.83,0c-5.57,0-9-3.46-9-8.54s3.35-8,9.28-8.08c18.94-.08,37.88,0,56.82,0s37.87-.07,56.81,0C318,213.8,321.35,217,321.31,222.13Z"/></g></g></svg>
                    <span>Tarjeta de Crédito o Débito</span>
                </button>
                <button class="btnPago" disabled style="cursor: default; background-color: #dddddd66;">
                    <svg xmlns="http://www.w3.org/2000/svg" class="imgEfectivo" fill="#0f8a0b44" viewBox="0 0 216.68 165.93"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M216.67,93.85q0-40.48,0-81c0-7.38-3.62-11.48-10.85-12.54a49.09,49.09,0,0,0-7-.33q-45.24,0-90.46,0-45.49,0-91,0A44.16,44.16,0,0,0,9.93.54C3.84,1.62.09,5.74.07,11.92q-.13,55,0,110c0,6.13,3.82,10.36,9.86,11.38a55.83,55.83,0,0,0,9,.61q89.46,0,178.92,0a58,58,0,0,0,7-.31c8.11-1,11.79-5.08,11.85-13.22C216.71,111.51,216.67,102.68,216.67,93.85ZM196,91.74c-12.91,3-22.43,10.59-28.65,22.23-1.37,2.58-3,3.44-5.87,3.42-17.82-.14-35.63-.07-53.44-.07-17.65,0-35.3-.07-52.95.07-2.89,0-4.5-.86-5.87-3.42C43,102.33,33.52,94.76,20.6,91.74c-3-.7-4.1-2.19-4.08-5.2q.15-19.73,0-39.47c0-3.06,1.28-4.32,4.24-5,12.69-3,22.28-10.24,28.18-21.94,1.53-3,3.49-3.89,6.68-3.88q52.7.14,105.4,0c3.19,0,5.15.85,6.68,3.87,5.89,11.71,15.48,19,28.18,21.94,3,.7,4.25,2,4.23,5q-.12,19.72,0,39.47C200.15,89.55,199,91,196,91.74Z"/><path d="M108.62,139.73q50.74,0,101.49.06c2.22,0,5.62-1.32,6.22,2.28s-1.84,6-5.12,7a22.14,22.14,0,0,1-6.4.82q-96.48.06-193,0c-3,0-6-.07-8.59-2-2.1-1.61-3.68-3.75-2.83-6.43.78-2.48,3.35-1.72,5.22-1.72,16.5-.06,33,0,49.5,0Z"/><path d="M108.83,155.72q50.49,0,101,.07c2.33,0,6.05-1.55,6.53,2.46.47,3.84-2.26,6.14-5.8,7a26.09,26.09,0,0,1-6.43.62q-95.75,0-191.49,0c-3.52,0-7.08.07-9.94-2.45C1,162-.25,160.08.32,157.76c.67-2.73,3.17-2,5-2q42-.07,84,0Z"/><path d="M108.52,24.78c-23.1-.08-42.24,18.75-42.37,41.68C66,89.75,85,109,108.12,109.12c22.94.11,42.18-18.85,42.38-41.75A42.32,42.32,0,0,0,108.52,24.78Zm6.82,61.91c-1.88.65-3.15,1.63-3.51,3.74-.31,1.81-1.81,2.18-3.44,2.18s-3.33-.18-3.54-2c-.33-2.93-2.37-3.66-4.62-4.49a12.19,12.19,0,0,1-5.41-4.3c-1-1.34-2.14-2.83-1.25-4.54s2.67-.88,2.86-.91c3.72-.42,5.71.25,7.3,2.4s4.15,2.63,6.76,1.92a4.76,4.76,0,0,0,3.8-4.16,4.06,4.06,0,0,0-2.68-4.38c-3.07-1.24-6.28-2.15-9.44-3.18-5-1.63-9.14-4.16-9.54-10.15-.35-5.21,2.21-8.77,8.47-11.51,1.77-.77,3.26-1.5,3.59-3.67.27-1.81,1.68-2.32,3.33-2.35s3.41,0,3.66,1.82c.45,3.14,2.79,3.82,5.08,4.8a6.43,6.43,0,0,1,2.08,1.35c2,2.07,5.71,4.45,3.22,7.25-2.15,2.42-6.31,1.87-8.93-.91-1.89-2-3.88-3.1-6.61-2.53-2.1.44-3.75,1.5-4.12,3.79a4,4,0,0,0,2.46,4.49c3,1.33,6.18,2.42,9.33,3.47,5.18,1.74,9.65,4.17,9.81,10.46C124.16,81.28,120.74,84.82,115.34,86.69Z"/></g></g></svg>
                    <span>Pago en Efectivo</span>
                </button>
                <button class="btnPago" disabled style="cursor: default; background-color: #dddddd66;">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="#0f8a0b44" class="imgTransferencia" viewBox="0 0 426.01 338.1"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M.07,97.91c0,7,0,7,6.88,7H250.33c6.56,0,6.57,0,6.6-6.71,0-5.49-.2-11,.07-16.46.18-3.82-1.33-6-4.54-8-37.7-23.1-75.52-46-112.8-69.77-8.23-5.24-13.71-5.31-21.92-.09C80.28,27.67,42.33,50.69,4.5,73.89,1.29,75.87-.17,78.17,0,82,.25,87.26.05,92.59.07,97.91ZM128.66,10.29a42.32,42.32,0,0,1,42,42.59c-.2,22.9-19.44,41.86-42.38,41.75-23.16-.11-42.11-19.37-42-42.66C86.42,29,105.56,10.21,128.66,10.29Z"/><path d="M423.74,175.78c-3.51-2.78-6.75-5.91-10.13-8.87q-33.78-29.57-67.6-59.1c-1.16-1-2.3-3-4.09-2.11-1.4.74-.73,2.74-.74,4.18,0,10.31-.22,20.63.06,30.93.13,4.48-1.49,5.69-5.77,5.65-17.13-.19-34.26-.09-51.39-.07-6.72,0-6.78.08-6.79,6.59q0,12.72,0,25.44,0,13.23,0,26.45c0,6.7,0,6.73,6.56,6.74,17.3,0,34.6.11,51.89-.06,4,0,5.63,1.1,5.5,5.35-.27,9-.16,18,0,26.94,0,2.9-1.45,7.21.92,8.39,2.71,1.37,4.54-3,6.94-4.56a19.38,19.38,0,0,0,1.92-1.6q36.43-31.84,72.89-63.66C426.81,179.85,426.69,178.11,423.74,175.78Z"/><path d="M320.89,237.85c.05-4.56-1.46-6-6-6-17.45.21-34.9,0-52.35.17-4.41.06-5.78-1.32-5.67-5.69.26-10.79.09-21.6.07-32.41,0-1.13.37-2.59-.69-3.25-1.48-.92-2.42.62-3.36,1.41-2.82,2.33-5.54,4.78-8.29,7.19Q209.33,230.17,174.06,261c-2,1.75-3.93,3.06-.82,5.77q39.87,34.69,79.59,69.55c.92.81,1.89,2.38,3.34,1.46,1.25-.78.74-2.43.75-3.72,0-10.8.14-21.61-.05-32.41-.06-3.81,1.05-5.34,5.1-5.23,9,.26,17.95.08,26.92.08,8.65,0,17.3-.2,25.93.08,4.5.15,6.13-1.27,6.07-5.91Q320.58,264.28,320.89,237.85Z"/><path d="M148.08,257.6c1.17-1,3.41-1.78,2.62-3.72-.64-1.54-2.68-.84-4.1-.84-46.9,0-93.81,0-140.71-.12-4.82,0-5.95,1.94-5.87,6.23.18,10.15,0,20.29.06,30.44,0,6.93,0,7,6.93,7q81.09,0,162.16,0c1.78,0,3.65.44,6.23-1.08-9.38-8.27-18.37-16.11-27.27-24.06C138.88,263.12,139.55,264.8,148.08,257.6Z"/><path d="M26.94,232.72c10.79-.18,21.59-.23,32.38,0,4.49.1,6.14-1.28,6.07-5.92-.22-15.94-.08-31.89-.08-47.83s-.14-31.89.08-47.84c.06-4.62-1.57-6.07-6.07-6-10.79.24-21.59.19-32.39,0-3.87-.06-5.22,1.33-5.21,5.22q.16,48.58,0,97.17C21.7,231.56,23.1,232.79,26.94,232.72Z"/><path d="M112.07,232.74q16.44-.33,32.89,0c4.22.09,5.38-1.52,5.34-5.52-.17-15.95-.07-31.89-.07-47.84,0-16.28-.08-32.56.06-48.83,0-3.77-1.11-5.4-5.09-5.34q-16.69.26-33.39,0c-4-.06-5.16,1.57-5.15,5.34q.14,48.33,0,96.67C106.63,231.25,107.89,232.82,112.07,232.74Z"/><path d="M230.16,125.2c-10.63.18-21.27.28-31.89,0-5-.15-6.77,1.37-6.67,6.47.29,13.29.1,26.59.1,39.88q0,20.68,0,41.37c0,1.27-.41,2.91,1,3.59s2.38-.78,3.31-1.62c12.26-11,24.47-22,36.75-32.93a8.13,8.13,0,0,0,3-6.5c-.06-15-.12-29.91,0-44.86C235.9,126.35,234.13,125.14,230.16,125.2Z"/><path d="M128.28,89.63h.18c20,0,37-16.85,37.18-36.8a37.32,37.32,0,0,0-37-37.54h-.13a37,37,0,0,0-26.33,63.27A36.77,36.77,0,0,0,128.28,89.63Zm-3.45-60.48c.27-1.81,1.68-2.32,3.33-2.35s3.41,0,3.66,1.82c.45,3.14,2.79,3.82,5.08,4.8A6.43,6.43,0,0,1,139,34.77c2,2.07,5.71,4.45,3.22,7.25-2.15,2.42-6.31,1.87-8.93-.91-1.89-2-3.88-3.1-6.61-2.53-2.1.44-3.75,1.5-4.12,3.79A4,4,0,0,0,125,46.86c3,1.33,6.18,2.42,9.33,3.47,5.18,1.74,9.65,4.17,9.81,10.46.16,6-3.26,9.54-8.66,11.41-1.88.65-3.15,1.63-3.51,3.74-.31,1.81-1.81,2.18-3.44,2.18s-3.33-.18-3.54-2c-.33-2.93-2.37-3.66-4.62-4.49a12.19,12.19,0,0,1-5.41-4.3c-1-1.34-2.14-2.83-1.25-4.54s2.67-.88,2.86-.91c3.72-.42,5.71.25,7.3,2.4s4.15,2.63,6.76,1.92a4.76,4.76,0,0,0,3.8-4.16,4.06,4.06,0,0,0-2.68-4.38c-3.07-1.24-6.28-2.15-9.44-3.18-5-1.63-9.14-4.16-9.54-10.15-.35-5.21,2.21-8.77,8.47-11.51C123,32.05,124.5,31.32,124.83,29.15Z"/></g></g></svg>
                    <span>Transferencia Bancaria</span>
                </button>
            </div>
            <div class="divOpcionesPago">
            </div>
        </div>
    </main>
    <footer class="footer">
        <div class="footer_content">
        </div>
        <span class="copy">©2023 Dynaroot - Todos los Derechos Reservados</span>
    </footer>
    <script src="js\app3.js"></script>
</body>
</html>