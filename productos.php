<?php

    session_start(); //Iniciamos la sesión.

    //Incluimos el objeto PDO, revisar el archivo "conexion.php"
    include("conexion.php");
    include("carritoBarra.php");
    include("carritoModal.php");

    

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



        //Definimos la zona horario.
        date_default_timezone_set('America/Bogota');

        $diaNumero = date("w");
        $diaTexto = date("d-m-Y");
        //echo "Dia Actual: ".$diaTexto."<br><br>";
        $diaFSTexto = null;
        $diaDomingo = null;
        $diasSemana = [];
        $prodSemana = [];
        $prodCantVendidos = [];
        $prodMasVendidos = [];
        $idProduct = 0;
        $contProduct = 0;


        if($diaNumero === "0"){
            
            for($i = 0; $i < 7; $i++){

                if($i===0){

                    $diasSemana[$i]=$diaTexto;

                }else{

                    $diaFSTexto = strtotime('+'.$i.' day', strtotime($diaTexto));
                    $diaFSTexto = date("d-m-Y", $diaFSTexto);
                    $diasSemana[$i]=$diaFSTexto;

                }  

            }

            //echo "Dias de la semana: ";
            //print_r($diasSemana);

        }
        

        if($diaNumero != "0"){

            $diaDomingo = strtotime('-'.$diaNumero.' day', strtotime($diaTexto));
            $diaDomingo = date("d-m-Y", $diaDomingo);
            //echo "Dia Domingo: ".$diaDomingo."<br><br>";
            $e=0;

            for($i=$diaNumero; $i!=-1; $i--){

                $diaFSTexto = strtotime('-'.$i.' day', strtotime($diaTexto));
                $diaFSTexto2 = date("d-m-Y", $diaFSTexto);
                $diasSemana[$e]=$diaFSTexto2; 
                $e++;

            };

            //echo "Dias de esta semana: ";
            //print_r($diasSemana);


        }

        //Conexión para llenar el select de Categoría.
        $conn2 = new conexion("kuitmine");

        $conn = new conexion("kuitmine");

        $sql2 = "SELECT * FROM `Categoria`";
        $result2 = $conn2 -> consultar($sql2);


        //Conexión para obtener todas las ventas de la semana.
        $conn3 = new conexion("kuitmine");

        $where = "WHERE `ventas`.`fh_venta` IN (";

        for($i = 0; $i < sizeof($diasSemana); $i++){
            if($i == (sizeof($diasSemana)-1)){
                $where .= "'".$diasSemana[$i]."')";
                break;
            }
            $where .= "'".$diasSemana[$i]."', ";
        }


        $sql3 = "SELECT * FROM `ventas` INNER JOIN `detallesVenta`
        ON `ventas`.`Id_venta` = `detallesVenta`.`Id_detallesVenta` $where";

        $result3 = $conn3 -> consultar($sql3);
        //echo "<br><br>";
        //echo "Ventas de esta semana: ";
        //print_r($result3);

        $eliminar=[];

        $i = 0;
        foreach($result3 as $resu3){

            $contProduct = 0;
            $idProduct = $resu3["Id_producto"];
            for($e = 0; $e < sizeof($result3); $e++){

                if($result3[$e]["Id_producto"]==$idProduct){

                    $contProduct += $result3[$e]["prodCantidad"];
                    $prodCantVendidos[$i] = [$result3[$e]["Id_producto"],$contProduct];
                    
                    continue;

                }else{
                    
                    continue;

                }
                
            };

            $i++;

        }

        $tam = sizeof($prodCantVendidos);
        $ante = 0;
        for($i = 0; $i<$tam; $i++){
            if($i==0){
                $ante = $i;
                continue;
            }else{
                if($prodCantVendidos[$i][0] == $prodCantVendidos[$ante][0]){
                    unset($prodCantVendidos[$ante]);
                    $ante=$i;
                    continue;
                }else{
                    $ante=$i;
                    continue;
                }
            }
        }

        $prodMayor = 0;
        $position = 0;
        
        $positionAn = 0;
        $actualId = 0;
        $anteriorId = 0;
        $a = 0;
        $aa = 0;
        $cantV = 0;
        $prodCantVendidos2 = [];
        $prodMasVendidos2 = [];


        //echo "<br><br>Cantidad Vendida: ";
        //print_r($prodCantVendidos);

        foreach($prodCantVendidos as $prodven){
            $prodCantVendidos2[$aa] = $prodven;
            $aa++;
        }

        //echo "<br><br>Cantidad Vendida 2: ";
        //print_r($prodCantVendidos2);
        $cantV = sizeof($prodCantVendidos2);
        //echo "<br><br>";
        //echo $cantV;
        $cantV2 = sizeof($prodCantVendidos2);

        for($i = 0; $i < 10; $i++){

            $cantV = sizeof($prodCantVendidos2);
            
            //echo $cantV;

            if($cantV2 != 0){

                for($e = 0; $e < $cantV; $e++){

                    if($prodCantVendidos2[$e][1]>$prodMayor){
                        $prodMayor = $prodCantVendidos2[$e][1];
                        $prodActu = $prodCantVendidos2[$e][0];
                        $position = $e;
                    }else{
                        continue;
                    }
   
                }

                $prodMasVendidos[$i] = [$prodActu, $prodMayor];
                $prodCantVendidos2[$position][1]=0;
                $prodMayor = 0;
                $cantV2--;
            }else{

                break;

            }

        }


        //echo "<br><br>Los 10 mas vendidos de la semana: ";
        //print_r($prodMasVendidos);

        for($i= 0; $i<sizeof($prodMasVendidos); $i++){

            $sql4 = "SELECT * FROM `producto` INNER JOIN `productodetail`
            ON `producto`.`Id_productodetail` = `productodetail`.`Id_productoDetail`
            WHERE `producto`.`Id_producto` = ".$prodMasVendidos[$i][0]." ORDER BY `producto`.`Id_producto` DESC";

            //echo "<br><br>";
            //echo $sql4;
        
            $result4 = $conn3 -> consultar($sql4);

            $prodCantVendidos2[$i] = $result4[0];

        }
        

        //echo "<br><br>Los 10 mas vendidos de la semana 2: ";
        //print_r($prodCantVendidos2);

        $conn2->cerrar();
        $conn3->cerrar();

    //Obtención de los productos en la base de datos

    //Creamos la conexión a la base de datos "kuitmine"
    $conn=new conexion("kuitmine");

    //Query
    $sql="SELECT * FROM `producto` INNER JOIN `productoDetail`
        ON `producto`.`Id_productoDetail` = `productoDetail`.`Id_productoDetail` 
        ORDER BY `Id_producto` DESC";

    //Método "consultar" de la clase "conexion"
    $result=$conn->consultar($sql);


