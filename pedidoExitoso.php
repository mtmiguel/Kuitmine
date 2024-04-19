<?php 

    session_start();

    include("conexion.php");

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


    $conn = new conexion("kuitmine");

    $sql = "";

    if(isset($_SESSION["carrito"]) && isset($_POST["numDocuPago"])){

        $carritoCompras = $_SESSION["carrito"];

        $numDocu = $_POST["numDocuPago"];
        $nomTarje = $_POST["nombreTarje"];
        $METODOp = $_POST["selectTPago"];

        date_default_timezone_set('America/Bogota');

        $fechaActual = date("d-m-Y");
        $horaActual = date("h:i:s");

        $rand1=rand(100,900);
        $rand2=rand(100,900);

        $total=0;
        for($i = 0; $i <= count($carritoCompras)-1; $i ++) {
            if(isset($carritoCompras[$i])){
                if($carritoCompras[$i]!=NULL){

                    $total = $total + ($carritoCompras[$i]["PrecioPdtCat"] * $carritoCompras[$i]["CantidadPdtCar"]); 

                    $sql ="INSERT INTO
                    `pedido` (`Referencia`, `Cliente`, `Estado`, `Medio`, `Total`, `Fecha`, `Producto`)
                    VALUES ('".$rand1.$carritoCompras[$i]["refPdtCar"].$rand2."', ".$_SESSION["iniciado"].", 'Pago Pendiente', '".$METODOp."', '".$total."', '".$fechaActual."".$horaActual."', ".$carritoCompras[$i]["refPdtCar"].")";

                    $resultadoInsert = $conn->ejecutar($sql);

                }
            }   
            
        }


        unset($_SESSION["carrito"]);
    }

?>


<!DOCTYPE html>
<html lang="en" class="pedidoExitosoHTML">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pedido Realizado</title>
        <link rel="stylesheet" href="estilos\pedidoExitoso.css">
        <input type="hidden" class="pedidoExitosoClass1" value="<?php echo $tipoUser?>">
    </head>
    <body>
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
            <div>
                <span>Su Pedido se ha completado Exitosamente</span>
                <a href="productos.php">Volver a Productos</a>
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