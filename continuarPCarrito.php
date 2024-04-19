<?php session_start(); 

    include("carritoBarra.php");


    $tipoUser="";

    //Verificamos que el usuario alla iniciado sesión
    if(isset($_SESSION['iniciado'])){
        
        //echo "iniciado en modo: ".$_SESSION['tipoUsuario']."<br><br>";
        if($_SESSION['tipoUsuario'] === "Cliente"){
            $tipoUser = "#ld45";
        }

    }else{

        $tipoUser = "neutral";
        
    }



?>


<!DOCTYPE html>
<html lang="en" class="contCarritoHTML">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pedido Carrito</title>
        <link rel="stylesheet" href="estilos\continuarPCarito.css">
        <input type="hidden" class="class1CCarrito" value="<?php echo $tipoUser?>">
    </head>
    <body class="body">
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
            <div class="divGeneral">
                <div class="listaDiv">
                    <div class="modificarTitulo"><span>Modificar el Pedido</span></div>
                    <table class="tablaCarrito">
                        <tr class="cabezalTabla">
                            <td>Cantidad</td>
                            <td>Imágen</td>
                            <td>Nombre</td>
                            <td>Precio</td>
                            <td>Actualizar Cantidad</td>
                            <td>Borrar</td>
                        </tr>
                    <?php
                            if(isset($_SESSION['carrito'])){
                                $total=0;
                                for($i = 0; $i <= count($carritoCompras)-1; $i ++) {
                                    if(isset($carritoCompras[$i])){
                                    if($carritoCompras[$i]!=NULL){
                        ?>
                        <tr class="ul">
                        <td>
                            <span><?php echo $carritoCompras[$i]['CantidadPdtCar']; ?></span>
                        </td>
                        <td class="tdImagen">
                            <div class="divImg"><img src="<?php echo 'imgSubidas/'.$carritoCompras[$i]['ImgPdtPrin']; ?>" alt="imgPdt"></div>
                        </td>
                        <td>
                            <span><?php echo $carritoCompras[$i]["NombrePdtCar"]; ?></span>
                        </td>
                        <td>
                            <span>$<?php echo ($carritoCompras[$i]["PrecioPdtCat"]*$carritoCompras[$i]["CantidadPdtCar"]); ?></span>
                        </td>
                        <td class="tdActu">
                            <form action="carritoBase.php" id="formActuCar" name="formActuCar" method="POST">
                                <input type="hidden" name="IdProductoActu" id="IdProductoActu" value="<?php echo $i; ?>">
                                <input type="text" name="CantPdtActu" id="CantPdtActu" value="<?php echo $carritoCompras[$i]['CantidadPdtCar']; ?>" size="1" maxlength="4">
                                <div>
                                    <button class="actuBtn" type="submit" form="formActuCar"><svg class="actuIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 257.39 256.95"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M32,139.34c-.1-4-.91-8-.76-12,.84-22.3,7.64-42.53,21.94-59.87C72.61,43.88,97.91,31.46,128.4,31.1c21-.24,40.26,6.54,57.4,19,8.09,5.88,8.15,5.8,1.2,13.09-6.19,6.5-4.78,12.81,3.63,15.57q22.29,7.35,44.66,14.5c7.35,2.36,12.73-2.32,11.44-10-.84-4.92-1.91-9.8-2.89-14.69q-3.47-17.39-7-34.76c-.77-3.88-2-7.5-6.3-8.83-4.14-1.26-7,1-9.7,3.64a12.43,12.43,0,0,0-1.41,1.4c-2.48,3.34-4.63,2.86-7.72.28C187.85,10.35,160.28.22,129.12.09a108.2,108.2,0,0,0-24.37,2.06C42.05,13.31-4.85,73.94.4,137.09c.39,4.65,2.46,7.92,7.22,9,4.54,1,9.09,2.09,13.7,2.73C28.55,149.8,32.12,146.57,32,139.34Z"/><path d="M257,119.7c-.4-4.69-2.61-7.85-7.34-8.87s-9.42-2.09-14.19-2.8c-6.24-.94-10,2.31-10,8.59,0,4.32.91,8.65.75,12.95-.83,22.29-7.63,42.51-21.92,59.85-19.47,23.63-44.76,36.07-75.24,36.43-21,.24-40.26-6.49-57.37-19-8.15-5.95-8.22-5.85-1.23-13.15.47-.48.95-.95,1.37-1.46,4.19-5,2.94-11.17-3.27-13.31q-23.61-8.1-47.48-15.47c-6.32-2-11.34,2.76-10.51,9.35.39,3.13,1.2,6.2,1.82,9.3q4.09,20.57,8.22,41.12c.75,3.76,2.21,7.08,6.32,8.23,3.89,1.1,6.76-.75,9.26-3.48a17,17,0,0,0,1.4-1.42c2.51-3.58,4.71-3.23,8-.43,23.92,20.18,51.55,30.6,82.91,30.72a109.85,109.85,0,0,0,24.36-2.1C215.53,243.5,262.38,182.71,257,119.7Z"/></g></g></svg></button>
                                </div>
                            </form>
                        </td>
                        <td class="tdDelete">
                            <div>
                                <form action="carritoBase.php" id="formDeleteCar" name="formDeleteCar" method="POST">
                                    <input type="hidden" value="<?php echo $i; ?>" name="deleteItem">
                                    <button type="submit" form="formDeleteCar"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 141.59 197.24"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M133,163.39q-.07-40.78,0-81.56c0-2.93,0-2.93-3-2.93H11.46c-2.87,0-2.87,0-2.88,2.84q0,35,0,70.08c0,10.75-.13,21.49.06,32.23.13,7.61,6.13,13.17,13.73,13.18q15.15,0,30.3,0,33.53,0,67.07,0A13.43,13.43,0,0,0,133,183.94C133.14,177.1,133,170.24,133,163.39ZM36.39,135.23v33c0,3.59-1.35,4.89-5,4.91-1.14,0-2.29,0-3.43,0-2.92-.06-4.35-1.49-4.38-4.56,0-4.62,0-9.26,0-13.89q0-26,0-52a6.32,6.32,0,0,1,1-4.18c1.76-2.22,9.15-2.18,10.9,0a5.22,5.22,0,0,1,.94,3.41Q36.37,118.57,36.39,135.23Zm41.93,34.82a3.28,3.28,0,0,1-3.4,3c-2.72.07-5.46.09-8.19,0a3.61,3.61,0,0,1-3.74-4q0-16.86,0-33.73c0-10.59.41-21.2-.1-31.81a14.39,14.39,0,0,1,.21-3.41A3.75,3.75,0,0,1,66.87,97c2.6-.06,5.21-.09,7.81,0a3.82,3.82,0,0,1,3.86,4.08q.06,32.31.11,64.6A25.27,25.27,0,0,1,78.32,170.05Zm39.62-2.5c0,4.31-1.24,5.53-5.54,5.54-1,0-2,0-3.06,0-2.77-.09-4.15-1.49-4.18-4.32,0-3.87,0-7.74,0-11.62V135q0-16.4,0-32.78c0-3.86,1.4-5.25,5.27-5.28,6.79,0,7.51.66,7.51,7.5Q118,136,117.94,167.55Z"/><path d="M133.65,50.31a7.22,7.22,0,0,0-1.14,0c-1.52.21-2.22-.51-2.83-1.88-6.12-13.95-16.62-22.67-31.56-25.71-2.69-.55-3.67-1.48-4.21-4.14A23,23,0,0,0,72.87.08c-12.79-1-23.06,7.05-25.53,19.64-.39,2-1.26,2.48-3,2.82C29.7,25.27,19,33.29,12.7,46.76c-1.26,2.66-2.57,3.76-5.6,3.67C2.7,50.28-.6,54.64.09,59s3.67,6.68,8.36,6.68H131.93c.76,0,1.53,0,2.28,0,4.26-.41,7.52-3.88,7.37-7.83C141.42,53.29,138.32,50.36,133.65,50.31ZM84.13,21.81c-4.51,0-9,0-13.52,0s-9,0-13.52,0c-2.14,0-2.31-.23-1.78-2.33,2.12-8.63,12.31-13.94,20.6-10.81,5.06,1.91,8.59,5.25,10.15,10.5C86.71,21.32,86.36,21.8,84.13,21.81Z"/></g></g></svg><span>Eliminar Producto</span></button>
                                </form>
                            </div>
                            
                        </td>
                        <?php
                            $total = $total + ($carritoCompras[$i]["PrecioPdtCat"] * $carritoCompras[$i]["CantidadPdtCar"]);
                        
                        }
                        }
                        }
                        }
                        ?>
                        </tr>
                        
                    </table>
                    <div class="filaTotal">
                        <div class="filaTotalTitul">
                            <span class="totalMoneda">Total(COP): </span>
                        </div>
                        <div class="filaTotaltd">
                            <div>
                                <span><?php
                                if(isset($_SESSION["carrito"])){
                                $total = 0;
                                for($i=0; $i<=count($carritoCompras)-1; $i++){
                                    if(isset($carritoCompras[$i])){
                                if($carritoCompras[$i]!=null){
                                $total = $total + ($carritoCompras[$i]["PrecioPdtCat"]*$carritoCompras[$i]["CantidadPdtCar"]);
                                }
                                }}}
                                if(!isset($total)){ $total = 0; } else{$total = $total; }
                                echo "$".$total;
                                ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="metodoEGeneral">
                        <div class="metodoEGeneral2">
                            <span>Datos del Pago y el Envio</span>
                            <form class="divGene" id="formPDecidido" action="pedidoExitoso.php" method="POST">
                                <div class="div1">
                                    <span>Tipo de Pago</span>
                                    <select name="selectTPago" id="selectTPago" require>
                                        <option value="tarjetaC">Tarjeta de Crédito</option>
                                    </select>
                                    <span class="spanDatos">Datos</span>
                                    <input type="text" require name="numDocuPago" placeholder="Número de la tarjeta">
                                    <input type="text" require name="nombreTarje" placeholder="Nombre de la tarjeta">
                                    <input type="text" require name="cvvTarjeta" placeholder="Número CVV">
                                </div>
                                <div class="div2">
                                    <span>Usuario</span>
                                    <div>
                                        <input type="text" placeholder="Nombres" require>
                                        <input type="text" placeholder="Apellidos" require>
                                        <input type="text" placeholder="Departamento" require>
                                        <input type="text" placeholder="Municipio" require>
                                        <input type="text" placeholder="Dirección Específica" require>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="BtnEnviarPedido">
                        <button class="btnEnviarP" type="submit" form="formPDecidido">Confirmar Pedido</a>
                    </div>
                </div>
                
            </div>
        </main>
        <footer class="footer">
            <div class="footer_content">
            </div>
            <span class="copy">©2023 Dynaroot - Todos los Derechos Reservados</span>
        </footer>
        <script src="js\app.js"></script>
    </body>
</html>
