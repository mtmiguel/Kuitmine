<?php
    session_start(); //Iniciamos la sesión.

    include("conexion.php");

    

    $tipoUser="";

    

    if(isset($_SESSION['iniciado'])){

        if($_SESSION['tipoUsuario'] === "Cliente"){
            $tipoUser = "#ld45";
        }else{
            if($_SESSION['tipoUsuario'] === "Administrador"){
                $tipoUser = "#ad64";
            }else{
                $tipoUser = "neutral";
            }
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST["Id"])) {
            $_SESSION["idPdt"] = $_POST["Id"]; 
        }
        $id = $_SESSION["idPdt"];
        
?>      
<script>
    history.replaceState(null, null, location.pathname)
</script>
<?php
        $conn = new conexion("kuitmine");
        
        $sql = "SELECT * FROM `producto` INNER JOIN `productodetail`
                ON `producto`.`Id_productodetail` = `productoDetail`.`Id_productoDetail`
                WHERE `producto`.`Id_producto` =" . $id;

        $result = $conn->consultar($sql);

        $imgPrin = $result[0]["imagenPrin"];
        $imgSecun = explode(",", $result[0]["imagenesSecun"]);

        $sqlComentarios = "SELECT * FROM `comentarios` WHERE `comentarios`.`Id_productoC` = '".$result[0]["Id_producto"]."'";

        $resultComentarios = $conn->consultar($sqlComentarios);

        $sqlPdtInteres = "SELECT * FROM `producto` INNER JOIN `productoDetail` ON
        `producto`.`Id_productoDetail` = `productoDetail`.`Id_productoDetail` WHERE `producto`.`Categoria` = '".$result[0]["Categoria"]."' AND `producto`.`Id_producto` != ".$result[0]["Id_producto"];

        $resultPdtInteres = $conn->consultar($sqlPdtInteres);

    }else{

        header("location:inicioSesion.php");

    }

    


?>

