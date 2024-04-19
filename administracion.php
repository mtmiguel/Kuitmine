<?php include("conexion.php"); //Conexión a la base de datos. ?> 
<?php

    session_start(); //Iniciamos la sesión.

    //Verificamos que el usuario alla iniciado sesión
    if(isset($_SESSION['iniciado'])){

        //Verificar si el usuario es Administrador, de lo contrario se le negará el acceso a Administracion.php.
        if($_SESSION['tipoUsuario']==="Administrador"){ 

            //Obtenemos las varibales de sesión que contienen el ID y el TIPO del usuario.
            $idUsuario = $_SESSION['iniciado'];
            $tipoUsuario = $_SESSION['tipoUsuario'];

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
                WHERE `producto`.`Id_producto` = ".$prodMasVendidos[$i][0];

                //echo "<br><br>";
                //echo $sql4;
            
                $result4 = $conn3 -> consultar($sql4);

                $prodCantVendidos2[$i] = $result4[0];

            }
            

            //echo "<br><br>Los 10 mas vendidos de la semana 2: ";
            //print_r($prodCantVendidos2);

            $conn2->cerrar();
            $conn3->cerrar();


        }else{

            header("location:accesoDenegado.php");

        }

    }else{

        header("location:InicioSesion.php");

    }


?>


