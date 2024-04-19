<?php

    include("conexion.php");
    
    session_start();

    //Devolviendo las Preguntas del producto luego de enviar una nueva Pregunta (Se actualizará el contenedor de Preguntas).
    
        if(isset($_POST["sqlIntPregunta"]) || isset($_POST["sqlCargarPreguntas"])){

        $htmlPreguntasPdt = "";

        $intPregunta = isset($_POST["sqlIntPregunta"]) ? $_POST["sqlIntPregunta"] : null;
        $cargarPregunta = isset($_POST["sqlCargarPreguntas"]) ? $_POST["sqlCargarPreguntas"] : null;;

        $queryPreguntas = ""; 
        $productoId = "";
        $resultadoPreguntas = "";
        $resultadoPreguntas2= "";

        $conn2 = new conexion("kuitmine");

        $resultNumber = 1;

        if($cargarPregunta!==null && $intPregunta === null){

            $queryPreguntas = $_POST["sqlCargarPreguntas"];

            $resultadoPreguntas2 = $conn2->consultar($queryPreguntas);

        }else{

            if($intPregunta !== null && $cargarPregunta===null){

                $queryPreguntas = $_POST["sqlIntPregunta"];

                $productoId = $_POST["idproductoX"];
    
                $resultadoPreguntas = $conn2->ejecutar($queryPreguntas);
    
                $resultadoPreguntas2 = $conn2->consultar("SELECT * FROM `kuitmine`.`comentarios` WHERE `kuitmine`.`comentarios`.`Tipo` = 'Pregunta' AND `kuitmine`.`comentarios`.`Id_productoC` = ".$productoId." ORDER BY `kuitmine`.`comentarios`.`Id_comentario` DESC;");
                
            }
        
        }

        foreach($resultadoPreguntas2 as $resuPregu2){

            $rand1 = rand(100,900);
            $rand2 = rand(100,900);

            $nombres = $conn2->consultar("SELECT `Nombres`,`Apellidos` FROM `usuario` WHERE `usuario`.`Id_usuario` = ".$resuPregu2["Id_usuarioC"]);

            if(count($resultadoPreguntas2)>0){

                $htmlPreguntasPdt .= "
                <div class='preguntaDivGeneral'>
                    <div class='preguntaDivContenido'>

                        <span class='NombreUserPregun'>".$nombres[0]["Nombres"]." ".$nombres[0]["Apellidos"]."</span>
                        <span class='ContenPregunta'>".$resuPregu2["Contenido"]."</span>

                        

                        <div class='divBtns'>
                            <button class='botonCRespuesta botonCRespuesta".$resultNumber.$rand1.$rand2."' onclick='responderPregunBtn(`divReponPregunta".$resultNumber.$rand1.$rand2."`)'>Responder</button>                                             
                            <button class='botonMRespuestas botonMRespuestas".$resultNumber.$rand1.$rand2."' onclick='funcMostrarRespu(`botonMRespuestas".$resultNumber.$rand1.$rand2."`, `divPregunRespuestas".$resultNumber.$rand1.$rand2."`, ".$resuPregu2["Id_comentario"].", `".$nombres[0]["Nombres"]." ".$nombres[0]["Apellidos"]."`)'>Mostrar Respuestas</button> 
                        </div>

                    </div>

                    <div class='divReponPregunta divReponPregunta".$resultNumber.$rand1.$rand2."'>
                        <div class='divReponContenido'>
                            <span class='userAResponSpan'>Responderás a ".$nombres[0]["Nombres"]." ".$nombres[0]["Apellidos"]."</span>
                            <textarea name='' id='' cols='10' rows='8' class='textareaRC textareaRC".$resultNumber.$rand1.$rand2."' oninput='comprobarRes(`textareaRC".$resultNumber.$rand1.$rand2."`, `btnEnviarRespuesta".$resultNumber.$rand1.$rand2."`)'></textarea>
                            <div class='divBtnRC'>
                                <button onclick='funcionOSRes(`textareaRC".$resultNumber.$rand1.$rand2."`,`btnEnviarRespuesta".$resultNumber.$rand1.$rand2."`, ".$resuPregu2["Id_comentario"].", ".$_SESSION["iniciado"].", ".$resuPregu2["Id_productoC"].", `divPregunRespuestas".$resultNumber.$rand1.$rand2."`)' class='btnEnviarRespuesta btnEnviarRespuesta".$resultNumber.$rand1.$rand2."' disabled>Enviar Respuesta</button>
                                <button class='btnCancelRespuesta' onclick='canselRespuC(`divReponPregunta".$resultNumber.$rand1.$rand2."`)'>Cancelar</button>
                            </div>
                        </div>
                    </div>

                    <div class='divPregunRespuestas divPregunRespuestas".$resultNumber.$rand1.$rand2."'>
                    </div>

                </div>";

            }else{

                $htmlPreguntasPdt .= "<div>Aún no hay Preguntas</div><div>¡Se el primero en comentar!</div>";

            }

            $resultNumber++;

        }

        echo json_encode($htmlPreguntasPdt, JSON_UNESCAPED_UNICODE);

        }

    //----------------------------------------------------------------------------


    //Insertando una nueva respuesta

        
        if(isset($_POST["sqlInsertRespu"])){

            $sqlInsertRespu = $_POST["sqlInsertRespu"];
            $idComentarioInsert = $_POST["IdComent"];

            $conn = new conexion("kuitmine");

            $insercion = $conn->ejecutar($sqlInsertRespu);

            $origen1 = $conn->consultar("SELECT `Id_usuarioC` FROM `comentarios` WHERE `comentarios`.`Id_comentario` = ".$idComentarioInsert.";");

            $nombreComentarioOrigen = $conn->consultar("SELECT `Nombres`, `Apellidos` FROM `usuario` WHERE `usuario`.`Id_usuario` = ".$origen1[0]["Id_usuarioC"].";");

            $result2 = $conn->consultar("SELECT * FROM `kuitmine`.`comentarios` WHERE `kuitmine`.`comentarios`.`Tipo` = 'Respuesta' AND `kuitmine`.`comentarios`.`ComentarioR` = ".$idComentarioInsert." ORDER BY `kuitmine`.`comentarios`.`Id_comentario` DESC;");

            $htmlRespuestas2 = "";
            $nombres= "";

            $resultNumber = 1;

            if(count($result2)>0){

                foreach($result2 as $resu){

                    $idRespu = $resu["Id_usuarioC"];

                    $nombres = $conn->consultar("SELECT `Nombres`, `Apellidos` FROM `usuario` WHERE `usuario`.`Id_usuario` = ".$idRespu);

                    $rand1 = rand(100,900);
                    $rand2 = rand(100,900);
                    
                    $htmlRespuestas2 .= "
                    <div class='preguntaDivGeneral'>
                        <div class='preguntaDivContenido'>

                            <span class='NombreUserPregun'><div class='barrita'></div>".$nombres[0]["Nombres"]." ".$nombres[0]["Apellidos"]."<span class='enRespuA'> En respuesta a <span>".$nombreComentarioOrigen[0]["Nombres"]." ".$nombreComentarioOrigen[0]["Apellidos"]."</span></span></span>
                            <span class='ContenPregunta'>".$resu["Contenido"]."</span>

                            

                            <div class='divBtns'>
                                <button class='botonCRespuesta botonCRespuesta".$resultNumber.$rand1.$rand2."' onclick='responderPregunBtn(`divReponPregunta".$resultNumber.$rand1.$rand2."`)'>Responder</button>                                             
                                <button class='botonMRespuestas botonMRespuestas".$resultNumber.$rand1.$rand2."' onclick='funcMostrarRespu(`botonMRespuestas".$resultNumber.$rand1.$rand2."`, `divPregunRespuestas".$resultNumber.$rand1.$rand2."`, ".$resu["Id_comentario"].", `".$nombres[0]["Nombres"]." ".$nombres[0]["Apellidos"]."`)'>Mostrar Respuestas</button> 
                            </div>

                        </div>

                        <div class='divReponPregunta divReponPregunta".$resultNumber.$rand1.$rand2."'>
                            <div class='divReponContenido'>
                                <span class='userAResponSpan'>Responderás a ".$nombres[0]["Nombres"]." ".$nombres[0]["Apellidos"]."</span>
                                <textarea name='' id='' cols='20' rows='8' class='textareaRC textareaRC".$resultNumber.$rand1.$rand2."' oninput='comprobarRes(`textareaRC".$resultNumber.$rand1.$rand2."`, `btnEnviarRespuesta".$resultNumber.$rand1.$rand2."`)'></textarea>
                                <div class='divBtnRC'>
                                    <button onclick='funcionOSRes(`textareaRC".$resultNumber.$rand1.$rand2."`,`btnEnviarRespuesta".$resultNumber.$rand1.$rand2."`, ".$resu["Id_comentario"].", ".$_SESSION["iniciado"].", ".$resu["Id_productoC"].", `divPregunRespuestas".$resultNumber.$rand1.$rand2."`)' class='btnEnviarRespuesta btnEnviarRespuesta".$resultNumber.$rand1.$rand2."' disabled>Enviar Respuesta</button>
                                    <button class='btnCancelRespuesta' onclick='canselRespuC(`divReponPregunta".$resultNumber.$rand1.$rand2."`)'>Cancelar</button>
                                </div>
                            </div>
                        </div>

                        <div class='divPregunRespuestas divPregunRespuestas".$resultNumber.$rand1.$rand2."'>
                        </div>

                    </div>";

                    $resultNumber++;

                }

            }else{

                $htmlRespuestas2 .= "<div class='divNORespuestas'><span>Aún no hay Respuestas</span><span>¡Sé el primero en Comentar!</span></div>";

            }

            echo json_encode($htmlRespuestas2, JSON_UNESCAPED_UNICODE);


        }


    //---------------------------------------------------------------------------------


    //Devolviendo las respuestas de las Preguntas

        if(isset($_POST["sqlRespuestas"])){

            $conn = new conexion("kuitmine");

            $respuestasPregun = $_POST["sqlRespuestas"];
            $nombreComentario = $_POST["nombreComentario"];

            $htmlRespuestas = "";

            $resultado = $conn->consultar($respuestasPregun);

            $resultNumber = 1;

            if(count($resultado)>0){

                foreach($resultado as $resu){

                    $idRespu = $resu["Id_usuarioC"];

                    $nombres = $conn->consultar("SELECT `Nombres`, `Apellidos` FROM `usuario` WHERE `usuario`.`Id_usuario` = ".$idRespu);

                    $rand1 = rand(100,900);
                    $rand2 = rand(100,900);
                    
                    $htmlRespuestas .= "
                    <div class='preguntaDivGeneral'>
                        <div class='preguntaDivContenido'>

                            <span class='NombreUserPregun'><div class='barrita'></div>".$nombres[0]["Nombres"]." ".$nombres[0]["Apellidos"]."<span class='enRespuA'> En respuesta a <span>".$nombreComentario."</span></span></span>
                            <span class='ContenPregunta'>".$resu["Contenido"]."</span>

                            

                            <div class='divBtns'>
                                <button class='botonCRespuesta botonCRespuesta".$resultNumber.$rand1.$rand2."' onclick='responderPregunBtn(`divReponPregunta".$resultNumber.$rand1.$rand2."`)'>Responder</button>                                             
                                <button class='botonMRespuestas botonMRespuestas".$resultNumber.$rand1.$rand2."' onclick='funcMostrarRespu(`botonMRespuestas".$resultNumber.$rand1.$rand2."`, `divPregunRespuestas".$resultNumber.$rand1.$rand2."`, ".$resu["Id_comentario"].", `".$nombres[0]["Nombres"]." ".$nombres[0]["Apellidos"]."`)'>Mostrar Respuestas</button> 
                            </div>

                        </div>

                        <div class='divReponPregunta divReponPregunta".$resultNumber.$rand1.$rand2."'>
                            <div class='divReponContenido'>
                                <span class='userAResponSpan'>Responderás a ".$nombres[0]["Nombres"]." ".$nombres[0]["Apellidos"]."</span>
                                <textarea name='' id='' cols='20' rows='8' class='textareaRC textareaRC".$resultNumber.$rand1.$rand2."' oninput='comprobarRes(`textareaRC".$resultNumber.$rand1.$rand2."`, `btnEnviarRespuesta".$resultNumber.$rand1.$rand2."`)'></textarea>
                                <div class='divBtnRC'>
                                    <button onclick='funcionOSRes(`textareaRC".$resultNumber.$rand1.$rand2."`,`btnEnviarRespuesta".$resultNumber.$rand1.$rand2."`, ".$resu["Id_comentario"].", ".$_SESSION["iniciado"].", ".$resu["Id_productoC"].", `divPregunRespuestas".$resultNumber.$rand1.$rand2."`)' class='btnEnviarRespuesta btnEnviarRespuesta".$resultNumber.$rand1.$rand2."' disabled>Enviar Respuesta</button>
                                    <button class='btnCancelRespuesta' onclick='canselRespuC(`divReponPregunta".$resultNumber.$rand1.$rand2."`)'>Cancelar</button>
                                </div>
                            </div>
                        </div>

                        <div class='divPregunRespuestas divPregunRespuestas".$resultNumber.$rand1.$rand2."'>
                        </div>

                    </div>";

                    $resultNumber++;

                }

            }else{

                $htmlRespuestas .= "<div class='divNORespuestas'><span>Aún no hay Respuestas</span><span>¡Sé el primero en Comentar!</span></div>";

            }

            echo json_encode($htmlRespuestas, JSON_UNESCAPED_UNICODE);

        }    

    //-----------------------------------------------------------------------------


    if(isset($_POST["estrellasRese"])){

        $contenido = $_POST["contenidoRese"];
        $estrellas = $_POST["estrellasRese"];
        $BtnEnviar = $_POST["btnEnviarRese"];
        $divReseñas = $_POST["divConteinRese"]; 
        $idProducto = $_POST["idProductoRese"];
        $idUser = $_POST["idUserRese"];


        $sql = "INSERT INTO `resenias` (`Contenido`, `NumeroEstrellas`, `Id_usuarioRese`, `Id_productoRese`) VALUES ('".$contenido."', ".$estrellas.", ".$idUser.", ".$idProducto.");";

        $conn = new conexion("kuitmine");

        $ultimaInsercion = $conn->ejecutar($sql);

        $htmlResenias = "";
        $htmlResenias2 = "";
        $htmlResenias3 = "";
        $reseñasTotalesN = 0;

        $resultadoRese = $conn->consultar("SELECT * FROM `resenias` WHERE `resenias`.`Id_productoRese` =".$idProducto." ORDER BY `resenias`.`Id_resenia` DESC;");

        if(count($resultadoRese)>0){


            $reseñasTotalesN = count($resultadoRese);

            $calificacion = 0;
            $cincoEstrellas = 0;
            $cuatroEstrellas = 0;
            $tresEstrellas = 0;
            $dosEstrellas = 0;
            $unaEstrella = 0;

            foreach($resultadoRese as $rese){
            
                $calificacion += $rese["NumeroEstrellas"];

                if($rese["NumeroEstrellas"]===5){
                    $cincoEstrellas += 1;
                }else{
                    if($rese["NumeroEstrellas"]===4){
                        $cuatroEstrellas += 1;
                    }else{
                        if($rese["NumeroEstrellas"]===3){
                            $tresEstrellas += 1;
                        }else{
                            if($rese["NumeroEstrellas"]===2){
                                $dosEstrellas += 1; 
                            }else{
                                if($rese["NumeroEstrellas"]===1){
                                    $unaEstrella += 1;
                                }
                            }
                        }
                    }
                }

            }

            $porcentaje5 = ($cincoEstrellas*100)/$reseñasTotalesN;
            $porcentaje4 = ($cuatroEstrellas*100)/$reseñasTotalesN;
            $porcentaje3 = ($tresEstrellas*100)/$reseñasTotalesN;
            $porcentaje2 = ($dosEstrellas*100)/$reseñasTotalesN;
            $porcentaje1 = ($unaEstrella*100)/$reseñasTotalesN; 

            $calificacion = $calificacion/$reseñasTotalesN;
            $calificacion = round($calificacion, 1);

            $porcentaje = ($calificacion*100)/5;

            $htmlResenias .= 
            "
                <span class='calificacion'><span class='numeroCal'>$calificacion</span> / 5</span>
                <div class='estrellasGraficaA'>
                    <svg id='estrellasA' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 599.1 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='0 34.55 0 90.45 18.16 90.45 23.77 57.73 0 34.55'/><polygon points='47.55 0 0 0 0 34.55 32.86 29.78 47.55 0'/><polygon points='18.16 90.45 76.94 90.45 47.55 75 18.16 90.45'/><polygon points='126 34.55 158.86 29.78 173.55 0 47.55 0 62.25 29.78 95.1 34.55 71.33 57.73 76.94 90.45 144.16 90.45 149.77 57.73 126 34.55'/><polygon points='144.16 90.45 202.94 90.45 173.55 75 144.16 90.45'/><polygon points='252 34.55 284.86 29.78 299.55 0 173.55 0 188.25 29.78 221.1 34.55 197.33 57.73 202.94 90.45 270.16 90.45 275.77 57.73 252 34.55'/><polygon points='270.16 90.45 328.94 90.45 299.55 75 270.16 90.45'/><polygon points='378 34.55 410.86 29.78 425.55 0 299.55 0 314.25 29.78 347.1 34.55 323.33 57.73 328.94 90.45 396.16 90.45 401.77 57.73 378 34.55'/><polygon points='396.16 90.45 454.94 90.45 425.55 75 396.16 90.45'/><polygon points='551.55 0 566.25 29.78 599.1 34.55 599.1 0 551.55 0' /><polygon points='504 34.55 536.86 29.78 551.55 0 425.55 0 440.25 29.78 473.1 34.55 449.33 57.73 454.94 90.45 522.16 90.45 527.77 57.73 504 34.55'/><polygon points='522.16 90.45 580.94 90.45 551.55 75 522.16 90.45'/><polygon points='580.94 90.45 599.1 90.45 599.1 34.55 575.33 57.73 580.94 90.45'/></g></g></svg>
                    <div class='barraDoradaA' style='width: $porcentaje%; height: 100%; position: absolute; background-color: #684331;'>
                    </div>
                </div>
                <span class='cantiCalificaciones'><span class='numeroRese'>$reseñasTotalesN</span> Reseñas</span>
            ";


            $htmlResenias2 .= 
            "
        
                <div class='listaEstrellasDiv'>
                    <div class='div5estrellas'><div><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 95.11 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='62.25 29.77 47.55 0 32.86 29.77 0 34.55 23.78 57.73 18.16 90.45 47.55 75 76.94 90.45 71.33 57.73 95.11 34.55 62.25 29.77'/></g></g></svg>5 ($cincoEstrellas)</div><div class='barraLlena'><div style='width: $porcentaje5%; height: 100%; background-color: #684331;'></div></div></div>
                    <div class='div4estrellas'><div><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 95.11 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='62.25 29.77 47.55 0 32.86 29.77 0 34.55 23.78 57.73 18.16 90.45 47.55 75 76.94 90.45 71.33 57.73 95.11 34.55 62.25 29.77'/></g></g></svg>4 ($cuatroEstrellas)</div><div class='barraLlena'><div style='width: $porcentaje4%; height: 100%; background-color: #684331;'></div></div></div>
                    <div class='div3estrellas'><div><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 95.11 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='62.25 29.77 47.55 0 32.86 29.77 0 34.55 23.78 57.73 18.16 90.45 47.55 75 76.94 90.45 71.33 57.73 95.11 34.55 62.25 29.77'/></g></g></svg>3 ($tresEstrellas)</div><div class='barraLlena'><div style='width: $porcentaje3%; height: 100%; background-color: #684331;'></div></div></div>
                    <div class='div2estrellas'><div><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 95.11 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='62.25 29.77 47.55 0 32.86 29.77 0 34.55 23.78 57.73 18.16 90.45 47.55 75 76.94 90.45 71.33 57.73 95.11 34.55 62.25 29.77'/></g></g></svg>2 ($dosEstrellas)</div><div class='barraLlena'><div style='width: $porcentaje2%; height: 100%; background-color: #684331;'></div></div></div>
                    <div class='div1estrellas'><div><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 95.11 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='62.25 29.77 47.55 0 32.86 29.77 0 34.55 23.78 57.73 18.16 90.45 47.55 75 76.94 90.45 71.33 57.73 95.11 34.55 62.25 29.77'/></g></g></svg>1 ($unaEstrella)</div><div class='barraLlena'><div style='width: $porcentaje1%; height: 100%; background-color: #684331;'></div></div></div>
                </div>
            
            ";

            

            foreach($resultadoRese as $rese2){

                $nombres = $conn->consultar("SELECT `Nombres`,`Apellidos` FROM `usuario` WHERE `usuario`.`Id_usuario` = ".$rese2["Id_usuarioRese"]);
            
                $htmlResenias3 .= "
                <div>
                    <div>
                        <span>".$nombres[0]["Nombres"]." ".$nombres[0]["Apellidos"]."</span>
                        <span>".$rese2["Contenido"]."</span>
                    </div>
                    <div class='div2'>
                        <span class='elclienteSpan'>El cliente calificó este producto con: </span>
                        <div class='divEstrellaNum'>
                            <span class='numEstrellas'>".$rese2["NumeroEstrellas"]."</span>
                            <svg class='estrella' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 95.11 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='62.25 29.77 47.55 0 32.86 29.77 0 34.55 23.78 57.73 18.16 90.45 47.55 75 76.94 90.45 71.33 57.73 95.11 34.55 62.25 29.77'/></g></g></svg>
                        </div>
                    </div>
                </div>
                ";

            }

            echo json_encode([$htmlResenias, $htmlResenias2, $htmlResenias3], JSON_UNESCAPED_UNICODE);

        }else{

            $htmlReseNew .= "<div><span>Aún no hay Reseñas</span><span>¡Sé el primero en opinar!</span></div>";

            echo json_encode($htmlReseNew, JSON_UNESCAPED_UNICODE);

        }

        

    }
    

    if(isset($_POST["queryResenias"])){

        $htmlResenias = "";
        $htmlResenias2 = "";
        $htmlResenias3 = "";

        $query = $_POST["queryResenias"];

        $conn2 = new conexion("kuitmine");

        $resultadoRese = $conn2->consultar($query);

        
        if(count($resultadoRese) > 0){

            $reseñasTotalesN = count($resultadoRese);

            $calificacion = 0;
            $cincoEstrellas = 0;
            $cuatroEstrellas = 0;
            $tresEstrellas = 0;
            $dosEstrellas = 0;
            $unaEstrella = 0;

            foreach($resultadoRese as $rese){
            
                $calificacion += $rese["NumeroEstrellas"];

                if($rese["NumeroEstrellas"]===5){
                    $cincoEstrellas += 1;
                }else{
                    if($rese["NumeroEstrellas"]===4){
                        $cuatroEstrellas += 1;
                    }else{
                        if($rese["NumeroEstrellas"]===3){
                            $tresEstrellas += 1;
                        }else{
                            if($rese["NumeroEstrellas"]===2){
                                $dosEstrellas += 1; 
                            }else{
                                if($rese["NumeroEstrellas"]===1){
                                    $unaEstrella += 1;
                                }
                            }
                        }
                    }
                }

            }

            $porcentaje5 = ($cincoEstrellas*100)/$reseñasTotalesN;
            $porcentaje4 = ($cuatroEstrellas*100)/$reseñasTotalesN;
            $porcentaje3 = ($tresEstrellas*100)/$reseñasTotalesN;
            $porcentaje2 = ($dosEstrellas*100)/$reseñasTotalesN;
            $porcentaje1 = ($unaEstrella*100)/$reseñasTotalesN; 

            $calificacion = $calificacion/$reseñasTotalesN;
            $calificacion = round($calificacion, 1);

            $porcentaje = ($calificacion*100)/5;

            $htmlResenias .= 
            "
                <span class='calificacion'><span class='numeroCal'>$calificacion</span> / 5</span>
                <div class='estrellasGraficaA'>
                    <svg id='estrellasA' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 599.1 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='0 34.55 0 90.45 18.16 90.45 23.77 57.73 0 34.55'/><polygon points='47.55 0 0 0 0 34.55 32.86 29.78 47.55 0'/><polygon points='18.16 90.45 76.94 90.45 47.55 75 18.16 90.45'/><polygon points='126 34.55 158.86 29.78 173.55 0 47.55 0 62.25 29.78 95.1 34.55 71.33 57.73 76.94 90.45 144.16 90.45 149.77 57.73 126 34.55'/><polygon points='144.16 90.45 202.94 90.45 173.55 75 144.16 90.45'/><polygon points='252 34.55 284.86 29.78 299.55 0 173.55 0 188.25 29.78 221.1 34.55 197.33 57.73 202.94 90.45 270.16 90.45 275.77 57.73 252 34.55'/><polygon points='270.16 90.45 328.94 90.45 299.55 75 270.16 90.45'/><polygon points='378 34.55 410.86 29.78 425.55 0 299.55 0 314.25 29.78 347.1 34.55 323.33 57.73 328.94 90.45 396.16 90.45 401.77 57.73 378 34.55'/><polygon points='396.16 90.45 454.94 90.45 425.55 75 396.16 90.45'/><polygon points='551.55 0 566.25 29.78 599.1 34.55 599.1 0 551.55 0' /><polygon points='504 34.55 536.86 29.78 551.55 0 425.55 0 440.25 29.78 473.1 34.55 449.33 57.73 454.94 90.45 522.16 90.45 527.77 57.73 504 34.55'/><polygon points='522.16 90.45 580.94 90.45 551.55 75 522.16 90.45'/><polygon points='580.94 90.45 599.1 90.45 599.1 34.55 575.33 57.73 580.94 90.45'/></g></g></svg>
                    <div class='barraDoradaA' style='width: $porcentaje%; height: 100%; position: absolute; background-color: #684331;'>
                    </div>
                </div>
                <span class='cantiCalificaciones'><span class='numeroRese'>$reseñasTotalesN</span> Reseñas</span>
            ";


            $htmlResenias2 .= 
            "
        
                <div class='listaEstrellasDiv'>
                    <div class='div5estrellas'><div><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 95.11 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='62.25 29.77 47.55 0 32.86 29.77 0 34.55 23.78 57.73 18.16 90.45 47.55 75 76.94 90.45 71.33 57.73 95.11 34.55 62.25 29.77'/></g></g></svg>5 ($cincoEstrellas)</div><div class='barraLlena'><div style='width: $porcentaje5%; height: 100%; background-color: #684331;'></div></div></div>
                    <div class='div4estrellas'><div><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 95.11 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='62.25 29.77 47.55 0 32.86 29.77 0 34.55 23.78 57.73 18.16 90.45 47.55 75 76.94 90.45 71.33 57.73 95.11 34.55 62.25 29.77'/></g></g></svg>4 ($cuatroEstrellas)</div><div class='barraLlena'><div style='width: $porcentaje4%; height: 100%; background-color: #684331;'></div></div></div>
                    <div class='div3estrellas'><div><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 95.11 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='62.25 29.77 47.55 0 32.86 29.77 0 34.55 23.78 57.73 18.16 90.45 47.55 75 76.94 90.45 71.33 57.73 95.11 34.55 62.25 29.77'/></g></g></svg>3 ($tresEstrellas)</div><div class='barraLlena'><div style='width: $porcentaje3%; height: 100%; background-color: #684331;'></div></div></div>
                    <div class='div2estrellas'><div><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 95.11 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='62.25 29.77 47.55 0 32.86 29.77 0 34.55 23.78 57.73 18.16 90.45 47.55 75 76.94 90.45 71.33 57.73 95.11 34.55 62.25 29.77'/></g></g></svg>2 ($dosEstrellas)</div><div class='barraLlena'><div style='width: $porcentaje2%; height: 100%; background-color: #684331;'></div></div></div>
                    <div class='div1estrellas'><div><svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 95.11 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='62.25 29.77 47.55 0 32.86 29.77 0 34.55 23.78 57.73 18.16 90.45 47.55 75 76.94 90.45 71.33 57.73 95.11 34.55 62.25 29.77'/></g></g></svg>1 ($unaEstrella)</div><div class='barraLlena'><div style='width: $porcentaje1%; height: 100%; background-color: #684331;'></div></div></div>
                </div>
            
            ";

            

            foreach($resultadoRese as $rese2){

                $nombres = $conn2->consultar("SELECT `Nombres`,`Apellidos` FROM `usuario` WHERE `usuario`.`Id_usuario` = ".$rese2["Id_usuarioRese"]);
            
                $htmlResenias3 .= "
                <div>
                    <div>
                        <span>".$nombres[0]["Nombres"]." ".$nombres[0]["Apellidos"]."</span>
                        <span>".$rese2["Contenido"]."</span>
                    </div>
                    <div class='div2'>
                        <span class='elclienteSpan'>El cliente calificó este producto con: </span>
                        <div class='divEstrellaNum'>
                            <span class='numEstrellas'>".$rese2["NumeroEstrellas"]."</span>
                            <svg class='estrella' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 95.11 90.45'><g id='Capa_2' data-name='Capa 2'><g id='Capa_1-2' data-name='Capa 1'><polygon points='62.25 29.77 47.55 0 32.86 29.77 0 34.55 23.78 57.73 18.16 90.45 47.55 75 76.94 90.45 71.33 57.73 95.11 34.55 62.25 29.77'/></g></g></svg>
                        </div>
                    </div>
                </div>
                ";

            }

        }
            
       

        echo json_encode([$htmlResenias, $htmlResenias2, $htmlResenias3], JSON_UNESCAPED_UNICODE);

    }


    if(isset($_POST["queryRespuDevol"])){

        $htmlRespu = "";

        $conn2 = new conexion("kuitmine");

        $queryRespuDevol = $_POST["queryRespuDevol"];

        $respudddd = $conn2->consultar($queryRespuDevol);

        $nRespuesta = 1;
        $claseDiv1 = "";

        foreach($respudddd as $res){

            if($nRespuesta==1){
                $claseDiv1 = "respuestaCdivNumber1";
            }else{ 
                if($nRespuesta==count($respudddd)){
                    $claseDiv1 = "respuestaCdivNumberF";
                }else{
                    $claseDiv1 = "";
                }
            }

            $rand1 = rand(100,900);
            $rand2 = rand(100,900);
            if(!empty($respudddd)){
                $nombre = $conn2->consultar("SELECT `Nombres`,`Apellidos` FROM `usuario` WHERE `usuario`.`Id_usuario` = ".$res["Id_usuarioC"].";");
                $nombreCO = $conn2->consultar("SELECT * FROM `comentarios` WHERE `comentarios`.`Id_comentario` = ".$res["ComentarioR"].";");
                $nombreCO2 = $conn2->consultar("SELECT `Nombres`,`Apellidos` FROM `usuario` WHERE `usuario`.`Id_usuario` = ".$nombreCO[0]["Id_usuarioC"].";");

                $htmlRespu .=
                "<div class='barrita'></div>
                <div class='respuestaCdiv respuestaCdiv".$nRespuesta.$rand1.$rand2."' id='$claseDiv1'>
                    <span class='nombreR nombreR".$nRespuesta.$rand1.$rand2."'>".$nombre[0]['Nombres']." ".$nombre[0]['Apellidos']."  <span class='enRSpan'>En respuesta a <span>".$nombreCO2[0]['Nombres']." ".$nombreCO2[0]['Apellidos']."</span></span></span>
                    <span class='contenidoR contenidoR".$nRespuesta.$rand1.$rand2."'>".$res['Contenido']."</span>
                    <div class='divBTNRes divBTNRes".$nRespuesta.$rand1.$rand2."'>
                        <button class='btnResponder btnResponder".$nRespuesta.$rand1.$rand2."' onclick='mostrarCResponder(`divResponder".$nRespuesta.$rand1.$rand2."`)'>Responder</button>
                        <button class='btnMres btnMres".$nRespuesta.$rand1.$rand2."' onclick='mostrarRespuestas(`btnMres".$nRespuesta.$rand1.$rand2."`, `respuDiv".$nRespuesta.$rand1.$rand2."`, ".$res['Id_comentario'].")'>Mostrar Respuestas</button>
                    </div>
                    <div class='divResponder divResponder".$nRespuesta.$rand1.$rand2."'>
                        <span class='spanResponderas'>Responderás a ".$nombre[0]['Nombres']." ".$nombre[0]['Apellidos']."</span>
                        <textarea name='' id='textARespuesta".$nRespuesta.$rand1.$rand2."' class='textARespuesta' cols='10' rows='5' oninput='desbloqBtnEnviar(`textARespuesta".$nRespuesta.$rand1.$rand2."`, `btnEnviarR".$nRespuesta.$rand1.$rand2."`)'></textarea>
                        <div class='contentBtnEyCR'>
                            <button class='btnEnviarRes btnEnviarR".$nRespuesta.$rand1.$rand2."' onclick='enviarRespuesta(`textARespuesta".$nRespuesta.$rand1.$rand2."`, ".$res['Id_comentario'].", ".$_SESSION['iniciado'].", ".$res['Id_productoC'].", `respuDiv".$nRespuesta.$rand1.$rand2."`, `btnEnviarR".$nRespuesta.$rand1.$rand2."`)' disabled>Enviar Respuesta</button>
                            <button class='btnCancelarERes btnCancelarER".$nRespuesta.$rand1.$rand2."' onclick='cerrarCresponder(`divResponder".$nRespuesta.$rand1.$rand2."`)'>Cancelar</button>
                        </div>
                    </div>
                    <div class='respuDiv respuDiv".$nRespuesta.$rand1.$rand2."'>
                    </div>
                </div>";
            }else{

                if(empty($respudddd)){
                    $htmlRespu.= "<div>Aún no hay Respuestas</div>";
                }

            }
            $nRespuesta += 1;
        }

        echo json_encode($htmlRespu, JSON_UNESCAPED_UNICODE);

    }

    if(isset($_POST["respuestaC"])){

        $htmlRespuestas = "";

        $conn = new conexion("kuitmine");

        $sqlRespuestaC = $_POST["respuestaC"];

        $respuesta = $conn->consultar($sqlRespuestaC);

        $nRespuesta = 1;
        $claseDiv1 = "";
        

        foreach($respuesta as $respu){

            if($nRespuesta==1){
                $claseDiv1 = "respuestaCdivNumber1";
            }else{ 
                if($nRespuesta==count($respuesta)){
                    $claseDiv1 = "respuestaCdivNumberF";
                }else{
                    $claseDiv1 = "";
                }
            }

            $rand1 = rand(100,900);
            $rand2 = rand(100,900);
            if(!empty($respuesta)){
                $nombre = $conn->consultar("SELECT `Nombres`,`Apellidos` FROM `usuario` WHERE `usuario`.`Id_usuario` = ".$respu["Id_usuarioC"].";");
                $nombreCO = $conn->consultar("SELECT * FROM `comentarios` WHERE `comentarios`.`Id_comentario` = ".$respu["ComentarioR"].";");
                $nombreCO2 = $conn->consultar("SELECT `Nombres`,`Apellidos` FROM `usuario` WHERE `usuario`.`Id_usuario` = ".$nombreCO[0]["Id_usuarioC"].";");

                $htmlRespuestas .=
                "<div class='barrita'></div>
                <div class='respuestaCdiv respuestaCdiv".$nRespuesta.$rand1.$rand2."' id='$claseDiv1'>
                    <span class='nombreR nombreR".$nRespuesta.$rand1.$rand2."'>".$nombre[0]['Nombres']." ".$nombre[0]['Apellidos']."  <span class='enRSpan'>En respuesta a <span>".$nombreCO2[0]['Nombres']." ".$nombreCO2[0]['Apellidos']."</span></span></span>
                    <span class='contenidoR contenidoR".$nRespuesta.$rand1.$rand2."'>".$respu['Contenido']."</span>
                    <div class='divBTNRes divBTNRes".$nRespuesta.$rand1.$rand2."'>
                        <button class='btnResponder btnResponder".$nRespuesta.$rand1.$rand2."' onclick='mostrarCResponder(`divResponder".$nRespuesta.$rand1.$rand2."`)'>Responder</button>
                        <button class='btnMres btnMres".$nRespuesta.$rand1.$rand2."' onclick='mostrarRespuestas(`btnMres".$nRespuesta.$rand1.$rand2."`, `respuDiv".$nRespuesta.$rand1.$rand2."`, ".$respu['Id_comentario'].")'>Mostrar Respuestas</button>
                    </div>
                    <div class='divResponder divResponder".$nRespuesta.$rand1.$rand2."'>
                        <span class='spanResponderas'>Responderás a ".$nombre[0]['Nombres']." ".$nombre[0]['Apellidos']."</span>
                        <textarea name='' id='textARespuesta".$nRespuesta.$rand1.$rand2."' class='textARespuesta' cols='10' rows='5' oninput='desbloqBtnEnviar(`textARespuesta".$nRespuesta.$rand1.$rand2."`, `btnEnviarR".$nRespuesta.$rand1.$rand2."`)'></textarea>
                        <div class='contentBtnEyCR'>
                            <button class='btnEnviarRes btnEnviarR".$nRespuesta.$rand1.$rand2."' onclick='enviarRespuesta(`textARespuesta".$nRespuesta.$rand1.$rand2."`, ".$respu['Id_comentario'].", ".$_SESSION['iniciado'].", ".$respu['Id_productoC'].", `respuDiv".$nRespuesta.$rand1.$rand2."`, `btnEnviarR".$nRespuesta.$rand1.$rand2."`)' disabled>Enviar Respuesta</button>
                            <button class='btnCancelarERes btnCancelarER".$nRespuesta.$rand1.$rand2."' onclick='cerrarCresponder(`divResponder".$nRespuesta.$rand1.$rand2."`)'>Cancelar</button>
                        </div>
                    </div>
                    <div class='respuDiv respuDiv".$nRespuesta.$rand1.$rand2."'>
                    </div>
                </div>";
            }else{

                if(empty($respuesta)){
                    $htmlRespuestas .= "<div>Aún no hay Respuestas</div>";
                }

            }
            $nRespuesta += 1;
        }

        echo json_encode($htmlRespuestas, JSON_UNESCAPED_UNICODE);

    }


    if(isset($_POST["IdPdt"])){

        $SQL = $_POST["sqlActuPdt"];
        $id = $_POST["IdPdt"];

        $conn = new conexion("kuitmine");

        $resultado = $conn->ejecutar($SQL);

        $resultado2 = $conn->consultar("SELECT * FROM `kuitmine`.`producto` INNER JOIN `kuitmine`.`productoDetail` ON `kuitmine`.`producto`.`Id_productoDetail` = `kuitmine`.`productoDetail`.`Id_productoDetail` WHERE `kuitmine`.`producto`.`Id_producto` =".$id.";");

        echo json_encode($resultado2, JSON_UNESCAPED_UNICODE);

    }


    if(isset($_POST["idCancel"])){

        $conn = new conexion("kuitmine");
        $idCancel = $_POST["idCancel"];

        $resultado2Cancel = $conn->consultar("SELECT * FROM `kuitmine`.`producto` INNER JOIN `kuitmine`.`productoDetail` ON `kuitmine`.`producto`.`Id_productoDetail` = `kuitmine`.`productoDetail`.`Id_productoDetail` WHERE `kuitmine`.`producto`.`Id_producto` =".$idCancel.";");

        echo json_encode($resultado2Cancel, JSON_UNESCAPED_UNICODE);

    }


    if(isset($_POST["sqlIntRespuesta"])){

        $respuesta = $_POST["sqlIntRespuesta"];
        $idComentario = $_POST["idComentario1"];
        $htmlRespuestasNew = "";
        $nRespuesta = 1;

        $conn = new conexion("kuitmine");

        $resultado = $conn->ejecutar($respuesta);

        $resultado2 = $conn->consultar("SELECT `RespuestasCant` FROM `comentarios` WHERE `comentarios`.`Id_comentario` = ".$idComentario);
        $resultado2 = $resultado2[0]["RespuestasCant"]+1;
        $resultado3 = $conn->ejecutar("UPDATE `comentarios` SET `RespuestasCant` = ".$resultado2." WHERE `comentarios`.`Id_comentario` = ".$idComentario);


        $resultado4 = $conn->consultar("SELECT * FROM `comentarios` WHERE `comentarios`.`ComentarioR` = ".$idComentario);

        $claseDiv1 = "";

        foreach($resultado4 as $resu4){

            if($nRespuesta==1){
                $claseDiv1 = "respuestaCdivNumber1";
            }else{ 
                if($nRespuesta==count($resultado4)){
                    $claseDiv1 = "respuestaCdivNumberF";
                }else{
                    $claseDiv1 = "";
                }
            }

            $nombre = $conn->consultar("SELECT `Nombres`,`Apellidos` FROM `usuario` WHERE `usuario`.`Id_usuario` = ".$resu4["Id_usuarioC"].";");
            $nombreCO = $conn->consultar("SELECT * FROM `comentarios` WHERE `comentarios`.`Id_comentario` = ".$resu4["ComentarioR"].";");
            $nombreCO2 = $conn->consultar("SELECT `Nombres`,`Apellidos` FROM `usuario` WHERE `usuario`.`Id_usuario` = ".$nombreCO[0]["Id_usuarioC"].";");

            $rand1 = rand(100,900);
            $rand2 = rand(100,900);

            if(count($resultado4)>0){

                $htmlRespuestasNew .=
                "<div class='barrita'></div>
                <div class='respuestaCdiv respuestaCdiv".$nRespuesta.$rand1.$rand2."' id='$claseDiv1'>
                    <span class='nombreR nombreR".$nRespuesta.$rand1.$rand2."'>".$nombre[0]['Nombres']." ".$nombre[0]['Apellidos']."  <span class='enRSpan'>En respuesta a <span>".$nombreCO2[0]['Nombres']." ".$nombreCO2[0]['Apellidos']."</span></span></span>
                    <span class='contenidoR contenidoR".$nRespuesta.$rand1.$rand2."'>".$resu4['Contenido']."</span>
                    <div class='divBTNRes divBTNRes".$nRespuesta.$rand1.$rand2."'>
                        <button class='btnResponder btnResponder".$nRespuesta.$rand1.$rand2."' onclick='mostrarCResponder(`divResponder".$nRespuesta.$rand1.$rand2."`)'>Responder</button>
                        <button class='btnMres btnMres".$nRespuesta.$rand1.$rand2."' onclick='mostrarRespuestas(`btnMres".$nRespuesta.$rand1.$rand2."`, `respuDiv".$nRespuesta.$rand1.$rand2."`, ".$resu4['Id_comentario'].")'>Mostrar Respuestas</button>
                    </div>
                    <div class='divResponder divResponder".$nRespuesta.$rand1.$rand2."'>
                        <span class='spanResponderas'>Responderás a ".$nombre[0]['Nombres']." ".$nombre[0]['Apellidos']."</span>
                        <textarea name='' id='textARespuesta".$nRespuesta.$rand1.$rand2."' class='textARespuesta' cols='10' rows='5' oninput='desbloqBtnEnviar(`textARespuesta".$nRespuesta.$rand1.$rand2."`, `btnEnviarR".$nRespuesta.$rand1.$rand2."`)'></textarea>
                        <div class='contentBtnEyCR'>
                            <button class='btnEnviarRes btnEnviarR".$nRespuesta.$rand1.$rand2."' onclick='enviarRespuesta(`textARespuesta".$nRespuesta.$rand1.$rand2."`, ".$resu4['Id_comentario'].", ".$_SESSION['iniciado'].", ".$resu4['Id_productoC'].", `respuDiv".$nRespuesta.$rand1.$rand2."`, `btnEnviarR".$nRespuesta.$rand1.$rand2."`)' disabled>Enviar Respuesta</button>
                            <button class='btnCancelarERes btnCancelarER".$nRespuesta.$rand1.$rand2."' onclick='cerrarCresponder(`divResponder".$nRespuesta.$rand1.$rand2."`)'>Cancelar</button>
                        </div>
                    </div>
                    <div class='respuDiv respuDiv".$nRespuesta.$rand1.$rand2."'>
                    </div>
                </div>";

            }else{

                $htmlRespuestasNew .= "<div>Aún no hay Respuestas</div>";

            }

            $nRespuesta += 1;

        }

        echo json_encode($htmlRespuestasNew, JSON_UNESCAPED_UNICODE);

    }


    if(isset($_POST["sqlInNewP"])){

        $htmlInRespu = "";

        $conn = new conexion("kuitmine");

        $sqlInRespu = $_POST["sqlInNewP"];
        $sqlIdRetorno = $_POST["idComentarioP"];

        $ultimaPreguntaIN = $conn->ejecutar($sqlInRespu);

        $sqlNewPreguntas = $conn->consultar("SELECT * FROM `comentarios` WHERE `comentarios`.`Tipo` = 'Respuesta' AND `comentarios`.`ComentarioR` = ".$sqlIdRetorno." ORDER BY `comentarios`.`Id_comentario` DESC");
        $sqlNumeroPregun = $conn->consultar("SELECT `RespuestasCant` FROM `comentarios` WHERE `comentarios`.`Id_comentario` = ".$sqlIdRetorno);
        $sqlNumeroPregun2 = $sqlNumeroPregun[0]["RespuestasCant"]+1;
        $sqlNumPreguntas3 = $conn->ejecutar("UPDATE `comentarios` SET `RespuestasCant` = ".$sqlNumeroPregun2." WHERE `comentarios`.`Id_comentario` = ".$sqlIdRetorno);

        foreach($sqlNewPreguntas as $respu){
            
            if(!empty($sqlNewPreguntas)){
                $nombre = $conn->consultar("SELECT `Nombres`,`Apellidos` FROM `usuario` WHERE `usuario`.`Id_usuario` = ".$respu["Id_usuarioC"].";");
                $nombreCO = $conn->consultar("SELECT * FROM `comentarios` WHERE `comentarios`.`Id_comentario` = ".$respu["ComentarioR"].";");
                $nombreCO2 = $conn->consultar("SELECT `Nombres`,`Apellidos` FROM `usuario` WHERE `usuario`.`Id_usuario` = ".$nombreCO[0]["Id_usuarioC"].";");

                $htmlInRespu .="<div class='respuestaCdiv'>
                    <span class='nombreR'>".$nombre[0]["Nombres"]." ".$nombre[0]["Apellidos"]."  <span class='enRSpan'>En respuesta a <span>".$nombreCO2[0]["Nombres"]." ".$nombreCO2[0]["Apellidos"]."</span></span></span>
                    <span class='contenidoR'>".$respu['Contenido']."</span>
                    <div class='divBTNRes'><button class='btnResponder'>Responder</button><button class='btnMres'>Mostrar Respuestas</button></div>
                </div>";
            }else{
                if(empty($sqlNewPreguntas)){
                    $htmlInRespu .= "<div>Aún no hay Respuestas</div>";
                    break;
                }
            }

        }

        echo json_encode($htmlInRespu, JSON_UNESCAPED_UNICODE);

    }

?>