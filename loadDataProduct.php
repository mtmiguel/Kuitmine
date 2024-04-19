<?php

    //Conexión a la base de datos kuitmine:

        require 'connDataAdmin.php';

    //-----------------------------------------------------------------------

        

    //(Productos.php) INICIO -------------------------------------------------------------------->



        //Llenamos el contenedor de productos:

            if(isset($_POST["pdtDataGeneral"])){
                
                $queryPdtGeneral = $conn->real_escape_string($_POST["pdtDataGeneral"]);
                $tipoUser = $_POST["tipoUser"];

                $resultadoPdtGeneral = $conn->query($queryPdtGeneral);
                

                $htmlPdtGeneral = ""; 

                if($resultadoPdtGeneral->num_rows > 0){
                    while($rowPdtG = $resultadoPdtGeneral -> fetch_assoc()){

                        $reseñaPorcentaje = 0; 
                        $reseñaCantidad = 0;
                        $resPorcentajeBarra = 0;

                        $queryReseñas = $conn->real_escape_string("SELECT * FROM `kuitmine`.`resenias` WHERE `kuitmine`.`resenias`.`Id_productoRese` = ".$rowPdtG["Id_producto"]);
                        $resultadoPdtReseñas = $conn->query($queryReseñas);

                        $reseñaCantidad = $resultadoPdtReseñas -> num_rows;

                        if($resultadoPdtReseñas -> num_rows >0){
                            
                            while($rowPdtR = $resultadoPdtReseñas -> fetch_assoc()){
                                $reseñaPorcentaje += $rowPdtR["NumeroEstrellas"];
                            }
                            $reseñaPorcentaje = $reseñaPorcentaje/$reseñaCantidad;
                            $reseñaPorcentaje = round($reseñaPorcentaje, 1);
                            $resPorcentajeBarra = ($reseñaPorcentaje*100)/5;

                        }

                        if($tipoUser=="#ld45"){

                            $htmlPdtGeneral .=
                            "<button class='aProducto' type='submit' form='anun".$rowPdtG["Id_producto"]."'>
                                <div class='anuncio'>
                                    <div class='img-contain'>
                                        <img src='imgSubidas/".$rowPdtG["imagenPrin"]."' alt='Imagen'>
                                    </div>
                                    <div class='contenido-anun'>
                                        <span class='anun-nombre'>".$rowPdtG["Nombre"]."</span>
                                        <div class='anun-calificacion'>
                                            <div class='califDivGeneral'>
                                                <span class='porReseSpan'>".$reseñaPorcentaje."</span>
                                                <div class='barraBaseCPDT'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 599.1 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='0 34.55 0 90.45 18.16 90.45 23.77 57.73 0 34.55' '/><polygon points='47.55 0 0 0 0 34.55 32.86 29.78 47.55 0' '/><polygon points='18.16 90.45 76.94 90.45 47.55 75 18.16 90.45' '/><polygon points='126 34.55 158.86 29.78 173.55 0 47.55 0 62.25 29.78 95.1 34.55 71.33 57.73 76.94 90.45 144.16 90.45 149.77 57.73 126 34.55' '/><polygon points='144.16 90.45 202.94 90.45 173.55 75 144.16 90.45' '/><polygon points='252 34.55 284.86 29.78 299.55 0 173.55 0 188.25 29.78 221.1 34.55 197.33 57.73 202.94 90.45 270.16 90.45 275.77 57.73 252 34.55' '/><polygon points='270.16 90.45 328.94 90.45 299.55 75 270.16 90.45' '/><polygon points='378 34.55 410.86 29.78 425.55 0 299.55 0 314.25 29.78 347.1 34.55 323.33 57.73 328.94 90.45 396.16 90.45 401.77 57.73 378 34.55' '/><polygon points='396.16 90.45 454.94 90.45 425.55 75 396.16 90.45' '/><polygon points='551.55 0 566.25 29.78 599.1 34.55 599.1 0 551.55 0' '/><polygon points='504 34.55 536.86 29.78 551.55 0 425.55 0 440.25 29.78 473.1 34.55 449.33 57.73 454.94 90.45 522.16 90.45 527.77 57.73 504 34.55' '/><polygon points='522.16 90.45 580.94 90.45 551.55 75 522.16 90.45' '/><polygon points='580.94 90.45 599.1 90.45 599.1 34.55 575.33 57.73 580.94 90.45' '/></g></g></svg><div class='barraDoradaPdt' style='width: ".$resPorcentajeBarra."%; background-color: #ffc851; height: 100%;'></div></div>
                                                <span class='canReseSpan'>(".$reseñaCantidad.")</span>
                                            </div>
                                        </div>
                                        <span class='anun-precio'>$".$rowPdtG["Precio"]."</span>
                                        <span class='anun-caracteristicas'></span>
                                    </div>
                                    <div id='divAnunDescri'>".$rowPdtG["Descripcion"]."</div>
                                    <form action='productoVista.php' method='POST' class='formOculto' id='anun".$rowPdtG["Id_producto"]."'>
                                        <input type='hidden' value='".$rowPdtG["Id_producto"]."' name='Id'>
                                    </form>
                                    <form action='carritoBase.php' method='POST' class='formOcultoCar' id='anunCar".$rowPdtG["Id_producto"]."'>
                                        <input type='hidden' value='".$rowPdtG["Nombre"]."' name='NombreCarrito'>
                                        <input type='hidden' value='".$rowPdtG["Categoria"]."' name='CategoCarrito'>
                                        <input type='hidden' value='".$rowPdtG["Precio"]."' name='PrecioCarrito' id='PrecioCarrito'>
                                        <input type='hidden' value='".$rowPdtG["IVA"]."' name='IvaCarrito'>
                                        <input type='hidden' value='".$rowPdtG["Descuento"]."' name='DescuCarrito'>
                                        <input type='hidden' value='".$rowPdtG["imagenPrin"]."' name='ImagenCarrito'>
                                        <input type='hidden' value='".$rowPdtG["Id_producto"]."' name='referenciaCarrito'>
                                        <input type='hidden' value='1' id='cantidadCarrito' name='cantidadCarrito' >
                                    </form>
                                </div>
                                <div class='btnCarrito'>
                                    <input type='submit' form='anunCar".$rowPdtG["Id_producto"]."' value='Agregar al Carrito'>
                                    <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 468.58 326.36'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><path d='M467.27,92.57c-4.51-16.24-18.13-26.28-35.79-26.28q-152.66,0-305.29.09c-4.61,0-6.81-1.25-8.09-5.8q-5.05-18-11-35.77C102.4,10.72,92.44,1.37,77.71.63,55-.51,32.09.22,9.27.36,4,.39.37,4.41,0,9.66-.43,16.9,4,21.1,12.45,21.14c20.15.09,40.3,0,60.46.08,7.62,0,12.09,3.33,14.52,10.55,1.75,5.2,3.28,10.47,4.9,15.72Q121,140.23,149.58,233c2.26,7.34,5.71,14,11.93,18.59,3.35,2.48,3.63,3.89.89,7.26a41,41,0,0,0-2.5,48.47,41.53,41.53,0,0,0,44.79,17.83c26.3-6.27,39.3-35.5,26.72-60.09-2.53-4.94-2.51-5,3.06-5q27.22,0,54.46,0c18.32,0,36.64.09,55-.06,4.37,0,4.87.94,2.58,4.61a36.51,36.51,0,0,0-5.31,17.52,41.59,41.59,0,1,0,74-23.17c-2.19-2.78-1.64-3.91,1-5.77a34.1,34.1,0,0,0,13.22-18.27q18.91-61.8,37.83-123.59A33,33,0,0,0,467.27,92.57ZM194.09,305a20.25,20.25,0,0,1,.07-40.5,20.25,20.25,0,0,1-.07,40.5Zm187.63,0a20.25,20.25,0,0,1,.1-40.5,20.25,20.25,0,1,1-.1,40.5Zm64.19-195.61Q428,167.69,410.08,226c-3,9.68-7.16,12.84-17.44,12.84q-102.9,0-205.81,0c-10.13,0-14.53-3.29-17.39-12.94Q149.76,159.54,130.13,93.2c-1.74-5.86-1.71-5.87,4.15-5.87H283.14q73.19,0,146.37,0C444.09,87.33,450.17,95.55,445.91,109.41Z' /><path d='M376.94,142.4a21.06,21.06,0,0,0-4-.14q-76.4,0-152.8,0a21.44,21.44,0,0,0-5.45.4c-3.32.89-4.9,3.23-4.61,6.74a5.81,5.81,0,0,0,5.3,5.68,26.84,26.84,0,0,0,4.49.13h152.3a29.2,29.2,0,0,0,4.49-.1c3.49-.57,6-2.58,6-6.2S380.48,143.09,376.94,142.4Z' /><path d='M364.74,186.15c-1,0-2-.05-3-.05H228.42c-1,0-2,0-3,0-3.91.22-6.33,2.16-6.26,6.21s2.63,5.86,6.51,6c1.5,0,3,0,4.5,0H360.5c1.5,0,3,0,4.49-.07,3.8-.27,5.89-2.57,5.81-6.17S368.55,186.31,364.74,186.15Z'/></g></g></svg>
                                </div>
                            </button>";

                        }else{

                            if($tipoUser=="#ad64" || $tipoUser=="neutral"){

                                $htmlPdtGeneral .=
                                "<button class='aProducto' type='submit' form='anun".$rowPdtG["Id_producto"]."'>
                                    <div class='anuncio'>
                                        <div class='img-contain'>
                                            <img src='imgSubidas/".$rowPdtG["imagenPrin"]."' alt='Imagen'>
                                        </div>
                                        <div class='contenido-anun'>
                                            <span class='anun-nombre'>".$rowPdtG["Nombre"]."</span>
                                            <div class='anun-calificacion'>
                                                <div class='califDivGeneral'>
                                                    <span class='porReseSpan'>".$reseñaPorcentaje."</span>
                                                    <div class='barraBaseCPDT'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 599.1 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='0 34.55 0 90.45 18.16 90.45 23.77 57.73 0 34.55' '/><polygon points='47.55 0 0 0 0 34.55 32.86 29.78 47.55 0' '/><polygon points='18.16 90.45 76.94 90.45 47.55 75 18.16 90.45' '/><polygon points='126 34.55 158.86 29.78 173.55 0 47.55 0 62.25 29.78 95.1 34.55 71.33 57.73 76.94 90.45 144.16 90.45 149.77 57.73 126 34.55' '/><polygon points='144.16 90.45 202.94 90.45 173.55 75 144.16 90.45' '/><polygon points='252 34.55 284.86 29.78 299.55 0 173.55 0 188.25 29.78 221.1 34.55 197.33 57.73 202.94 90.45 270.16 90.45 275.77 57.73 252 34.55' '/><polygon points='270.16 90.45 328.94 90.45 299.55 75 270.16 90.45' '/><polygon points='378 34.55 410.86 29.78 425.55 0 299.55 0 314.25 29.78 347.1 34.55 323.33 57.73 328.94 90.45 396.16 90.45 401.77 57.73 378 34.55' '/><polygon points='396.16 90.45 454.94 90.45 425.55 75 396.16 90.45' '/><polygon points='551.55 0 566.25 29.78 599.1 34.55 599.1 0 551.55 0' '/><polygon points='504 34.55 536.86 29.78 551.55 0 425.55 0 440.25 29.78 473.1 34.55 449.33 57.73 454.94 90.45 522.16 90.45 527.77 57.73 504 34.55' '/><polygon points='522.16 90.45 580.94 90.45 551.55 75 522.16 90.45' '/><polygon points='580.94 90.45 599.1 90.45 599.1 34.55 575.33 57.73 580.94 90.45' '/></g></g></svg><div class='barraDoradaPdt' style='width: ".$resPorcentajeBarra."%; background-color: #ffc851; height: 100%;'></div></div>
                                                    <span class='canReseSpan'>(".$reseñaCantidad.")</span>
                                                </div>
                                            </div>
                                            <span class='anun-precio'>$".$rowPdtG["Precio"]."</span>
                                            <span class='anun-caracteristicas'></span>
                                        </div>
                                        <div id='divAnunDescri'>".$rowPdtG["Descripcion"]."</div>
                                        <form action='productoVista.php' method='POST' class='formOculto' id='anun".$rowPdtG["Id_producto"]."'>
                                            <input type='hidden' value='".$rowPdtG["Id_producto"]."' name='Id'>
                                        </form>
                                        <form action='carritoBase.php' method='POST' class='formOcultoCar' id='anunCar".$rowPdtG["Id_producto"]."'>
                                            <input type='hidden' value='".$rowPdtG["Nombre"]."' name='NombreCarrito'>
                                            <input type='hidden' value='".$rowPdtG["Categoria"]."' name='CategoCarrito'>
                                            <input type='hidden' value='".$rowPdtG["Precio"]."' name='PrecioCarrito' id='PrecioCarrito'>
                                            <input type='hidden' value='".$rowPdtG["IVA"]."' name='IvaCarrito'>
                                            <input type='hidden' value='".$rowPdtG["Descuento"]."' name='DescuCarrito'>
                                            <input type='hidden' value='".$rowPdtG["imagenPrin"]."' name='ImagenCarrito'>
                                            <input type='hidden' value='".$rowPdtG["Id_producto"]."' name='referenciaCarrito'>
                                            <input type='hidden' value='1' id='cantidadCarrito' name='cantidadCarrito' >
                                        </form>
                                    </div>
                                </button>";

                            }

                        }

                        
                    }
                }else{
                    $htmlPdtGeneral  .= "<div class='divNoEncontrados'>NO se Encontraron los Productos</div>";
                }

                echo json_encode($htmlPdtGeneral, JSON_UNESCAPED_UNICODE);

            }

        //-------------------------------------------------------------------------------------------


        //Comprobamos que exista un envio fetch con el campo "categoriaPdtPPP".
        if(isset($_POST["categoriaPdtPPP"])){

            $categoriaPPP2 = $_POST["categoriaPdtPPP"];

            $sqlPdt = "SELECT * FROM `categoria` INNER JOIN `tipos` ON
            `categoria`.`Id_tipo` = `tipos`.`Id_tipo` WHERE
            `categoria`.`Nombre` LIKE '%".$categoriaPPP2."%'"; 

            $resultadoPdt = $conn2->query($sqlPdt);
            $arrayTipos = "";
            $htmlSelectTipo="";

            if($resultadoPdt->num_rows > 0){

                while($row = $resultadoPdt->fetch_assoc()){

                    if(str_contains($row["Tipo"], ",")){
                        $arrayTipos = explode(",", $row["Tipo"]);
                        foreach($arrayTipos as $arrTipo){
                            $htmlSelectTipo .= "<option value='".$arrTipo."'>".$arrTipo."</option>";
                        };
                    }else{
                        $htmlSelectTipo .= "<option value='".$row["Tipo"]."'>".$row["Tipo"]."</option>";
                    }

                }

            }else{

                $htmlSelectTipo .= "<option>Sin Dato</option>";

            };

            echo json_encode($htmlSelectTipo, JSON_UNESCAPED_UNICODE);

        }


        
        if(isset($_POST["tipoPdtPPP"]) || isset($_POST["precioPdtPPP"]) || isset($_POST["categoPdtPPP"])){

            $tipoProducto3 = $_POST["tipoPdtPPP"];
            $precioProducto3 = $_POST["precioPdtPPP"];
            $categoProducto3 = $_POST["categoPdtPPP"];
            $tipoUser = $_POST["tipoUser"];
            $sqlTipo = "";
            $precio2 = "";

            if($tipoProducto3!=="Sin Dato" && $categoProducto3!=="Sin Dato" && $precioProducto3==="Sin Dato"){
                $sqlTipo = "SELECT * FROM `producto` INNER JOIN `productoDetail` ON
                `producto`.`Id_productoDetail` = `productoDetail`.`Id_productoDetail`
                WHERE `producto`.`Categoria` = '".$categoProducto3."' AND `producto`.`Tipo` = '".$tipoProducto3."'";
            }else{
                if($tipoProducto3!=="Sin Dato" && $categoProducto3!=="Sin Dato" && $precioProducto3!=="Sin Dato"){
                    if($precioProducto3==="Mayor precio"){
                        $precio2 = "ORDER BY `producto`.`Precio` DESC";
                    }else{
                        if($precioProducto3==="Menor precio"){
                            $precio2 = "ORDER BY `producto`.`Precio` ASC";
                        }
                    }
                    $sqlTipo = "SELECT * FROM `producto` INNER JOIN `productoDetail` ON
                    `producto`.`Id_productoDetail` = `productoDetail`.`Id_productoDetail`
                    WHERE `producto`.`Categoria` = '".$categoProducto3."' AND `producto`.`Tipo` = '".$tipoProducto3."' ".$precio2;
                }else{
                    if($tipoProducto3==="Sin Dato" && $categoProducto3!=="Sin Dato" && $precioProducto3!=="Sin Dato"){
                        if($precioProducto3==="Mayor precio"){
                            $precio2 = "ORDER BY `producto`.`Precio` DESC";
                        }else{
                            if($precioProducto3==="Menor precio"){
                                $precio2 = "ORDER BY `producto`.`Precio` ASC";
                            }
                        }
                        $sqlTipo = "SELECT * FROM `producto` INNER JOIN `productoDetail` ON
                        `producto`.`Id_productoDetail` = `productoDetail`.`Id_productoDetail`
                        WHERE `producto`.`Categoria` = '".$categoProducto3."' ".$precio2;
                    }else{
                        if($tipoProducto3==="Sin Dato" && $categoProducto3!=="Sin Dato" && $precioProducto3==="Sin Dato"){
                            $sqlTipo = "SELECT * FROM `producto` INNER JOIN `productoDetail` ON
                            `producto`.`Id_productoDetail` = `productoDetail`.`Id_productoDetail`
                            WHERE `producto`.`Categoria` = '".$categoProducto3."'";
                        }else{
                            if($tipoProducto3==="Sin Dato" && $categoProducto3==="Sin Dato" && $precioProducto3!=="Sin Dato"){
                                if($precioProducto3==="Mayor precio"){
                                    $precio2 = "ORDER BY `producto`.`Precio` DESC";
                                }else{
                                    if($precioProducto3==="Menor precio"){
                                        $precio2 = "ORDER BY `producto`.`Precio` ASC";
                                    }
                                }
                                $sqlTipo = "SELECT * FROM `producto` INNER JOIN `productoDetail` ON
                                `producto`.`Id_productoDetail` = `productoDetail`.`Id_productoDetail` ".$precio2;
                            }else{
                                if($tipoProducto3==="Sin Dato" && $categoProducto3==="Sin Dato" && $precioProducto3==="Sin Dato"){
                                    $sqlTipo = "SELECT * FROM `producto` INNER JOIN `productoDetail` ON
                                    `producto`.`Id_productoDetail` = `productoDetail`.`Id_productoDetail` ";
                                }else{
                                    if($tipoProducto3!=="Sin Dato" && $categoProducto3==="Sin Dato" && $precioProducto3==="Sin Dato"){
                                        $sqlTipo = "SELECT * FROM `producto` INNER JOIN `productoDetail` ON
                                        `producto`.`Id_productoDetail` = `productoDetail`.`Id_productoDetail` ";
                                    }else{
                                        if($tipoProducto3!=="Sin Dato" && $categoProducto3==="Sin Dato" && $precioProducto3!=="Sin Dato"){
                                            if($precioProducto3==="Mayor precio"){
                                                $precio2 = "ORDER BY `producto`.`Precio` DESC";
                                            }else{
                                                if($precioProducto3==="Menor precio"){
                                                    $precio2 = "ORDER BY `producto`.`Precio` ASC";
                                                }
                                            }
                                            $sqlTipo = "SELECT * FROM `producto` INNER JOIN `productoDetail` ON
                                            `producto`.`Id_productoDetail` = `productoDetail`.`Id_productoDetail` ".$precio2;
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }

            $resultPdtXTipo = $conn2->query($sqlTipo);
            $htmlPdtXTipo = ""; 

            if($resultPdtXTipo->num_rows > 0){

                

                while($rowPdtT = $resultPdtXTipo -> fetch_assoc()){

                    $reseñaPorcentaje = 0; 
                    $reseñaCantidad = 0;
                    $resPorcentajeBarra = 0;

                    $queryReseñas = $conn->real_escape_string("SELECT * FROM `kuitmine`.`resenias` WHERE `kuitmine`.`resenias`.`Id_productoRese` = ".$rowPdtT["Id_producto"]);
                    $resultadoPdtReseñas = $conn->query($queryReseñas);

                    $reseñaCantidad = $resultadoPdtReseñas -> num_rows;

                    if($resultadoPdtReseñas -> num_rows >0){
                        
                        while($rowPdtE = $resultadoPdtReseñas -> fetch_assoc()){
                            $reseñaPorcentaje += $rowPdtE["NumeroEstrellas"];
                        }
                        $reseñaPorcentaje = $reseñaPorcentaje/$reseñaCantidad;
                        $reseñaPorcentaje = round($reseñaPorcentaje, 1);
                        $resPorcentajeBarra = ($reseñaPorcentaje*100)/5;

                    }

                    
                    if($tipoUser=="#ld45"){

                        $htmlPdtXTipo .=
                        "<button class='aProducto' type='submit' form='anun".$rowPdtT["Id_producto"]."'>
                            <div class='anuncio'>
                                <div class='img-contain'>
                                    <img src='imgSubidas/".$rowPdtT["imagenPrin"]."' alt='Imagen'>
                                </div>
                                <div class='contenido-anun'>
                                    <span class='anun-nombre'>".$rowPdtT["Nombre"]."</span>
                                    <div class='anun-calificacion'>
                                        <div class='califDivGeneral'>
                                            <span class='porReseSpan'>".$reseñaPorcentaje."</span>
                                            <div class='barraBaseCPDT'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 599.1 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='0 34.55 0 90.45 18.16 90.45 23.77 57.73 0 34.55' '/><polygon points='47.55 0 0 0 0 34.55 32.86 29.78 47.55 0' '/><polygon points='18.16 90.45 76.94 90.45 47.55 75 18.16 90.45' '/><polygon points='126 34.55 158.86 29.78 173.55 0 47.55 0 62.25 29.78 95.1 34.55 71.33 57.73 76.94 90.45 144.16 90.45 149.77 57.73 126 34.55' '/><polygon points='144.16 90.45 202.94 90.45 173.55 75 144.16 90.45' '/><polygon points='252 34.55 284.86 29.78 299.55 0 173.55 0 188.25 29.78 221.1 34.55 197.33 57.73 202.94 90.45 270.16 90.45 275.77 57.73 252 34.55' '/><polygon points='270.16 90.45 328.94 90.45 299.55 75 270.16 90.45' '/><polygon points='378 34.55 410.86 29.78 425.55 0 299.55 0 314.25 29.78 347.1 34.55 323.33 57.73 328.94 90.45 396.16 90.45 401.77 57.73 378 34.55' '/><polygon points='396.16 90.45 454.94 90.45 425.55 75 396.16 90.45' '/><polygon points='551.55 0 566.25 29.78 599.1 34.55 599.1 0 551.55 0' '/><polygon points='504 34.55 536.86 29.78 551.55 0 425.55 0 440.25 29.78 473.1 34.55 449.33 57.73 454.94 90.45 522.16 90.45 527.77 57.73 504 34.55' '/><polygon points='522.16 90.45 580.94 90.45 551.55 75 522.16 90.45' '/><polygon points='580.94 90.45 599.1 90.45 599.1 34.55 575.33 57.73 580.94 90.45' '/></g></g></svg><div class='barraDoradaPdt' style='width: ".$resPorcentajeBarra."%; background-color: #ffc851; height: 100%;'></div></div>
                                            <span class='canReseSpan'>(".$reseñaCantidad.")</span>
                                        </div>
                                    </div>
                                    <span class='anun-precio'>$".$rowPdtT["Precio"]."</span>
                                    <span class='anun-caracteristicas'></span>
                                </div>
                                <div id='divAnunDescri'>".$rowPdtT["Descripcion"]."</div>
                                <form action='productoVista.php' method='POST' class='formOculto' id='anun".$rowPdtT["Id_producto"]."'>
                                    <input type='hidden' value='".$rowPdtT["Id_producto"]."' name='Id'>
                                </form>
                                <form action='carritoBase.php' method='POST' class='formOcultoCar' id='anunCar".$rowPdtT["Id_producto"]."'>
                                    <input type='hidden' value='".$rowPdtT["Nombre"]."' name='NombreCarrito'>
                                    <input type='hidden' value='".$rowPdtT["Categoria"]."' name='CategoCarrito'>
                                    <input type='hidden' value='".$rowPdtT["Precio"]."' name='PrecioCarrito' id='PrecioCarrito'>
                                    <input type='hidden' value='".$rowPdtT["IVA"]."' name='IvaCarrito'>
                                    <input type='hidden' value='".$rowPdtT["Descuento"]."' name='DescuCarrito'>
                                    <input type='hidden' value='".$rowPdtT["imagenPrin"]."' name='ImagenCarrito'>
                                    <input type='hidden' value='".$rowPdtT["Id_producto"]."' name='referenciaCarrito'>
                                    <input type='hidden' value='1' id='cantidadCarrito' name='cantidadCarrito' >
                                </form>
                            </div>
                            <div class='btnCarrito'>
                                <input type='submit' form='anunCar".$rowPdtT["Id_producto"]."' value='Agregar al Carrito'>
                                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 468.58 326.36'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><path d='M467.27,92.57c-4.51-16.24-18.13-26.28-35.79-26.28q-152.66,0-305.29.09c-4.61,0-6.81-1.25-8.09-5.8q-5.05-18-11-35.77C102.4,10.72,92.44,1.37,77.71.63,55-.51,32.09.22,9.27.36,4,.39.37,4.41,0,9.66-.43,16.9,4,21.1,12.45,21.14c20.15.09,40.3,0,60.46.08,7.62,0,12.09,3.33,14.52,10.55,1.75,5.2,3.28,10.47,4.9,15.72Q121,140.23,149.58,233c2.26,7.34,5.71,14,11.93,18.59,3.35,2.48,3.63,3.89.89,7.26a41,41,0,0,0-2.5,48.47,41.53,41.53,0,0,0,44.79,17.83c26.3-6.27,39.3-35.5,26.72-60.09-2.53-4.94-2.51-5,3.06-5q27.22,0,54.46,0c18.32,0,36.64.09,55-.06,4.37,0,4.87.94,2.58,4.61a36.51,36.51,0,0,0-5.31,17.52,41.59,41.59,0,1,0,74-23.17c-2.19-2.78-1.64-3.91,1-5.77a34.1,34.1,0,0,0,13.22-18.27q18.91-61.8,37.83-123.59A33,33,0,0,0,467.27,92.57ZM194.09,305a20.25,20.25,0,0,1,.07-40.5,20.25,20.25,0,0,1-.07,40.5Zm187.63,0a20.25,20.25,0,0,1,.1-40.5,20.25,20.25,0,1,1-.1,40.5Zm64.19-195.61Q428,167.69,410.08,226c-3,9.68-7.16,12.84-17.44,12.84q-102.9,0-205.81,0c-10.13,0-14.53-3.29-17.39-12.94Q149.76,159.54,130.13,93.2c-1.74-5.86-1.71-5.87,4.15-5.87H283.14q73.19,0,146.37,0C444.09,87.33,450.17,95.55,445.91,109.41Z' /><path d='M376.94,142.4a21.06,21.06,0,0,0-4-.14q-76.4,0-152.8,0a21.44,21.44,0,0,0-5.45.4c-3.32.89-4.9,3.23-4.61,6.74a5.81,5.81,0,0,0,5.3,5.68,26.84,26.84,0,0,0,4.49.13h152.3a29.2,29.2,0,0,0,4.49-.1c3.49-.57,6-2.58,6-6.2S380.48,143.09,376.94,142.4Z' /><path d='M364.74,186.15c-1,0-2-.05-3-.05H228.42c-1,0-2,0-3,0-3.91.22-6.33,2.16-6.26,6.21s2.63,5.86,6.51,6c1.5,0,3,0,4.5,0H360.5c1.5,0,3,0,4.49-.07,3.8-.27,5.89-2.57,5.81-6.17S368.55,186.31,364.74,186.15Z'/></g></g></svg>
                            </div>
                        </button>";

                    }else{

                        if($tipoUser=="#ad64" || $tipoUser=="neutral"){

                            $htmlPdtXTipo .=
                            "<button class='aProducto' type='submit' form='anun".$rowPdtT["Id_producto"]."'>
                                <div class='anuncio'>
                                    <div class='img-contain'>
                                        <img src='imgSubidas/".$rowPdtT["imagenPrin"]."' alt='Imagen'>
                                    </div>
                                    <div class='contenido-anun'>
                                        <span class='anun-nombre'>".$rowPdtT["Nombre"]."</span>
                                        <div class='anun-calificacion'>
                                            <div class='califDivGeneral'>
                                                <span class='porReseSpan'>".$reseñaPorcentaje."</span>
                                                <div class='barraBaseCPDT'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 599.1 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='0 34.55 0 90.45 18.16 90.45 23.77 57.73 0 34.55' '/><polygon points='47.55 0 0 0 0 34.55 32.86 29.78 47.55 0' '/><polygon points='18.16 90.45 76.94 90.45 47.55 75 18.16 90.45' '/><polygon points='126 34.55 158.86 29.78 173.55 0 47.55 0 62.25 29.78 95.1 34.55 71.33 57.73 76.94 90.45 144.16 90.45 149.77 57.73 126 34.55' '/><polygon points='144.16 90.45 202.94 90.45 173.55 75 144.16 90.45' '/><polygon points='252 34.55 284.86 29.78 299.55 0 173.55 0 188.25 29.78 221.1 34.55 197.33 57.73 202.94 90.45 270.16 90.45 275.77 57.73 252 34.55' '/><polygon points='270.16 90.45 328.94 90.45 299.55 75 270.16 90.45' '/><polygon points='378 34.55 410.86 29.78 425.55 0 299.55 0 314.25 29.78 347.1 34.55 323.33 57.73 328.94 90.45 396.16 90.45 401.77 57.73 378 34.55' '/><polygon points='396.16 90.45 454.94 90.45 425.55 75 396.16 90.45' '/><polygon points='551.55 0 566.25 29.78 599.1 34.55 599.1 0 551.55 0' '/><polygon points='504 34.55 536.86 29.78 551.55 0 425.55 0 440.25 29.78 473.1 34.55 449.33 57.73 454.94 90.45 522.16 90.45 527.77 57.73 504 34.55' '/><polygon points='522.16 90.45 580.94 90.45 551.55 75 522.16 90.45' '/><polygon points='580.94 90.45 599.1 90.45 599.1 34.55 575.33 57.73 580.94 90.45' '/></g></g></svg><div class='barraDoradaPdt' style='width: ".$resPorcentajeBarra."%; background-color: #ffc851; height: 100%;'></div></div>
                                                <span class='canReseSpan'>(".$reseñaCantidad.")</span>
                                            </div>
                                        </div>
                                        <span class='anun-precio'>$".$rowPdtT["Precio"]."</span>
                                        <span class='anun-caracteristicas'></span>
                                    </div>
                                    <div id='divAnunDescri'>".$rowPdtT["Descripcion"]."</div>
                                    <form action='productoVista.php' method='POST' class='formOculto' id='anun".$rowPdtT["Id_producto"]."'>
                                        <input type='hidden' value='".$rowPdtT["Id_producto"]."' name='Id'>
                                    </form>
                                    <form action='carritoBase.php' method='POST' class='formOcultoCar' id='anunCar".$rowPdtT["Id_producto"]."'>
                                        <input type='hidden' value='".$rowPdtT["Nombre"]."' name='NombreCarrito'>
                                        <input type='hidden' value='".$rowPdtT["Categoria"]."' name='CategoCarrito'>
                                        <input type='hidden' value='".$rowPdtT["Precio"]."' name='PrecioCarrito' id='PrecioCarrito'>
                                        <input type='hidden' value='".$rowPdtT["IVA"]."' name='IvaCarrito'>
                                        <input type='hidden' value='".$rowPdtT["Descuento"]."' name='DescuCarrito'>
                                        <input type='hidden' value='".$rowPdtT["imagenPrin"]."' name='ImagenCarrito'>
                                        <input type='hidden' value='".$rowPdtT["Id_producto"]."' name='referenciaCarrito'>
                                        <input type='hidden' value='1' id='cantidadCarrito' name='cantidadCarrito' >
                                    </form>
                                </div>
                            </button>";

                        }

                    }


                }
            }else{
                $htmlPdtXTipo  .= "<div class='divNoEncontrados'>NO se Encontraron los Productos</div>";
            }

            echo json_encode($htmlPdtXTipo , JSON_UNESCAPED_UNICODE);

        }

        

        if(isset($_POST["pdtEspecificoN"])){
            

            $productoXNombre00 = isset($_POST["pdtEspecificoN"]) ? $conn->real_escape_string($_POST["pdtEspecificoN"]) : null;
            $tipoUser = $_POST["tipoUser"];
            $where="";

            if($productoXNombre00!==null){

                $where .= "WHERE `producto`.`Nombre` LIKE '%".$productoXNombre00."%'";

            }else{

                $where = "";
                
            }


            $sqlPdtXN = "SELECT * FROM `producto` INNER JOIN `productoDetail` ON
            `producto`.`Id_productoDetail` = `productoDetail`.`Id_productoDetail` $where";

            $resultPdtXNombre = $conn2->query($sqlPdtXN);
            $htmlPdtXNombre = ""; 
            $reseñaPorcentaje = 0; 
            $reseñaCantidad = 0;
            $resPorcentajeBarra = 0;

            if($resultPdtXNombre->num_rows > 0){
                while($rowPdtN = $resultPdtXNombre -> fetch_assoc()){

                    $reseñaPorcentaje = 0; 
                    $reseñaCantidad = 0;
                    $resPorcentajeBarra = 0;

                    $queryReseñas = $conn->real_escape_string("SELECT * FROM `kuitmine`.`resenias` WHERE `kuitmine`.`resenias`.`Id_productoRese` = ".$rowPdtN["Id_producto"]);
                    $resultadoPdtReseñas = $conn->query($queryReseñas);

                    $reseñaCantidad = $resultadoPdtReseñas -> num_rows;

                    if($resultadoPdtReseñas -> num_rows >0){
                        
                        while($rowPdtE = $resultadoPdtReseñas -> fetch_assoc()){
                            $reseñaPorcentaje += $rowPdtE["NumeroEstrellas"];
                        }
                        $reseñaPorcentaje = $reseñaPorcentaje/$reseñaCantidad;
                        $reseñaPorcentaje = round($reseñaPorcentaje, 1);
                        $resPorcentajeBarra = ($reseñaPorcentaje*100)/5;

                    }

                    
                    if($tipoUser=="#ld45"){

                        $htmlPdtXNombre .=
                        "<button class='aProducto' type='submit' form='anun".$rowPdtN["Id_producto"]."'>
                            <div class='anuncio'>
                                <div class='img-contain'>
                                    <img src='imgSubidas/".$rowPdtN["imagenPrin"]."' alt='Imagen'>
                                </div>
                                <div class='contenido-anun'>
                                    <span class='anun-nombre'>".$rowPdtN["Nombre"]."</span>
                                    <div class='anun-calificacion'>
                                        <div class='califDivGeneral'>
                                            <span class='porReseSpan'>".$reseñaPorcentaje."</span>
                                            <div class='barraBaseCPDT'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 599.1 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='0 34.55 0 90.45 18.16 90.45 23.77 57.73 0 34.55' '/><polygon points='47.55 0 0 0 0 34.55 32.86 29.78 47.55 0' '/><polygon points='18.16 90.45 76.94 90.45 47.55 75 18.16 90.45' '/><polygon points='126 34.55 158.86 29.78 173.55 0 47.55 0 62.25 29.78 95.1 34.55 71.33 57.73 76.94 90.45 144.16 90.45 149.77 57.73 126 34.55' '/><polygon points='144.16 90.45 202.94 90.45 173.55 75 144.16 90.45' '/><polygon points='252 34.55 284.86 29.78 299.55 0 173.55 0 188.25 29.78 221.1 34.55 197.33 57.73 202.94 90.45 270.16 90.45 275.77 57.73 252 34.55' '/><polygon points='270.16 90.45 328.94 90.45 299.55 75 270.16 90.45' '/><polygon points='378 34.55 410.86 29.78 425.55 0 299.55 0 314.25 29.78 347.1 34.55 323.33 57.73 328.94 90.45 396.16 90.45 401.77 57.73 378 34.55' '/><polygon points='396.16 90.45 454.94 90.45 425.55 75 396.16 90.45' '/><polygon points='551.55 0 566.25 29.78 599.1 34.55 599.1 0 551.55 0' '/><polygon points='504 34.55 536.86 29.78 551.55 0 425.55 0 440.25 29.78 473.1 34.55 449.33 57.73 454.94 90.45 522.16 90.45 527.77 57.73 504 34.55' '/><polygon points='522.16 90.45 580.94 90.45 551.55 75 522.16 90.45' '/><polygon points='580.94 90.45 599.1 90.45 599.1 34.55 575.33 57.73 580.94 90.45' '/></g></g></svg><div class='barraDoradaPdt' style='width: ".$resPorcentajeBarra."%; background-color: #ffc851; height: 100%;'></div></div>
                                            <span class='canReseSpan'>(".$reseñaCantidad.")</span>
                                        </div>
                                    </div>
                                    <span class='anun-precio'>$".$rowPdtN["Precio"]."</span>
                                    <span class='anun-caracteristicas'></span>
                                </div>
                                <div id='divAnunDescri'>".$rowPdtN["Descripcion"]."</div>
                                <form action='productoVista.php' method='POST' class='formOculto' id='anun".$rowPdtN["Id_producto"]."'>
                                    <input type='hidden' value='".$rowPdtN["Id_producto"]."' name='Id'>
                                </form>
                                <form action='carritoBase.php' method='POST' class='formOcultoCar' id='anunCar".$rowPdtN["Id_producto"]."'>
                                    <input type='hidden' value='".$rowPdtN["Nombre"]."' name='NombreCarrito'>
                                    <input type='hidden' value='".$rowPdtN["Categoria"]."' name='CategoCarrito'>
                                    <input type='hidden' value='".$rowPdtN["Precio"]."' name='PrecioCarrito' id='PrecioCarrito'>
                                    <input type='hidden' value='".$rowPdtN["IVA"]."' name='IvaCarrito'>
                                    <input type='hidden' value='".$rowPdtN["Descuento"]."' name='DescuCarrito'>
                                    <input type='hidden' value='".$rowPdtN["imagenPrin"]."' name='ImagenCarrito'>
                                    <input type='hidden' value='".$rowPdtN["Id_producto"]."' name='referenciaCarrito'>
                                    <input type='hidden' value='1' id='cantidadCarrito' name='cantidadCarrito' >
                                </form>
                            </div>
                            <div class='btnCarrito'>
                                <input type='submit' form='anunCar".$rowPdtN["Id_producto"]."' value='Agregar al Carrito'>
                                <svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 468.58 326.36'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><path d='M467.27,92.57c-4.51-16.24-18.13-26.28-35.79-26.28q-152.66,0-305.29.09c-4.61,0-6.81-1.25-8.09-5.8q-5.05-18-11-35.77C102.4,10.72,92.44,1.37,77.71.63,55-.51,32.09.22,9.27.36,4,.39.37,4.41,0,9.66-.43,16.9,4,21.1,12.45,21.14c20.15.09,40.3,0,60.46.08,7.62,0,12.09,3.33,14.52,10.55,1.75,5.2,3.28,10.47,4.9,15.72Q121,140.23,149.58,233c2.26,7.34,5.71,14,11.93,18.59,3.35,2.48,3.63,3.89.89,7.26a41,41,0,0,0-2.5,48.47,41.53,41.53,0,0,0,44.79,17.83c26.3-6.27,39.3-35.5,26.72-60.09-2.53-4.94-2.51-5,3.06-5q27.22,0,54.46,0c18.32,0,36.64.09,55-.06,4.37,0,4.87.94,2.58,4.61a36.51,36.51,0,0,0-5.31,17.52,41.59,41.59,0,1,0,74-23.17c-2.19-2.78-1.64-3.91,1-5.77a34.1,34.1,0,0,0,13.22-18.27q18.91-61.8,37.83-123.59A33,33,0,0,0,467.27,92.57ZM194.09,305a20.25,20.25,0,0,1,.07-40.5,20.25,20.25,0,0,1-.07,40.5Zm187.63,0a20.25,20.25,0,0,1,.1-40.5,20.25,20.25,0,1,1-.1,40.5Zm64.19-195.61Q428,167.69,410.08,226c-3,9.68-7.16,12.84-17.44,12.84q-102.9,0-205.81,0c-10.13,0-14.53-3.29-17.39-12.94Q149.76,159.54,130.13,93.2c-1.74-5.86-1.71-5.87,4.15-5.87H283.14q73.19,0,146.37,0C444.09,87.33,450.17,95.55,445.91,109.41Z' /><path d='M376.94,142.4a21.06,21.06,0,0,0-4-.14q-76.4,0-152.8,0a21.44,21.44,0,0,0-5.45.4c-3.32.89-4.9,3.23-4.61,6.74a5.81,5.81,0,0,0,5.3,5.68,26.84,26.84,0,0,0,4.49.13h152.3a29.2,29.2,0,0,0,4.49-.1c3.49-.57,6-2.58,6-6.2S380.48,143.09,376.94,142.4Z' /><path d='M364.74,186.15c-1,0-2-.05-3-.05H228.42c-1,0-2,0-3,0-3.91.22-6.33,2.16-6.26,6.21s2.63,5.86,6.51,6c1.5,0,3,0,4.5,0H360.5c1.5,0,3,0,4.49-.07,3.8-.27,5.89-2.57,5.81-6.17S368.55,186.31,364.74,186.15Z'/></g></g></svg>
                            </div>
                        </button>";

                    }else{

                        if($tipoUser=="#ad64" || $tipoUser=="neutral"){

                            $htmlPdtXNombre .=
                            "<button class='aProducto' type='submit' form='anun".$rowPdtN["Id_producto"]."'>
                                <div class='anuncio'>
                                    <div class='img-contain'>
                                        <img src='imgSubidas/".$rowPdtN["imagenPrin"]."' alt='Imagen'>
                                    </div>
                                    <div class='contenido-anun'>
                                        <span class='anun-nombre'>".$rowPdtN["Nombre"]."</span>
                                        <div class='anun-calificacion'>
                                            <div class='califDivGeneral'>
                                                <span class='porReseSpan'>".$reseñaPorcentaje."</span>
                                                <div class='barraBaseCPDT'><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 599.1 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='0 34.55 0 90.45 18.16 90.45 23.77 57.73 0 34.55' '/><polygon points='47.55 0 0 0 0 34.55 32.86 29.78 47.55 0' '/><polygon points='18.16 90.45 76.94 90.45 47.55 75 18.16 90.45' '/><polygon points='126 34.55 158.86 29.78 173.55 0 47.55 0 62.25 29.78 95.1 34.55 71.33 57.73 76.94 90.45 144.16 90.45 149.77 57.73 126 34.55' '/><polygon points='144.16 90.45 202.94 90.45 173.55 75 144.16 90.45' '/><polygon points='252 34.55 284.86 29.78 299.55 0 173.55 0 188.25 29.78 221.1 34.55 197.33 57.73 202.94 90.45 270.16 90.45 275.77 57.73 252 34.55' '/><polygon points='270.16 90.45 328.94 90.45 299.55 75 270.16 90.45' '/><polygon points='378 34.55 410.86 29.78 425.55 0 299.55 0 314.25 29.78 347.1 34.55 323.33 57.73 328.94 90.45 396.16 90.45 401.77 57.73 378 34.55' '/><polygon points='396.16 90.45 454.94 90.45 425.55 75 396.16 90.45' '/><polygon points='551.55 0 566.25 29.78 599.1 34.55 599.1 0 551.55 0' '/><polygon points='504 34.55 536.86 29.78 551.55 0 425.55 0 440.25 29.78 473.1 34.55 449.33 57.73 454.94 90.45 522.16 90.45 527.77 57.73 504 34.55' '/><polygon points='522.16 90.45 580.94 90.45 551.55 75 522.16 90.45' '/><polygon points='580.94 90.45 599.1 90.45 599.1 34.55 575.33 57.73 580.94 90.45' '/></g></g></svg><div class='barraDoradaPdt' style='width: ".$resPorcentajeBarra."%; background-color: #ffc851; height: 100%;'></div></div>
                                                <span class='canReseSpan'>(".$reseñaCantidad.")</span>
                                            </div>
                                        </div>
                                        <span class='anun-precio'>$".$rowPdtN["Precio"]."</span>
                                        <span class='anun-caracteristicas'></span>
                                    </div>
                                    <div id='divAnunDescri'>".$rowPdtN["Descripcion"]."</div>
                                    <form action='productoVista.php' method='POST' class='formOculto' id='anun".$rowPdtN["Id_producto"]."'>
                                        <input type='hidden' value='".$rowPdtN["Id_producto"]."' name='Id'>
                                    </form>
                                    <form action='carritoBase.php' method='POST' class='formOcultoCar' id='anunCar".$rowPdtN["Id_producto"]."'>
                                        <input type='hidden' value='".$rowPdtN["Nombre"]."' name='NombreCarrito'>
                                        <input type='hidden' value='".$rowPdtN["Categoria"]."' name='CategoCarrito'>
                                        <input type='hidden' value='".$rowPdtN["Precio"]."' name='PrecioCarrito' id='PrecioCarrito'>
                                        <input type='hidden' value='".$rowPdtN["IVA"]."' name='IvaCarrito'>
                                        <input type='hidden' value='".$rowPdtN["Descuento"]."' name='DescuCarrito'>
                                        <input type='hidden' value='".$rowPdtN["imagenPrin"]."' name='ImagenCarrito'>
                                        <input type='hidden' value='".$rowPdtN["Id_producto"]."' name='referenciaCarrito'>
                                        <input type='hidden' value='1' id='cantidadCarrito' name='cantidadCarrito' >
                                    </form>
                                </div>
                            </button>";

                        }

                    }


                }
            }else{
                $htmlPdtXNombre .= "<div class='divNoEncontrados'>NO se Encontraron los Productos</div>";
            }

            echo json_encode($htmlPdtXNombre, JSON_UNESCAPED_UNICODE);


        }




    //(Productos.php) FIN ----------------------------------------------------------------------->



?>