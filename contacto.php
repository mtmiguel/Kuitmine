<?php

    //Incluimos el objeto PDO, revisar el archivo "conexion.php"
    include("conexion.php");


    session_start(); //Iniciamos la sesión.

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

<!DOCTYPE html>
<html lang="en" id="ContactoHTML" typeu="<?php echo $tipoUser ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Contacto Kuitmine</title>
        <link rel="stylesheet" href="estilos\contacto.css">
        <input type="hidden" class="class1Contacto" value="<?php echo $tipoUser?>">
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
            <div class="contenedorPrin">
                <div class="baseContactos">
                    <div class="div1">
                        <span class="spanMediosCon">Medios de Contacto</span>
                        <span class="spanCorreoTitu">Correos y Líneas Administrativos</span>
                        <span class="spanCorreo1">administración@kuitmine.co</span>
                        <span class="spanCorreo2">administraciónSecundaria@kuitmine.co</span>
                        <span class="spanTel1">500 66 7008</span>
                        <span class="spanTel2">600 66 7008</span>
                        <span class="spanRedesTitu">Redes Sociales</span>
                        <span class="spanRedS spanRedS1">@kuitmineComunidad</span>
                        <span class="spanRedS">@kuitmineComunidad</span>
                        <span class="spanRedS spanRedSU">@kuitmine3Comunidad</span>
                        <div class="divSTecnicoPrin">
                            <span class="alguInconSpan">¿Presenta algún inconveniente?</span>
                            <div class="divSTecnico2">
                                <span class="ComuniqueSpan">Comuníquese con el Servicio técnico</span>
                                <div class="conTBlancoCubo">
                                    <span class="spanCorreo1">servicioTecnico@kuitmine.co</span>
                                    <span class="spanTel1">500 66 7008</span>
                                    <span class="spanTel2">600 66 7008</span>
                                </div>  
                            </div>
                        </div>
                    </div>
                    <div class="div2">
                        <img src="img\oficina1.jpg.jpg" alt="Imagen Oficinas Kuitmine">
                    </div>
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