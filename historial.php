<?php


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



?>



<!DOCTYPE html>
<html lang="en" id="HistorialHTML" typeu="<?php echo $tipoUser ?>">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Historial</title>
        <link rel="stylesheet" href="estilos\historial.css">
        <input type="hidden" class="class1Historial" value="<?php echo $tipoUser?>">
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
            <div class="conteintMensaje">
                <span class="spanPrin">Esta versión es de Prueba</span>
                <p class="parrafo">El <span>Historial</span> estará disponible para versiones posteriores a la <span>0.5</span></p>
                <svg version="1.0" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 540.000000 540.000000"
                    preserveAspectRatio="xMidYMid meet">

                    <g transform="translate(0.000000,540.000000) scale(0.100000,-0.100000)"
                     stroke="none">
                    <path d="M2439 5037 c-58 -38 -79 -95 -79 -213 l0 -103 -57 -6 c-213 -23 -361
                    -55 -510 -111 -430 -159 -715 -494 -772 -908 -6 -43 -11 -210 -11 -372 l0
                    -294 -78 0 c-263 0 -514 -185 -577 -425 -12 -47 -15 -120 -15 -343 0 -310 1
                    -316 60 -366 99 -83 242 -33 269 94 6 29 11 155 11 291 0 218 2 243 20 278 39
                    78 124 127 238 137 l71 7 3 -429 c4 -411 5 -431 25 -487 83 -220 237 -363 449
                    -417 66 -17 111 -20 310 -20 l232 0 4 -187 3 -188 32 -60 c57 -110 175 -195
                    311 -224 76 -16 247 -14 317 4 100 26 178 70 238 135 85 92 99 138 105 348 l4
                    172 227 0 c260 0 324 10 440 67 105 52 222 168 273 273 65 131 68 157 68 609
                    l0 404 70 -6 c81 -7 152 -35 198 -80 67 -64 66 -59 72 -417 5 -321 5 -325 28
                    -358 54 -75 164 -93 237 -38 67 52 69 62 73 349 6 388 -10 488 -98 617 -102
                    150 -277 245 -475 258 l-100 7 -6 340 c-6 373 -11 411 -72 575 -95 251 -311
                    476 -578 599 -46 21 -135 55 -198 75 -111 36 -365 86 -439 86 -20 0 -42 4 -49
                    8 -7 4 -12 50 -15 124 -3 129 -12 151 -78 196 -46 31 -134 31 -181 -1z m232
                    -658 c522 -40 879 -235 993 -542 39 -104 48 -186 44 -397 -3 -178 -5 -199 -25
                    -236 -34 -63 -66 -97 -125 -129 l-53 -30 -975 0 -975 0 -54 30 c-64 35 -116
                    99 -136 168 -21 69 -21 369 0 466 51 243 204 421 469 547 234 111 500 150 837
                    123z m-1216 -1648 l70 -26 1005 0 1005 0 70 26 c39 14 78 29 88 33 16 8 17
                    -16 17 -425 0 -434 0 -434 -24 -484 -30 -65 -78 -112 -142 -142 l-52 -23 -973
                    2 c-927 3 -976 4 -1009 22 -49 26 -108 84 -133 131 -21 39 -22 50 -25 484 -3
                    423 -2 443 15 436 10 -5 50 -20 88 -34z m1245 -1524 c0 -129 -2 -146 -19 -161
                    -30 -27 -148 -42 -223 -28 -94 17 -98 25 -98 193 l0 139 170 0 170 0 0 -143z"/>
                    <path d="M1821 3709 c-42 -9 -79 -36 -109 -80 -20 -28 -23 -44 -20 -92 7 -94
                    61 -148 155 -155 49 -3 64 0 93 20 76 52 102 143 64 224 -29 62 -110 98 -183
                    83z"/>
                    <path d="M3171 3709 c-42 -9 -79 -36 -109 -80 -20 -28 -23 -44 -20 -92 7 -94
                    61 -148 155 -155 49 -3 64 0 93 20 76 52 102 143 64 224 -29 62 -110 98 -183
                    83z"/>
                    </g>
                    </svg>
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