<!DOCTYPE html>
<html lang="en" class="crudHTML">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Productos</title>
        <link rel="stylesheet" href="estilos\administracion.css">
    </head>
    <body class="body">
        <header class="Header">
            <div class="headerdiv">
                <div class="img-logo-containt">
                    <a class="logo-contain" title="Inicio - Modo Cliente" href="index.php"><img src="img\logoPequeño.png" alt="Logo"></a>
                    <div class="imgPath"><img src="img\imgfondoPrin.jpg" alt=""></div>
                    <div class="imgPath2"><img src="img\imgFondo3.jpg" alt=""></div>
                    <div class="imgPath3"><img src="img\imgFondoProducts.jpg" alt=""></div>
                </div>
                <div class="btnTemaContainer">
                </div>
                <nav class="Header_Nav">
                    <ul class="Header_Nav-UL">
                        <div class="nav-lisContaint">
                            <li class="liInicio"><a href="" class="enlace">Administración</a></li>
                            <li><a class="enlace">Usuarios</a></li>
                            <li><a class="enlace">Ventas</a></li>
                        </div>
                        <div class="iniRegiContain">
                            <a href="user.php" class="enlace user-enlace"><svg class="icon-user svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 329.65 368.26"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M175.57,0c8.45,1.65,17,3.14,24.9,6.61,32.2,14,52.35,38,58.64,72.74,5,27.51-1.54,52.59-18.61,74.68-16.13,20.86-37.49,33.25-63.68,36.52-30.7,3.82-57.56-5.39-79.34-27.09-22.88-22.8-32.39-50.86-27.15-83C76.87,40.34,106,10.28,145.58,1.61,148.38,1,151.2.53,154,0Z"/><path d="M162.65,368.26A186.31,186.31,0,0,1,51.37,331a189.07,189.07,0,0,1-49.46-54,11.15,11.15,0,0,1-.57-11.54q24.6-50.67,79-65.29a121.24,121.24,0,0,1,13.39-2.59c4.81-.73,8.89,1.36,12.68,4a97,97,0,0,0,40.4,16.92c26.47,4.41,51.48.17,73.61-15.29,9.42-6.59,18.47-5.82,28.27-3.29,33.67,8.68,58.77,28.6,76.25,58.41a80.19,80.19,0,0,1,4,8.44,8.09,8.09,0,0,1-.52,7.89c-20.4,33.17-47.66,58.75-83,75.43C219.64,362.28,192.64,368.13,162.65,368.26Z"/></g></g></svg><span>Mi Perfil</span></a>
                            <a href="cerrar.php" class="enlace salir-enlace"><svg class="icon-salir svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 317.07 310.36"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M317.07,109.54a28.93,28.93,0,0,1-7,10q-23.36,23.22-46.6,46.57c-3.13,3.13-6.58,5.66-11.15,6.07-7.12.63-13.1-2.61-16.05-8.66-3-6.25-1.85-13.7,3.41-19.12,6.18-6.36,12.57-12.51,18.83-18.79.76-.76,1.85-1.32,2-2.62-1.19-.66-2.44-.33-3.63-.34q-40.51,0-81,0c-9.54,0-15.91-5.41-17.45-14.6-1.77-10.52,5.72-19.7,16.41-19.75,23.3-.1,46.6,0,69.9,0h16.61c-3.47-3.59-6.56-6.86-9.74-10-3.85-3.88-7.9-7.56-11.63-11.54-7.2-7.68-7.2-17.57-.19-23.93A15.9,15.9,0,0,1,260,42.12a32.66,32.66,0,0,1,3.51,3Q287.25,68.86,311,92.59a22.21,22.21,0,0,1,6.1,9.52Z"/><path d="M62.7,32.29c4.54,2.37,9.08,4.77,13.64,7.11C93.21,48.06,110,56.86,127,65.29c7.86,3.9,11.36,9.91,11.35,18.5q-.09,60.15,0,120.31v3.09c0,4.35,0,4.36,4.24,4.36h30.93c3.09,0,6.19,0,9.28,0,5.28-.1,8-2.75,8-8q.06-28,0-56c0-4.8,0-4.81,4.73-4.81,7.83,0,15.67.09,23.5,0,2.68,0,3.61.81,3.6,3.54-.07,26.9,0,53.81-.07,80.72,0,9.58-6.87,16.37-16.44,16.4q-32.17.1-64.34,0c-3.17,0-4,.93-4,4,.14,17.73.08,35.46.07,53.19,0,8.63-5.72,12.22-13.37,8.27Q67.34,279.27,10.23,249.68c-6.87-3.55-10.19-9-10.18-16.9Q.22,125.14,0,17.51C0,9.06,5.1.49,16.73,0c.82,0,1.65,0,2.47,0q91.86,0,183.72,0a42.88,42.88,0,0,1,5.54.4c8,1,13.91,7.06,14,15.14.22,17.22.07,34.44.11,51.65,0,1.92-.7,2.86-2.7,2.85-8.77,0-17.53,0-26.29,0-2.5,0-2.83-1.4-2.83-3.39q.06-12.84,0-25.67c0-6.57-2.64-9.24-9.11-9.24q-58.45,0-116.91,0H62.9Z"/></g></g></svg><span>Salir</span></a>
                        </div>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="main">
            <div class="nuevoProducContain" id="nuevoProducContain">
                <span class="spanNP">¿Tiene novedades? Actualice el Catálogo</span>
                <a href="crear.php" class="crearNPBtn">Crear un Nuevo Producto</a>
                <div class="imgFondo" style="background-image: url(img/imgFondoNPAdmin.jpg); background-attachment: fixed;
                background-repeat: no-repeat; background-size: cover; filter: brightness(25%);"></div>
            </div>
            <div class="divTituloCrud">
                <span class="divTituloSpan">Productos Disponibles</span>
                <div class="filtrosContainer">
                    <span class="filtrosSpanPrin">Filtros de búsqueda</span>
                    <div class="filtrosCajaGrande">
                        <div class="filtrosCajaPequeña">
                            <div>
                                <span>Categoría</span>
                                <select name="categoFiltro" id="categoFiltro">
                                    <option>Sin Dato</option>
                                    <?php foreach($result2 as $resu2){ ?>
                                        <option><?php echo $resu2["Nombre"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div>
                                <span>Precio</span>
                                <select name="precioFiltro" id="precioFiltro">
                                    <option>Sin Dato</option>
                                    <option>Mayor Precio</option>
                                    <option>Menor Precio</option>
                                </select>
                            </div>
                            <div>
                                <span>Ventas</span>
                                <select name="ventasFiltro" id="ventasFiltro">
                                    <option>Sin Dato</option>
                                    <option>Mas Vendido</option>
                                    <option>Menos Vendido</option>
                                </select>
                            </div>
                        </div>
                        <div class="divBEspecifica">
                            <span>Búsqueda Específica</span>
                            <input type="text" class="bEspecifica" name="bEspecifica" placeholder="Escriba el nombre del producto">
                        </div>
                    </div>
                </div>
            </div>
            <div class="productCrudContain" id="productCrudContain"></div>
            <div class="produ10Vendidos" id="produ10Vendidos">
                <span class="titulo-principal">Los 10 productos mas vendidos de la semana</span>
                <div class="btn-contain">
                    <?php $d=0?>
                    <?php foreach ($prodCantVendidos2 as $proV2){ ?>
                        
                        <?php if($d>0) { ?>
                            <?php if($proV2["Id_producto"] == $prodCantVendidos2[$d-1]["Id_producto"]) { ?>
                                <?php continue; ?>
                            <?php }else { ?>
                                <button type="submit" form="btn10V<?php echo $proV2["Id_producto"]; ?>" class="btn-product" title="Ver Producto">
                                    <div class="btn-imageContain">
                                        <img src="imgSubidas/<?php echo $proV2["imagenPrin"] ?>">
                                    </div>
                                    <div class="btn-infoContain">
                                        <span class="btn-nombre"><?php echo $proV2["Nombre"] ?></span>
                                        <span class="btn-precio"><?php echo $proV2["Precio"] ?></span>
                                        <span class="btn-ventas">Ventas de la semana: <?php echo $prodMasVendidos[$d][1] ?></span>
                                    </div>
                                    <form action="actuDelete.php" name="btn10V<?php echo $proV2["Id_producto"]; ?>" id="btn10V<?php echo $proV2["Id_producto"]; ?>" method="POST">
                                        <input type="hidden" name="Idproducto" value="<?php echo $proV2["Id_producto"]; ?>">
                                    </form>
                                </button>
                            <?php } ?>
                        <?php } else { ?>
                            <button type="submit" form="btn10V<?php echo $proV2["Id_producto"]; ?>" class="btn-product" title="Ver Producto">
                            <div class="btn-imageContain">
                                <img src="imgSubidas/<?php echo $proV2["imagenPrin"] ?>">
                            </div>
                            <div class="btn-infoContain">
                                <span class="btn-nombre"><?php echo $proV2["Nombre"] ?></span>
                                <span class="btn-precio"><?php echo $proV2["Precio"] ?></span>
                                <span class="btn-ventas">Ventas de la semana: <?php echo $prodMasVendidos[$d][1] ?></span>
                            </div>
                            <form action="actuDelete.php" name="btn10V<?php echo $proV2["Id_producto"]; ?>" id="btn10V<?php echo $proV2["Id_producto"]; ?>" method="POST">
                                <input type="hidden" name="Idproducto" value="<?php echo $proV2["Id_producto"]; ?>">
                            </form>
                        </button>
                        <?php } ?>
                        <?php $d++?>
                    <?php } ?> 
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