<!DOCTYPE html>
<html lang="en" id="productoVistaHTML" typeu="<?php echo $tipoUser ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Productos</title>
        <link rel="stylesheet" href="estilos\productoVista.css">
        <input type="hidden" class="class1" value="<?php echo $tipoUser?>">
        <form action="comprarProducto.php" method="post" id="formOcultoProduc" name="formOcultoProduc">
            <input type="hidden" value="<?php echo $result[0]["Id_producto"] ?>" name="Id" class="oRecobrar">
        </form>
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
                    <div class="imgPath2">
                        <div></div><img src="img\imgFondo3.jpg" alt="">
                    </div>
                    <div class="imgPath3">
                        <div></div><img src="img\imgFondoProducts.jpg" alt="">
                    </div>
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
        <div class="seccion2Detalles" id="seccion2Detalles">
            <div class="btnContainerCom">
                <span class="nombreSpan"><?php echo $result[0]["Nombre"] ?></span>
                <span class="precioSpan">$<?php echo $result[0]["Precio"] ?></span>
                <div class="btnDiv">
                    <button type="submit" form="formOcultoProduc" id="btnComprar" name="btnComprar">Comprar Producto</button>
                </div>
            </div>
        </div>
        <main class="main">
            <div class="vista-productoContain">
                <div class="seccion1">
                    <div class="img-contentGeneral">
                        <div class="img-principal">
                            <div class="lente" id="lente"></div>
                            <img class="imgPrincipal" id="imgPrincipal" src="<?php echo 'imgSubidas/' . $imgPrin ?>" alt="Imagen producto">
                        </div>
                    </div>
                    <span class="pdtSimilaresSp">Productos Similares</span>
                    <div class="productosInteres">
                        <?php foreach($resultPdtInteres as $sqlInt) { ?>
                            <button class="pdtInteres" type="submit" form="pdtForm<?php echo $sqlInt["Id_producto"]; ?>">
                                <div class="imgContaint">
                                    <img src="<?php echo 'imgSubidas/'.$sqlInt["imagenPrin"]; ?>" alt="">
                                </div>
                                <div class="dataContaint">
                                    <span class="NombrePdt"><?php echo $sqlInt["Nombre"]; ?></span>
                                </div>
                                <form action="productoVista.php" method="POST" name="pdtForm<?php echo $sqlInt["Id_producto"]; ?>" id="pdtForm<?php echo $sqlInt["Id_producto"]; ?>">
                                    <input type="hidden" value="<?php echo $sqlInt["Id_producto"]; ?>" name="Id">
                                </form>
                            </button>
                        <?php } ?>
                    </div>
                    <div class="descripcionContain">
                        <div><span>Descripción del Producto</span><?php echo $result[0]["Descripcion"] ?></div>
                    </div>
                    <div class="preguntasContainGeneral">
                        <span>Preguntas sobre el producto</span>
                        <div class="preguntasDiv">
                            <div class="preguntasDiv2">
                            </div>  
                        </div>
                        <div class="entradaPreguntasPdt">
                            <svg class="flechaAbajoIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 106.99 62.24"><defs></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path class="cls-1" d="M52.77,62.24,1.66,11.13a5.67,5.67,0,0,1,8-8L52.77,46.2,97.31,1.66a5.67,5.67,0,0,1,8,8Z"/></g></g></svg>
                            <span id="preEspan">Haz una pregunta acerca de este producto</span>
                            <textarea name="preguntaTA" id="preguntaTA" cols="30" rows="5"></textarea>
                            <button class="btnSubirPregunta" onclick="subirPregunta(<?php echo $result[0]['Id_producto'] ?>, `preguntaTA`, <?php echo $_SESSION['iniciado'] ?>, `preguntasDiv2`)">Subir Pregunta</button>
                            <span id="spanCuentaCaracter"><span class="cantCaracterSpan">0</span>/250</span>
                            <span id="mErrorPregunta" style="display: none;">###</span>
                        </div>
                    </div>
                    <div class="calificaContain">
                        <span class="reseñaSpan">Reseñas</span>
                        <div class="reseñaContaintPrin">
                            <span class="productoSpan"></span>
                            <div class="div1">
                            </div>
                            <div class="div2">
                            </div>
                            <div class="div3">
                                <div class="divGeneIntRese">
                                    <div class="divIntRese">
                                        <div class="flechaDivRese" onclick="mostrarReseCuadroInt(`divIntRese`, `flechaDivRese`)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 106.99 62.24"><defs></defs><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path class="cls-1" d="M52.77,62.24,1.66,11.13a5.67,5.67,0,0,1,8-8L52.77,46.2,97.31,1.66a5.67,5.67,0,0,1,8,8Z"/></g></g></svg></div>
                                        <span class="subeReseSpan">Sube una reseña sobre este producto</span>
                                        <div class="subirReseContent">
                                            <textarea name="" id="" class="textAreaRese" cols="10" rows="5" oninput="verifTAReseña('textAreaRese', 'btnSRese', 'contadorC2', 'contadorC')"></textarea>
                                            <div class="contenedroStar">
                                                <svg class="star star1" onmouseover="colorStar(1)" onmouseleave="quitarColorStar()" onclick="marcarEstrella(1, `btnSRese`, `textAreaRese`, `contadorC`, `contadorC2`)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 95.11 90.45"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><polygon points="62.25 29.77 47.55 0 32.86 29.77 0 34.55 23.78 57.73 18.16 90.45 47.55 75 76.94 90.45 71.33 57.73 95.11 34.55 62.25 29.77" /></g></g></svg>
                                                <svg class="star star2" onmouseover="colorStar(2)" onmouseleave="quitarColorStar()" onclick="marcarEstrella(2, `btnSRese`, `textAreaRese`, `contadorC`, `contadorC2`)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 95.11 90.45"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><polygon points="62.25 29.77 47.55 0 32.86 29.77 0 34.55 23.78 57.73 18.16 90.45 47.55 75 76.94 90.45 71.33 57.73 95.11 34.55 62.25 29.77" /></g></g></svg>
                                                <svg class="star star3" onmouseover="colorStar(3)" onmouseleave="quitarColorStar()" onclick="marcarEstrella(3, `btnSRese`, `textAreaRese`, `contadorC`, `contadorC2`)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 95.11 90.45"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><polygon points="62.25 29.77 47.55 0 32.86 29.77 0 34.55 23.78 57.73 18.16 90.45 47.55 75 76.94 90.45 71.33 57.73 95.11 34.55 62.25 29.77" /></g></g></svg>
                                                <svg class="star star4" onmouseover="colorStar(4)" onmouseleave="quitarColorStar()" onclick="marcarEstrella(4, `btnSRese`, `textAreaRese`, `contadorC`, `contadorC2`)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 95.11 90.45"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><polygon points="62.25 29.77 47.55 0 32.86 29.77 0 34.55 23.78 57.73 18.16 90.45 47.55 75 76.94 90.45 71.33 57.73 95.11 34.55 62.25 29.77" /></g></g></svg>
                                                <svg class="star star5" onmouseover="colorStar(5)" onmouseleave="quitarColorStar()" onclick="marcarEstrella(5, `btnSRese`, `textAreaRese`, `contadorC`, `contadorC2`)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 95.11 90.45"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><polygon points="62.25 29.77 47.55 0 32.86 29.77 0 34.55 23.78 57.73 18.16 90.45 47.55 75 76.94 90.45 71.33 57.73 95.11 34.55 62.25 29.77" /></g></g></svg>
                                                <span class="spanDarasXEstrellas"></span>
                                            </div>
                                            <div class="contentButon">
                                                <button class="btnSubirReseña2 btnSRese" onclick="subirReseñaFuncion(`div31`, `textAreaRese`, `btnSRese`, `inputReseña`, <?php echo $result[0]['Id_producto']; ?>, <?php echo $_SESSION['iniciado']?>)" disabled>Subir Reseña</button>
                                                <span class="contadorC"><span class="contadorC2">0</span>/200</span>
                                            </div>
                                            <input type="hidden" class="inputReseña" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="div31"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="seccion2">
                    <div class="resultZoom" id="resultZoom"></div>
                </div>
            </div>
        </main>
        <footer class="footer">
            <div class="footer_content">
            </div>
            <span class="copy">©2023 Dynaroot - Todos los Derechos Reservados</span>
        </footer>
        <script src="js\app2.js"></script>
    </body>
</html>