?>

<!DOCTYPE html>
<html id="productosClientes" lang="en" typeu="<?php echo $tipoUser ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Productos</title>
        <link rel="stylesheet" href="estilos\productos.css">
        <input type="hidden" class="class1" value="<?php echo $tipoUser?>">
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
        <main class="main">
            <div class="sugeridos-contain">
                <div class="tituloP">Lo más popular de la semana</div>
                <div class="masVendidosDiv">
                    <?php $d=0?>
                    <?php foreach ($prodCantVendidos2 as $proV2){ ?>
                        <?php if($d>0) { ?>
                        <?php   if($proV2['Id_producto'] == $prodCantVendidos2[$d-1]['Id_producto']){ ?>
                        <?php      continue; ?>
                        <?php   }else{ ?>
                            <button class="btn-productMv" title="Ver Producto" type="submit" form="formPDT10<?php echo $proV2['Id_producto']; ?>">
                                <div class="btn-imageContain">
                                    <img src="imgSubidas/<?php echo $proV2["imagenPrin"] ?>">
                                </div>
                                <div class="btn-infoContain">
                                    <span class="btn-nombre"><?php echo $proV2["Nombre"] ?></span>
                                    <div class="btn-calificacion">
                                        <?php $reseñas = $conn->consultar("SELECT * FROM `resenias` WHERE `resenias`.`Id_productoRese` = ".$proV2['Id_producto'].";");?>
                                        <?php $cantRese = 0; $porcentajeBarra=0;?>
                                        <?php $cantRese=count($reseñas); ?>
                                        <?php $porcentajeRese=0; ?>
                                        <?php foreach($reseñas as $rese){ ?>
                                        <?php   $porcentajeRese+=$rese["NumeroEstrellas"]; ?>
                                        <?php } ?>
                                        <?php $porcentajeRese = $porcentajeRese/$cantRese;?>
                                        <?php $porcentajeRese = round($porcentajeRese, 1);?>
                                        <?php $porcentajeBarra = ($porcentajeRese*100)/5; ?>
                                        <div class="califGeneral">
                                            <span class="porceRese"><?php echo $porcentajeRese; ?></span>
                                            <div class="barraBase"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 599.1 90.45"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><polygon points="0 34.55 0 90.45 18.16 90.45 23.77 57.73 0 34.55" /><polygon points="47.55 0 0 0 0 34.55 32.86 29.78 47.55 0"/><polygon points="18.16 90.45 76.94 90.45 47.55 75 18.16 90.45" /><polygon points="126 34.55 158.86 29.78 173.55 0 47.55 0 62.25 29.78 95.1 34.55 71.33 57.73 76.94 90.45 144.16 90.45 149.77 57.73 126 34.55" /><polygon points="144.16 90.45 202.94 90.45 173.55 75 144.16 90.45" /><polygon points="252 34.55 284.86 29.78 299.55 0 173.55 0 188.25 29.78 221.1 34.55 197.33 57.73 202.94 90.45 270.16 90.45 275.77 57.73 252 34.55" /><polygon points="270.16 90.45 328.94 90.45 299.55 75 270.16 90.45" /><polygon points="378 34.55 410.86 29.78 425.55 0 299.55 0 314.25 29.78 347.1 34.55 323.33 57.73 328.94 90.45 396.16 90.45 401.77 57.73 378 34.55" /><polygon points="396.16 90.45 454.94 90.45 425.55 75 396.16 90.45"/><polygon points="551.55 0 566.25 29.78 599.1 34.55 599.1 0 551.55 0"/><polygon points="504 34.55 536.86 29.78 551.55 0 425.55 0 440.25 29.78 473.1 34.55 449.33 57.73 454.94 90.45 522.16 90.45 527.77 57.73 504 34.55" /><polygon points="522.16 90.45 580.94 90.45 551.55 75 522.16 90.45" /><polygon points="580.94 90.45 599.1 90.45 599.1 34.55 575.33 57.73 580.94 90.45" /></g></g></svg><div class="barraDorada" style="width: <?php echo $porcentajeBarra; ?>%; height: 100%; background-color:#ffdf2c;"></div></div>
                                            <span class="cantRese">(<?php echo $cantRese; ?>)</span>
                                        </div>
                                    </div>
                                    <span class="btn-precio">$<?php echo $proV2["Precio"] ?></span>
                                    <span class="btn-descri"><?php echo $proV2["Descripcion"] ?></span>            
                                </div>
                                <form action="productoVista.php" method="POST" name="formPDT10<?php echo $proV2['Id_producto']; ?>" id="formPDT10<?php echo $proV2['Id_producto']; ?>">
                                    <input type="hidden" value="<?php echo $proV2['Id_producto'];?>" name="Id">
                                </form>
                            </button>
                        <?php   }?>
                        <?php } else { ?>
                            <button class="btn-productMv" title="Ver Producto" type="submit" form="formPDT10<?php echo $proV2['Id_producto']; ?>">
                                <div class="btn-imageContain">
                                    <img src="imgSubidas/<?php echo $proV2["imagenPrin"] ?>">
                                </div>
                                <div class="btn-infoContain">
                                    <span class="btn-nombre"><?php echo $proV2["Nombre"] ?></span>
                                    <div class="btn-calificacion">
                                        <?php $reseñas = $conn->consultar("SELECT * FROM `resenias` WHERE `resenias`.`Id_productoRese` = ".$proV2['Id_producto'].";");?>
                                        <?php $cantRese = 0; $porcentajeBarra=0;?>
                                        <?php $cantRese=count($reseñas); ?>
                                        <?php $porcentajeRese=0; ?>
                                        <?php foreach($reseñas as $rese){ ?>
                                        <?php   $porcentajeRese+=$rese["NumeroEstrellas"]; ?>
                                        <?php } ?>
                                        <?php $porcentajeRese = $porcentajeRese/$cantRese;?>
                                        <?php $porcentajeRese = round($porcentajeRese, 1);?>
                                        <?php $porcentajeBarra = ($porcentajeRese*100)/5; ?>
                                        <div class="califGeneral">
                                            <span class="porceRese"><?php echo $porcentajeRese; ?></span>
                                            <div class="barraBase"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 599.1 90.45"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><polygon points="0 34.55 0 90.45 18.16 90.45 23.77 57.73 0 34.55" /><polygon points="47.55 0 0 0 0 34.55 32.86 29.78 47.55 0"/><polygon points="18.16 90.45 76.94 90.45 47.55 75 18.16 90.45" /><polygon points="126 34.55 158.86 29.78 173.55 0 47.55 0 62.25 29.78 95.1 34.55 71.33 57.73 76.94 90.45 144.16 90.45 149.77 57.73 126 34.55" /><polygon points="144.16 90.45 202.94 90.45 173.55 75 144.16 90.45" /><polygon points="252 34.55 284.86 29.78 299.55 0 173.55 0 188.25 29.78 221.1 34.55 197.33 57.73 202.94 90.45 270.16 90.45 275.77 57.73 252 34.55" /><polygon points="270.16 90.45 328.94 90.45 299.55 75 270.16 90.45" /><polygon points="378 34.55 410.86 29.78 425.55 0 299.55 0 314.25 29.78 347.1 34.55 323.33 57.73 328.94 90.45 396.16 90.45 401.77 57.73 378 34.55" /><polygon points="396.16 90.45 454.94 90.45 425.55 75 396.16 90.45"/><polygon points="551.55 0 566.25 29.78 599.1 34.55 599.1 0 551.55 0"/><polygon points="504 34.55 536.86 29.78 551.55 0 425.55 0 440.25 29.78 473.1 34.55 449.33 57.73 454.94 90.45 522.16 90.45 527.77 57.73 504 34.55" /><polygon points="522.16 90.45 580.94 90.45 551.55 75 522.16 90.45" /><polygon points="580.94 90.45 599.1 90.45 599.1 34.55 575.33 57.73 580.94 90.45" /></g></g></svg><div class="barraDorada" style="width: <?php echo $porcentajeBarra; ?>%; height: 100%; background-color:#ffdf2c;"></div></div>
                                            <span class="cantRese">(<?php echo $cantRese; ?>)</span>
                                        </div>
                                    </div>
                                    <span class="btn-precio">$<?php echo $proV2["Precio"] ?></span>
                                    <span class="btn-descri"><?php echo $proV2["Descripcion"] ?></span>            
                                </div>
                                <form action="productoVista.php" method="POST" name="formPDT10<?php echo $proV2['Id_producto']; ?>" id="formPDT10<?php echo $proV2['Id_producto']; ?>">
                                    <input type="hidden" value="<?php echo $proV2['Id_producto'];?>" name="Id">
                                </form>
                            </button>
                        <?php } ?>
                        <?php $d++?>
                        <?php   $porcentajeRese = 0; ?>
                    <?php } ?> 
                </div>
            </div>
            <div class="containProduct">
                <div class="div1">
                    <div class="tituloProduc-contain">
                        <span class="spanCategoria">Categoría</span>
                        <span class="spanTipo">Tipo</span>
                    </div>
                    <div class="filtros_contain">
                        <span class="filtrosSpan">Filtros de Búsqueda</span>
                        <div class="filtros-contain2">
                            <div class="div-categoria">
                                <label for="slt_categoria">Categoría</label>
                                <select name="slt_categoria" id="slt_categoria">
                                    <option value="Sin Dato">Sin Dato</option>
                                    <?php foreach ($result2 as $catego) {?>
                                        <option value=""><?php echo $catego["Nombre"]?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="div-tipo">
                                <label for="slt_tipo">Tipo</label>
                                <select name="slt_tipo" id="slt_tipo">
                                    <option value="Sin Dato">Sin Dato</option>
                                </select>
                            </div>
                            <div class="div-precio">
                                <label for="slt_precio">Precio</label>
                                <select name="slt_precio" id="slt_precio">
                                    <option value="Sin Dato">Sin Dato</option>
                                    <option value="Mayor precio">Mayor precio</option>
                                    <option value="Menor precio">Menor precio</option>
                                </select>
                            </div>
                        </div>
                        <div class="div-bEspecifica">
                            <span>Búsqueda Específica</span>
                            <input class="bEspecificaPdt" type="text" placeholder="Nombre del producto">
                        </div>
                    </div>
                </div>
                <div id="product_contain">
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