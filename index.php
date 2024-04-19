<?php
    
    
    include("conexion.php");


    session_start();
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

    $conn = new conexion("kuitmine");

    $resultPdt = $conn->consultar("SELECT * FROM `producto` ORDER BY `producto`.`Id_producto` DESC LIMIT 3")

?>

<!DOCTYPE html>
<html class="indexHTML" lang="en" typeu="<?php echo $tipoUser ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio</title>
        <link rel="stylesheet" href="estilos\index.css">
        <input type="hidden" class="class1Index" value="<?php echo $tipoUser?>">
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
            <img class="logoKuitmine" src="img\logoPequeño.png" alt="Logo Kuitmine">
            <nav class="Header_Nav">
                <ul class="Header_Nav-UL">
                </ul>
            </nav>
            <span class="spanPrin">Bienvenido a Nuestra Plataforma</span>
            <div id="img_fondoPrin" style="background-image: url(img/ImgFondoPrin.jpg); background-attachment: fixed;
            background-repeat: no-repeat; background-size: cover; filter: brightness(25%);">
            </div>
        </header>
        <main class="main">
            <div class="divSpanPrin">
                <span class="spanPrin2">Materiales y productos para Mineria</span>
                <span class="pPrin">Consigue los mejores precios y descuentos para una labor segura y eficiente.</span>
            </div>
            <div class="divImgs1">
                <div class="degNegro"></div>
                <span class="empreCont">Para Emprender Contigo</span>
                <span class="herraSpan">Te ofrecemos las Herramientas</span>
                <span class="seguSpan">Brindando Seguridad</span>
                <span class="calidadSpan">Y Asegurando la Calidad</span>
            </div>
            <section class="masNuevoSection">
                <span class="spanNuevo">Revisa lo más nuevo en el catálogo</span>
                <div class="divImg">
                    <?php $cuenta = 0; ?>
                    <?php foreach($resultPdt as $resu) { ?>
                        <button type="submit" form="form<?php echo $resu["Id_producto"]; ?>" class="<?php echo 'divIm'.$cuenta+1; ?> animar" style="<?php echo '--i:'.$cuenta; ?>"><img src="<?php echo 'imgSubidas/'.$resu["imagenPrin"]; ?>" alt=""><span><?php echo $resu["Nombre"]; ?></span><form action="productoVista.php" method="POST" name="form<?php echo $resu["Id_producto"]; ?>" id="form<?php echo $resu["Id_producto"]; ?>"><input type="hidden" value="<?php echo $resu["Id_producto"]; ?>" name="Id"></form></button>
                    <?php }; ?>
                </div>
                <a href="productos.php">Ver todos los Productos</a>
            </section>
            <section class="sectionInfo1">
                <p>Con una navegación fácil y segura, en <span>Kuitmine</span> encontrarás las herramientas adecuadas para llevar tu negocio al siguiente nivel.</p>
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 901.15 1293.17"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M81.59,448.35c3.3.22,6.6.35,9.9.35q179.52,0,359,0,180.42,0,360.83,0c3.24,0,6.63.81,9.7-1,.48-4.42-3.4-6-5.76-8.43-23-23.3-46.12-46.58-69.45-69.6-5.76-5.68-8.61-11.87-8.44-20a242.91,242.91,0,0,0-1.5-30.59,348,348,0,0,0-19.18-83.25c-19.94-54.55-51.49-101-96.4-138.1a276.08,276.08,0,0,0-76-44.43,43.66,43.66,0,0,0-6.9-2A3,3,0,0,0,534,53.45c-1.2,3.19-.87,6.53-.87,9.83q0,39.24,0,78.48a77.75,77.75,0,0,1-.35,9.9c-.9,7.08-5.69,11.11-12.91,11.24-7.66.15-12.71-4-13.62-11.47a83.77,83.77,0,0,1-.32-9.9q0-64.95,0-129.9C505.83.34,505.45,0,494.11,0q-43.31,0-86.6,0c-2.41,0-4.82,0-7.21.24-3.06.3-4.42,1.52-4.68,4.46-.29,3.28-.32,6.6-.32,9.9q0,63.6,0,127.19a50.66,50.66,0,0,1-.59,9.87c-1.59,7.84-7.1,11.78-15,11.19-7.09-.54-11.85-5.42-12.39-13-.27-3.89-.15-7.82-.15-11.72,0-26.16.06-52.32-.07-78.48,0-8.83-1.51-9.74-9.48-6.88-1.7.6-3.37,1.29-5,2C318.33,68.38,288.2,88.45,261.75,114c-33.63,32.45-58.27,71-75.27,114.39a343.17,343.17,0,0,0-22.27,94.46c-.9,9.9-1.5,19.78-1.47,29.7,0,5-1.19,9.51-4.65,13.25-3.05,3.31-6,6.7-9.21,9.9q-31.48,31.67-63,63.27c-1.91,1.92-3.73,3.92-5.47,6A2,2,0,0,0,81.59,448.35ZM450,212.75c53.51.07,89.83,42.41,89.65,90.15-.2,52.91-44.87,90.43-89.76,88.94-43.25,1.27-89.23-34.24-89.24-89.44C360.69,252.37,399.77,212.69,450,212.75Z"/><path d="M720.52,1064.47a93.3,93.3,0,0,0-.36-9.9c-.41-3.75-2-5.17-5.92-5.5-3.29-.27-6.61-.22-9.91-.22H196.55c-2.41,0-4.81-.06-7.22.05-7.42.31-8.37,1.25-8.66,8.37,0,1.2,0,2.4,0,3.61q0,110,0,220.07c0,1.5,0,3,0,4.5.33,6.41,1.22,7.37,7.36,7.65,3,.13,6,.06,9,.06H450.52q129,0,257.94,0c11.75,0,12-.25,12-12.21.06-18.64,0-37.28,0-55.92Q720.53,1144.74,720.52,1064.47Z"/><path d="M180.64,839.51q0,84.78,0,169.54a66.63,66.63,0,0,0,.36,7.2,4.2,4.2,0,0,0,4.09,4c3.3.25,6.6.34,9.91.34H450.23q129.42,0,258.82,0c10.55,0,11.2-.73,11.46-11.18,0-.61,0-1.21,0-1.81q0-83.42,0-166.83c0-10.62-.23-10.84-10.22-15.5Q684.16,813.1,658,800.92l-58-27.11a56.75,56.75,0,0,0-5.82-2.43c-2.82-1-4.49-.24-5.79,2.62-1.49,3.28-2.72,6.67-4.07,10a134.47,134.47,0,0,1-28.75,44.37c-35.54,36.19-78.55,50.83-128.76,43.38-29.41-4.36-54.81-17.38-76.44-37.67-16-15.05-27.72-33.1-35.68-53.59-1-2.51-1.95-5-3.14-7.46a3.46,3.46,0,0,0-4.59-1.76c-4.2,1.62-8.36,3.38-12.44,5.28q-41.27,19.23-82.49,38.55c-8.17,3.82-16.2,8-24.51,11.44-5.25,2.21-7.44,5.67-6.9,11.15C180.7,838.3,180.64,838.91,180.64,839.51Z"/><path d="M617.47,664.59c25.33-29.27,46.78-61.07,63.06-96.25,10-21.65,17.65-44.08,21.29-67.74q1.24-8,1.94-16.11c.47-5.35-.94-6.87-6.6-7.27-3.29-.23-6.61-.14-9.92-.14H215.47c-2.7,0-5.41,0-8.12,0-10,.22-10.82.92-10.37,11,.67,15.11,4,29.77,8.15,44.23,10.47,36.26,28.18,68.89,50.18,99.32a447.1,447.1,0,0,0,73.63,79c12.65,10.74,25.89,20.52,41.44,26.84,32.06,13,65.18,18.14,99.7,14.67,14.12-1.42,28-3.7,41.53-7.87,18.83-5.8,36.25-14.25,51.66-26.86A442.38,442.38,0,0,0,617.47,664.59Z"/><path d="M899.86,966.94a82.53,82.53,0,0,0-20.77-46.12A158.59,158.59,0,0,0,850,895.36a264,264,0,0,0-31-18.37c-19.4-9.6-39-18.84-58.5-28.19a79.27,79.27,0,0,0-7.5-3.09c-2.4-.87-4.36.15-4.63,2.61a97.06,97.06,0,0,0-.56,10.78q0,104.65,0,209.3,0,106.45,0,212.91c0,11.44.42,11.82,11.52,11.83q65.4,0,130.81,0c2.1,0,4.21-.09,6.31-.25a4.23,4.23,0,0,0,4.19-4,117,117,0,0,0,.54-11.69q0-143.9,0-287.79A185.78,185.78,0,0,0,899.86,966.94Z"/><path d="M152.47,852.32c-.31-7.21-1.8-8.3-8.09-5.43-23.25,10.6-46.46,21.34-68.81,33.76-18.73,10.41-36.3,22.49-50.91,38.41C8.8,936.35,0,956.3,0,980.2q.27,150.65.07,301.3c0,11.47.17,11.63,11.55,11.64q65,0,129.9,0c2.1,0,4.2-.11,6.3-.26a4.25,4.25,0,0,0,4.21-4c.36-3.58.48-7.2.48-10.8q0-104.64,0-209.28,0-103.74,0-207.49C152.52,858.34,152.6,855.33,152.47,852.32Z"/><path d="M557.59,756.1a68.4,68.4,0,0,0-7.35,3.36c-29.09,14.13-60,20.89-92.14,21.87a250.53,250.53,0,0,1-35.05-1.39,220.92,220.92,0,0,1-74.86-21.52c-1.88-.93-3.71-2-5.65-2.78-3-1.18-5.42.94-4.82,4.21a46.6,46.6,0,0,0,1.68,6.06c14.74,45.36,58.86,79.5,111.89,79.61,8.85.38,18.35-1.2,27.62-3.72,40-10.86,67.12-35.88,81.72-74.58a41.79,41.79,0,0,0,1.92-6.92C563.13,757.12,560.71,755,557.59,756.1Z"/><path d="M452.83,363.58c40.15-2.33,59.92-34.67,58.78-63.81a61.08,61.08,0,0,0-62.26-58.48c-38.31.8-61.46,32.06-60.62,62C389.83,342.77,421.92,365.36,452.83,363.58Z"/></g></g></svg>
                </div>
            </section>
            <section class="sectionRegis">
                <div class="divImg1" style="--e:0"><img src="img/imgUnion1.jpg" alt=""></div>
                <div class="divImg2" style="--e:1"><img src="img/imgUnion2.jpg" alt=""></div>
                <div class="divImg3" style="--e:2"><img src="img/imgUnion3.jpg" alt=""></div>
                <span class="span">Haz parte de la comunidad para estar al tanto de las novedades</span>
                <button class="btnRegisNew"><a href="registro.php"></a>Registrarse</button>
                <div class="blanco"></div>
            </section>
            <section class="sectionContacto">
                <span>¿Necesita más información?</span>
                <a href="contacto.php">Contáctese con Nosotros</a>
                <div class="negro"></div>
            </section>
        </main>
        <footer class="footer">
            <div class="footer_content">
            </div>
            <span class="copy">©2023 Dynaroot - Todos los Derechos Reservados</span>
        </footer>
        <script src="js\app.js"></script>
    </body>
</html>