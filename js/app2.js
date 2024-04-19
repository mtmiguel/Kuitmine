


//<-- User.php INICIO -->

    if(document.querySelector("#UserHTML")!==null){


        function actualizarDatos(inputs){

            const inputsActu = document.querySelectorAll("."+inputs);

            let datos = [8];

            let formActuUserInfo = new FormData();

            for(let i=0; i<inputsActu.length; i++){
                datos[i] = inputsActu[i].value;
                
            }

            for(let e=0; e<datos.length; e++){
                let punto = e+1;
                formActuUserInfo.append("datoUActu"+punto, datos[e]);
            }

            fetch("http://localhost/kuitmine/userOD.php", {
                method: "POST",
                body: formActuUserInfo
            }).then(response => response.json())
            .then(data => {
                console.log(data)
                inputsActu[0].value = data[10];
                inputsActu[1].value = data[9];
                inputsActu[2].value = data[15];
                inputsActu[3].value = data[12];
                inputsActu[4].value = data[13];
                inputsActu[5].value = data[11];
                inputsActu[6].value = data[4];
                inputsActu[7].value = data[5];
            }).catch(err => console.log(err));

        }


        function functionCancelActu(inputs3, idUser){

            const inpuntCancel = document.querySelectorAll("."+inputs3);

            let formCancelActu = new FormData();

            sqlCancelActu = "SELECT * FROM `kuitmine`.`usuario` INNER JOIN `kuitmine`.`detallesUsuario` ON `kuitmine`.`usuario`.`Id_detallesUsuario` = `kuitmine`.`detallesUsuario`.`Id_detallesUsuario` WHERE `kuitmine`.`usuario`.`Id_usuario` = "+idUser+";";


            formCancelActu.append("sqlCancelActu", sqlCancelActu);

            fetch("http://localhost/kuitmine/userOD.php", {
                method: "POST",
                body: formCancelActu
            }).then(response => response.json())
            .then(data => {
                inpuntCancel[0].value = data[10];
                inpuntCancel[1].value = data[9];
                inpuntCancel[2].value = data[15];
                inpuntCancel[3].value = data[12];
                inpuntCancel[4].value = data[13];
                inpuntCancel[5].value = data[11];
                inpuntCancel[6].value = data[4];
                inpuntCancel[7].value = data[5];
            }).catch(err => console.log(err));

        }


        function desplegarBtnsActu(botonActu, botonC, botonA, inputs, canC, canA, mosI){

            if(document.querySelector("."+botonActu).classList.contains("btnActualizarInfo")){

                document.querySelector("."+botonActu).classList.replace("btnActualizarInfo", "btnActualizarInfo2");
                document.querySelector("."+botonC).classList.replace("btnCancelAntu2", "btnCancelAntu");
                document.querySelector("."+botonA).classList.replace("btnAceptarAntu2", "btnAceptarAntu");
                document.querySelector("."+mosI).style.opacity = "1";
                document.querySelector("."+mosI).style.cursor = "pointer";

                const entradas = document.querySelectorAll("."+inputs);
                const candaC = document.querySelectorAll("."+canC);
                const candaA = document.querySelectorAll("."+canA);

                for(let i=0; i<entradas.length; i++){
                    entradas[i].removeAttribute("disabled")
                }

                for(let e=0; e<candaC.length; e++){
                    candaC[e].style.opacity = "0";
                }

                for(let f=0; f<candaA.length; f++){
                    candaA[f].style.opacity = "1";
                }

            }

        }

        function ocultarBtnsActu(botonActu, botonC, botonA, inputs2, canC, canA, mosI, ocuI, intContra, idUser){

            if(document.querySelector("."+botonC).classList.contains("btnCancelAntu")){

                document.querySelector("."+botonActu).classList.replace("btnActualizarInfo2", "btnActualizarInfo");
                document.querySelector("."+botonC).classList.replace("btnCancelAntu", "btnCancelAntu2");
                document.querySelector("."+botonA).classList.replace("btnAceptarAntu", "btnAceptarAntu2");
                document.querySelector("."+mosI).style.opacity = "0";
                document.querySelector("."+ocuI).style.opacity = "0";
                document.querySelector("."+intContra).removeAttribute("type");
                document.querySelector("."+intContra).setAttribute("type", "password");

                const entradas2 = document.querySelectorAll("."+inputs2);
                const candaC2 = document.querySelectorAll("."+canC);
                const candaA2 = document.querySelectorAll("."+canA);

                for(let i=0; i<entradas2.length; i++){
                    entradas2[i].setAttribute("disabled", "")
                }

                for(let e=0; e<candaC2.length; e++){
                    candaC2[e].style.opacity = "1";
                }

                for(let f=0; f<candaA2.length; f++){
                    candaA2[f].style.opacity = "0";
                }

            }


            functionCancelActu(inputs2, idUser);

        }

        function mostrarContra(btnOcultar, btnMostrar, btnInput){

            if(document.querySelector("."+btnOcultar).style.opacity==0){
                document.querySelector("."+btnMostrar).style.opacity = "0";
                document.querySelector("."+btnMostrar).style.zIndex = "0";
                document.querySelector("."+btnOcultar).style.opacity = "1";
                document.querySelector("."+btnOcultar).style.zIndex = "100";
                document.querySelector("."+btnOcultar).style.cursor = "pointer";
                document.querySelector("."+btnInput).removeAttribute("type");
                document.querySelector("."+btnInput).setAttribute("type", "text");
            }

        }

        function ocultarContra(btnOcultar, btnMostrar, btnInput){

            if(document.querySelector("."+btnMostrar).style.opacity==0){
                document.querySelector("."+btnMostrar).style.opacity = "1";
                document.querySelector("."+btnMostrar).style.zIndex = "100";
                document.querySelector("."+btnOcultar).style.opacity = "0";
                document.querySelector("."+btnOcultar).style.zIndex = "0";
                document.querySelector("."+btnMostrar).style.cursor = "pointer";
                document.querySelector("."+btnInput).removeAttribute("type");
                document.querySelector("."+btnInput).setAttribute("type", "password");
            }

        }

        window.addEventListener("load", ()=>{

            const navBarUl = document.querySelector(".Header_Nav-UL");

            //(Cambio Dinámico) Definiendo el tipo de usuario para cambiar el contenido del UL en la barra de navegación:

                //obtenemos el tipo de usuario de un input oculto con la clase "class1".
                let tipoUser = document.querySelector(".class1User").value;

                //Revisando el dato obtenido:
                if(tipoUser==="#ld45"){
                    navBarUl.innerHTML =
                    `<div class="nav-lisContaint">
                        <li class="liInicio"><a href="productos.php" class="enlace">Productos</a></li>
                        <li><a class="enlace" href="historial.php" >Historial</a></li>
                        <li><a class="enlace" href="lisDeseos.php" >Lista de Deseos</a></li>
                        <li><a class="enlace" href="contacto.php">Contáctanos</li>
                    </div>
                    <div class="iniRegiContain">
                        <a href="user.php" class="enlace user-enlace"><svg class="icon-user svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 329.65 368.26"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M175.57,0c8.45,1.65,17,3.14,24.9,6.61,32.2,14,52.35,38,58.64,72.74,5,27.51-1.54,52.59-18.61,74.68-16.13,20.86-37.49,33.25-63.68,36.52-30.7,3.82-57.56-5.39-79.34-27.09-22.88-22.8-32.39-50.86-27.15-83C76.87,40.34,106,10.28,145.58,1.61,148.38,1,151.2.53,154,0Z"/><path d="M162.65,368.26A186.31,186.31,0,0,1,51.37,331a189.07,189.07,0,0,1-49.46-54,11.15,11.15,0,0,1-.57-11.54q24.6-50.67,79-65.29a121.24,121.24,0,0,1,13.39-2.59c4.81-.73,8.89,1.36,12.68,4a97,97,0,0,0,40.4,16.92c26.47,4.41,51.48.17,73.61-15.29,9.42-6.59,18.47-5.82,28.27-3.29,33.67,8.68,58.77,28.6,76.25,58.41a80.19,80.19,0,0,1,4,8.44,8.09,8.09,0,0,1-.52,7.89c-20.4,33.17-47.66,58.75-83,75.43C219.64,362.28,192.64,368.13,162.65,368.26Z"/></g></g></svg><span>Mi Perfil</span></a>
                        <a href="cerrar.php" class="enlace salir-enlace"><svg class="icon-salir svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 317.07 310.36"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M317.07,109.54a28.93,28.93,0,0,1-7,10q-23.36,23.22-46.6,46.57c-3.13,3.13-6.58,5.66-11.15,6.07-7.12.63-13.1-2.61-16.05-8.66-3-6.25-1.85-13.7,3.41-19.12,6.18-6.36,12.57-12.51,18.83-18.79.76-.76,1.85-1.32,2-2.62-1.19-.66-2.44-.33-3.63-.34q-40.51,0-81,0c-9.54,0-15.91-5.41-17.45-14.6-1.77-10.52,5.72-19.7,16.41-19.75,23.3-.1,46.6,0,69.9,0h16.61c-3.47-3.59-6.56-6.86-9.74-10-3.85-3.88-7.9-7.56-11.63-11.54-7.2-7.68-7.2-17.57-.19-23.93A15.9,15.9,0,0,1,260,42.12a32.66,32.66,0,0,1,3.51,3Q287.25,68.86,311,92.59a22.21,22.21,0,0,1,6.1,9.52Z"/><path d="M62.7,32.29c4.54,2.37,9.08,4.77,13.64,7.11C93.21,48.06,110,56.86,127,65.29c7.86,3.9,11.36,9.91,11.35,18.5q-.09,60.15,0,120.31v3.09c0,4.35,0,4.36,4.24,4.36h30.93c3.09,0,6.19,0,9.28,0,5.28-.1,8-2.75,8-8q.06-28,0-56c0-4.8,0-4.81,4.73-4.81,7.83,0,15.67.09,23.5,0,2.68,0,3.61.81,3.6,3.54-.07,26.9,0,53.81-.07,80.72,0,9.58-6.87,16.37-16.44,16.4q-32.17.1-64.34,0c-3.17,0-4,.93-4,4,.14,17.73.08,35.46.07,53.19,0,8.63-5.72,12.22-13.37,8.27Q67.34,279.27,10.23,249.68c-6.87-3.55-10.19-9-10.18-16.9Q.22,125.14,0,17.51C0,9.06,5.1.49,16.73,0c.82,0,1.65,0,2.47,0q91.86,0,183.72,0a42.88,42.88,0,0,1,5.54.4c8,1,13.91,7.06,14,15.14.22,17.22.07,34.44.11,51.65,0,1.92-.7,2.86-2.7,2.85-8.77,0-17.53,0-26.29,0-2.5,0-2.83-1.4-2.83-3.39q.06-12.84,0-25.67c0-6.57-2.64-9.24-9.11-9.24q-58.45,0-116.91,0H62.9Z"/></g></g></svg><span>Salir</span></a>
                    </div>`;
                }else{

                    if(tipoUser==="#ad64"){

                        navBarUl.innerHTML =
                        `<div class="nav-lisContaint">
                            <li class="liInicio"><a href="productos.php" class="enlace">Productos</a></li>
                            <li><a class="enlace" href="historial.php" >Historial</a></li>
                            <li><a class="enlace" href="lisDeseos.php" >Lista de Deseos</a></li>
                            <li><a class="enlace" href="contacto.php">Contáctanos</li>
                        </div>
                        <div class="iniRegiContain">
                            <a href="user.php" class="enlace user-enlace"><svg class="icon-user svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 329.65 368.26"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M175.57,0c8.45,1.65,17,3.14,24.9,6.61,32.2,14,52.35,38,58.64,72.74,5,27.51-1.54,52.59-18.61,74.68-16.13,20.86-37.49,33.25-63.68,36.52-30.7,3.82-57.56-5.39-79.34-27.09-22.88-22.8-32.39-50.86-27.15-83C76.87,40.34,106,10.28,145.58,1.61,148.38,1,151.2.53,154,0Z"/><path d="M162.65,368.26A186.31,186.31,0,0,1,51.37,331a189.07,189.07,0,0,1-49.46-54,11.15,11.15,0,0,1-.57-11.54q24.6-50.67,79-65.29a121.24,121.24,0,0,1,13.39-2.59c4.81-.73,8.89,1.36,12.68,4a97,97,0,0,0,40.4,16.92c26.47,4.41,51.48.17,73.61-15.29,9.42-6.59,18.47-5.82,28.27-3.29,33.67,8.68,58.77,28.6,76.25,58.41a80.19,80.19,0,0,1,4,8.44,8.09,8.09,0,0,1-.52,7.89c-20.4,33.17-47.66,58.75-83,75.43C219.64,362.28,192.64,368.13,162.65,368.26Z"/></g></g></svg><span>Mi Perfil</span></a>
                            <a href="cerrar.php" class="enlace salir-enlace"><svg class="icon-salir svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 317.07 310.36"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M317.07,109.54a28.93,28.93,0,0,1-7,10q-23.36,23.22-46.6,46.57c-3.13,3.13-6.58,5.66-11.15,6.07-7.12.63-13.1-2.61-16.05-8.66-3-6.25-1.85-13.7,3.41-19.12,6.18-6.36,12.57-12.51,18.83-18.79.76-.76,1.85-1.32,2-2.62-1.19-.66-2.44-.33-3.63-.34q-40.51,0-81,0c-9.54,0-15.91-5.41-17.45-14.6-1.77-10.52,5.72-19.7,16.41-19.75,23.3-.1,46.6,0,69.9,0h16.61c-3.47-3.59-6.56-6.86-9.74-10-3.85-3.88-7.9-7.56-11.63-11.54-7.2-7.68-7.2-17.57-.19-23.93A15.9,15.9,0,0,1,260,42.12a32.66,32.66,0,0,1,3.51,3Q287.25,68.86,311,92.59a22.21,22.21,0,0,1,6.1,9.52Z"/><path d="M62.7,32.29c4.54,2.37,9.08,4.77,13.64,7.11C93.21,48.06,110,56.86,127,65.29c7.86,3.9,11.36,9.91,11.35,18.5q-.09,60.15,0,120.31v3.09c0,4.35,0,4.36,4.24,4.36h30.93c3.09,0,6.19,0,9.28,0,5.28-.1,8-2.75,8-8q.06-28,0-56c0-4.8,0-4.81,4.73-4.81,7.83,0,15.67.09,23.5,0,2.68,0,3.61.81,3.6,3.54-.07,26.9,0,53.81-.07,80.72,0,9.58-6.87,16.37-16.44,16.4q-32.17.1-64.34,0c-3.17,0-4,.93-4,4,.14,17.73.08,35.46.07,53.19,0,8.63-5.72,12.22-13.37,8.27Q67.34,279.27,10.23,249.68c-6.87-3.55-10.19-9-10.18-16.9Q.22,125.14,0,17.51C0,9.06,5.1.49,16.73,0c.82,0,1.65,0,2.47,0q91.86,0,183.72,0a42.88,42.88,0,0,1,5.54.4c8,1,13.91,7.06,14,15.14.22,17.22.07,34.44.11,51.65,0,1.92-.7,2.86-2.7,2.85-8.77,0-17.53,0-26.29,0-2.5,0-2.83-1.4-2.83-3.39q.06-12.84,0-25.67c0-6.57-2.64-9.24-9.11-9.24q-58.45,0-116.91,0H62.9Z"/></g></g></svg><span>Salir</span></a>
                        </div>`;

                    }else{
                        
                        if(tipoUser==="neutral"){

                            navBarUl.innerHTML =
                            `<div class="nav-lisContaint">
                                <li class="liInicio"><a href="productos.php" class="enlace">Productos</a></li>
                                <li><a class="enlace enlaceContactanos" href="contacto.php">Contáctanos</li>
                            </div>
                            <div class="iniRegiContain">
                                <a href="inicioSesion.php" class="enlace user-enlace"><svg class="icon-entrar svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 808.1 803.64"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M471.85,390.9l-189.17-178a15.58,15.58,0,0,0-26.26,11.35V303H15.58A15.59,15.59,0,0,0,0,318.57v166.5a15.59,15.59,0,0,0,15.58,15.58H256.42v78.79a15.58,15.58,0,0,0,26.26,11.35l189.17-178A15,15,0,0,0,471.85,390.9Z"/><path d="M577.24,803.64H778.1a30,30,0,0,0,30-30V723.15ZM778.1,0H577.24L808.1,80.49V30A30,30,0,0,0,778.1,0Z"/><path d="M530.88,803.64H285.24a30,30,0,0,1-30-30V610.82a35.44,35.44,0,0,0,41.15-5.47l55.23-52V707.26h165v68.23A35,35,0,0,0,530.88,803.64Z"/><path d="M272.1,188.59a35.51,35.51,0,0,0-16.86,4.23V30a30,30,0,0,1,30-30H530.88a35,35,0,0,0-14.21,28.15V96.38h-165V250.27l-55.23-52A35.35,35.35,0,0,0,272.1,188.59Z"/><path d="M558.25,9.27a20,20,0,0,0-26.58,18.88V775.49a20,20,0,0,0,26.58,18.88L808.1,707.26V96.38ZM768.1,678.84,711.72,698.5l-25.13,8.76L571.67,747.33v-691L686.61,96.38l25.11,8.75,56.38,19.66Z"/><path d="M639.67,396c0,28.05-11.23,50.79-25.07,50.79S589.53,424.08,589.53,396s11.22-50.78,25.07-50.78S639.67,368,639.67,396Z"/></g></g></svg><span>Iniciar Sesión</span></a>
                                <a href="registro.php" class="enlace salir-enlace"><svg class="icon-regis svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 663.43 720.94"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M190.29,720.94l.11-.16a.43.43,0,0,0,0,.16Z"/><path d="M540,720.94h-.11a.43.43,0,0,0,0-.16Z"/><path d="M453.21,200.36c0,17-5.56,32.9-15.66,44.69-9.19,10.73-21.08,16.63-33.45,16.63s-24.27-5.9-33.46-16.63C360.54,233.26,355,217.39,355,200.36s5.56-32.91,15.66-44.69C379.83,144.94,391.72,139,404.1,139s24.26,5.91,33.45,16.64C447.65,167.45,453.21,183.32,453.21,200.36Z"/><path d="M404.1,91C350.46,91,307,140,307,200.36s43.48,109.32,97.12,109.32,97.11-48.94,97.11-109.32S457.73,91,404.1,91Zm0,194.65c-40.32,0-73.12-38.27-73.12-85.32S363.78,115,404.1,115s73.11,38.28,73.11,85.33S444.41,285.68,404.1,285.68Z"/><path d="M453.21,200.36c0,17-5.56,32.9-15.66,44.69-9.19,10.73-21.08,16.63-33.45,16.63s-24.27-5.9-33.46-16.63C360.54,233.26,355,217.39,355,200.36s5.56-32.91,15.66-44.69C379.83,144.94,391.72,139,404.1,139s24.26,5.91,33.45,16.64C447.65,167.45,453.21,183.32,453.21,200.36Z"/><path d="M453.21,200.36c0,17-5.56,32.9-15.66,44.69-9.19,10.73-21.08,16.63-33.45,16.63s-24.27-5.9-33.46-16.63C360.54,233.26,355,217.39,355,200.36s5.56-32.91,15.66-44.69C379.83,144.94,391.72,139,404.1,139s24.26,5.91,33.45,16.64C447.65,167.45,453.21,183.32,453.21,200.36Z"/><path d="M484.66,422.72c19.54,27.58,32.73,63,38.08,101.68H285.45c5.35-38.66,18.54-74.1,38.07-101.68C346.26,390.63,374.87,373,404.09,373S461.93,390.63,484.66,422.72Z"/><path d="M404.09,325C310.57,325,234.76,432,234.76,564c0,2.76,0,5.5.11,8.23a.43.43,0,0,0,0,.16H573.32a.43.43,0,0,0,0-.16c.08-2.73.11-5.47.11-8.23C573.43,432,497.62,325,404.09,325ZM259.14,548.4c2.58-53,18.25-102.08,44.8-139.56C331.3,370.22,366.86,349,404.09,349s72.8,21.27,100.16,59.89c26.55,37.48,42.22,86.56,44.8,139.56Z"/><path d="M522.74,524.4H285.45c5.35-38.66,18.54-74.1,38.07-101.68C346.26,390.63,374.87,373,404.09,373s57.84,17.68,80.57,49.77C504.2,450.3,517.39,485.74,522.74,524.4Z"/><path d="M522.74,524.4H285.45c5.35-38.66,18.54-74.1,38.07-101.68C346.26,390.63,374.87,373,404.09,373s57.84,17.68,80.57,49.77C504.2,450.3,517.39,485.74,522.74,524.4Z"/><path d="M613.43,0H50A50,50,0,0,0,0,50V613.43a50,50,0,0,0,50,50H613.43a50,50,0,0,0,50-50V50A50,50,0,0,0,613.43,0ZM596.74,606.74h-530a10,10,0,0,1-10-10v-530a10,10,0,0,1,10-10H596.74a10,10,0,0,1,10,10V596.74A10,10,0,0,1,596.74,606.74Z"/><polygon points="253.52 304.66 199.41 304.66 199.41 250.55 145.3 250.55 145.3 304.66 91.19 304.66 91.19 358.77 145.3 358.77 145.3 412.88 199.41 412.88 199.41 358.77 253.52 358.77 253.52 304.66"/></g></g></svg><span>Registrarse</span></a>
                            </div>`;
                        }

                    }
                    
                }

            
            //-----------------------------------------------------------------------------------------------

           

        });

    }

//<-- User.php FIN -->



//<-- Contacto.php INICIO -->

    if(document.querySelector("#ContactoHTML")!==null){

        //Tomando elementos del DOM

            const navBarUl = document.querySelector(".Header_Nav-UL");
    
        //-----------------------------------------------------------------------------------------

        window.addEventListener("load", ()=>{

            //(Cambio Dinámico) Definiendo el tipo de usuario para cambiar el contenido del UL en la barra de navegación:

                //obtenemos el tipo de usuario de un input oculto con la clase "class1".
                let tipoUser = document.querySelector(".class1Contacto").value;

                //Revisando el dato obtenido:
                if(tipoUser==="#ld45"){
                    navBarUl.innerHTML =
                    `<div class="nav-lisContaint">
                        <li class="liInicio"><a href="productos.php" class="enlace">Productos</a></li>
                        <li><a class="enlace" href="historial.php" >Historial</a></li>
                        <li><a class="enlace" href="lisDeseos.php" >Lista de Deseos</a></li>
                        <li><a class="enlace" href="contacto.php">Contáctanos</li>
                    </div>
                    <div class="iniRegiContain">
                        <a href="user.php" class="enlace user-enlace"><svg class="icon-user svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 329.65 368.26"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M175.57,0c8.45,1.65,17,3.14,24.9,6.61,32.2,14,52.35,38,58.64,72.74,5,27.51-1.54,52.59-18.61,74.68-16.13,20.86-37.49,33.25-63.68,36.52-30.7,3.82-57.56-5.39-79.34-27.09-22.88-22.8-32.39-50.86-27.15-83C76.87,40.34,106,10.28,145.58,1.61,148.38,1,151.2.53,154,0Z"/><path d="M162.65,368.26A186.31,186.31,0,0,1,51.37,331a189.07,189.07,0,0,1-49.46-54,11.15,11.15,0,0,1-.57-11.54q24.6-50.67,79-65.29a121.24,121.24,0,0,1,13.39-2.59c4.81-.73,8.89,1.36,12.68,4a97,97,0,0,0,40.4,16.92c26.47,4.41,51.48.17,73.61-15.29,9.42-6.59,18.47-5.82,28.27-3.29,33.67,8.68,58.77,28.6,76.25,58.41a80.19,80.19,0,0,1,4,8.44,8.09,8.09,0,0,1-.52,7.89c-20.4,33.17-47.66,58.75-83,75.43C219.64,362.28,192.64,368.13,162.65,368.26Z"/></g></g></svg><span>Mi Perfil</span></a>
                        <a href="cerrar.php" class="enlace salir-enlace"><svg class="icon-salir svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 317.07 310.36"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M317.07,109.54a28.93,28.93,0,0,1-7,10q-23.36,23.22-46.6,46.57c-3.13,3.13-6.58,5.66-11.15,6.07-7.12.63-13.1-2.61-16.05-8.66-3-6.25-1.85-13.7,3.41-19.12,6.18-6.36,12.57-12.51,18.83-18.79.76-.76,1.85-1.32,2-2.62-1.19-.66-2.44-.33-3.63-.34q-40.51,0-81,0c-9.54,0-15.91-5.41-17.45-14.6-1.77-10.52,5.72-19.7,16.41-19.75,23.3-.1,46.6,0,69.9,0h16.61c-3.47-3.59-6.56-6.86-9.74-10-3.85-3.88-7.9-7.56-11.63-11.54-7.2-7.68-7.2-17.57-.19-23.93A15.9,15.9,0,0,1,260,42.12a32.66,32.66,0,0,1,3.51,3Q287.25,68.86,311,92.59a22.21,22.21,0,0,1,6.1,9.52Z"/><path d="M62.7,32.29c4.54,2.37,9.08,4.77,13.64,7.11C93.21,48.06,110,56.86,127,65.29c7.86,3.9,11.36,9.91,11.35,18.5q-.09,60.15,0,120.31v3.09c0,4.35,0,4.36,4.24,4.36h30.93c3.09,0,6.19,0,9.28,0,5.28-.1,8-2.75,8-8q.06-28,0-56c0-4.8,0-4.81,4.73-4.81,7.83,0,15.67.09,23.5,0,2.68,0,3.61.81,3.6,3.54-.07,26.9,0,53.81-.07,80.72,0,9.58-6.87,16.37-16.44,16.4q-32.17.1-64.34,0c-3.17,0-4,.93-4,4,.14,17.73.08,35.46.07,53.19,0,8.63-5.72,12.22-13.37,8.27Q67.34,279.27,10.23,249.68c-6.87-3.55-10.19-9-10.18-16.9Q.22,125.14,0,17.51C0,9.06,5.1.49,16.73,0c.82,0,1.65,0,2.47,0q91.86,0,183.72,0a42.88,42.88,0,0,1,5.54.4c8,1,13.91,7.06,14,15.14.22,17.22.07,34.44.11,51.65,0,1.92-.7,2.86-2.7,2.85-8.77,0-17.53,0-26.29,0-2.5,0-2.83-1.4-2.83-3.39q.06-12.84,0-25.67c0-6.57-2.64-9.24-9.11-9.24q-58.45,0-116.91,0H62.9Z"/></g></g></svg><span>Salir</span></a>
                    </div>`;
                }else{

                    if(tipoUser==="#ad64"){

                        navBarUl.innerHTML =
                        `<div class="nav-lisContaint">
                            <li class="liInicio"><a href="productos.php" class="enlace">Productos</a></li>
                            <li><a class="enlace" href="historial.php" >Historial</a></li>
                            <li><a class="enlace" href="lisDeseos.php" >Lista de Deseos</a></li>
                            <li><a class="enlace" href="contacto.php">Contáctanos</li>
                        </div>
                        <div class="iniRegiContain">
                            <a href="user.php" class="enlace user-enlace"><svg class="icon-user svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 329.65 368.26"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M175.57,0c8.45,1.65,17,3.14,24.9,6.61,32.2,14,52.35,38,58.64,72.74,5,27.51-1.54,52.59-18.61,74.68-16.13,20.86-37.49,33.25-63.68,36.52-30.7,3.82-57.56-5.39-79.34-27.09-22.88-22.8-32.39-50.86-27.15-83C76.87,40.34,106,10.28,145.58,1.61,148.38,1,151.2.53,154,0Z"/><path d="M162.65,368.26A186.31,186.31,0,0,1,51.37,331a189.07,189.07,0,0,1-49.46-54,11.15,11.15,0,0,1-.57-11.54q24.6-50.67,79-65.29a121.24,121.24,0,0,1,13.39-2.59c4.81-.73,8.89,1.36,12.68,4a97,97,0,0,0,40.4,16.92c26.47,4.41,51.48.17,73.61-15.29,9.42-6.59,18.47-5.82,28.27-3.29,33.67,8.68,58.77,28.6,76.25,58.41a80.19,80.19,0,0,1,4,8.44,8.09,8.09,0,0,1-.52,7.89c-20.4,33.17-47.66,58.75-83,75.43C219.64,362.28,192.64,368.13,162.65,368.26Z"/></g></g></svg><span>Mi Perfil</span></a>
                            <a href="cerrar.php" class="enlace salir-enlace"><svg class="icon-salir svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 317.07 310.36"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M317.07,109.54a28.93,28.93,0,0,1-7,10q-23.36,23.22-46.6,46.57c-3.13,3.13-6.58,5.66-11.15,6.07-7.12.63-13.1-2.61-16.05-8.66-3-6.25-1.85-13.7,3.41-19.12,6.18-6.36,12.57-12.51,18.83-18.79.76-.76,1.85-1.32,2-2.62-1.19-.66-2.44-.33-3.63-.34q-40.51,0-81,0c-9.54,0-15.91-5.41-17.45-14.6-1.77-10.52,5.72-19.7,16.41-19.75,23.3-.1,46.6,0,69.9,0h16.61c-3.47-3.59-6.56-6.86-9.74-10-3.85-3.88-7.9-7.56-11.63-11.54-7.2-7.68-7.2-17.57-.19-23.93A15.9,15.9,0,0,1,260,42.12a32.66,32.66,0,0,1,3.51,3Q287.25,68.86,311,92.59a22.21,22.21,0,0,1,6.1,9.52Z"/><path d="M62.7,32.29c4.54,2.37,9.08,4.77,13.64,7.11C93.21,48.06,110,56.86,127,65.29c7.86,3.9,11.36,9.91,11.35,18.5q-.09,60.15,0,120.31v3.09c0,4.35,0,4.36,4.24,4.36h30.93c3.09,0,6.19,0,9.28,0,5.28-.1,8-2.75,8-8q.06-28,0-56c0-4.8,0-4.81,4.73-4.81,7.83,0,15.67.09,23.5,0,2.68,0,3.61.81,3.6,3.54-.07,26.9,0,53.81-.07,80.72,0,9.58-6.87,16.37-16.44,16.4q-32.17.1-64.34,0c-3.17,0-4,.93-4,4,.14,17.73.08,35.46.07,53.19,0,8.63-5.72,12.22-13.37,8.27Q67.34,279.27,10.23,249.68c-6.87-3.55-10.19-9-10.18-16.9Q.22,125.14,0,17.51C0,9.06,5.1.49,16.73,0c.82,0,1.65,0,2.47,0q91.86,0,183.72,0a42.88,42.88,0,0,1,5.54.4c8,1,13.91,7.06,14,15.14.22,17.22.07,34.44.11,51.65,0,1.92-.7,2.86-2.7,2.85-8.77,0-17.53,0-26.29,0-2.5,0-2.83-1.4-2.83-3.39q.06-12.84,0-25.67c0-6.57-2.64-9.24-9.11-9.24q-58.45,0-116.91,0H62.9Z"/></g></g></svg><span>Salir</span></a>
                        </div>`;
                        

                    }else{
                        
                        if(tipoUser==="neutral"){

                            navBarUl.innerHTML =
                            `<div class="nav-lisContaint">
                                <li class="liInicio"><a href="productos.php" class="enlace">Productos</a></li>
                                <li><a class="enlace enlaceContactanos" href="contacto.php">Contáctanos</li>
                            </div>
                            <div class="iniRegiContain">
                                <a href="inicioSesion.php" class="enlace user-enlace"><svg class="icon-entrar svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 808.1 803.64"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M471.85,390.9l-189.17-178a15.58,15.58,0,0,0-26.26,11.35V303H15.58A15.59,15.59,0,0,0,0,318.57v166.5a15.59,15.59,0,0,0,15.58,15.58H256.42v78.79a15.58,15.58,0,0,0,26.26,11.35l189.17-178A15,15,0,0,0,471.85,390.9Z"/><path d="M577.24,803.64H778.1a30,30,0,0,0,30-30V723.15ZM778.1,0H577.24L808.1,80.49V30A30,30,0,0,0,778.1,0Z"/><path d="M530.88,803.64H285.24a30,30,0,0,1-30-30V610.82a35.44,35.44,0,0,0,41.15-5.47l55.23-52V707.26h165v68.23A35,35,0,0,0,530.88,803.64Z"/><path d="M272.1,188.59a35.51,35.51,0,0,0-16.86,4.23V30a30,30,0,0,1,30-30H530.88a35,35,0,0,0-14.21,28.15V96.38h-165V250.27l-55.23-52A35.35,35.35,0,0,0,272.1,188.59Z"/><path d="M558.25,9.27a20,20,0,0,0-26.58,18.88V775.49a20,20,0,0,0,26.58,18.88L808.1,707.26V96.38ZM768.1,678.84,711.72,698.5l-25.13,8.76L571.67,747.33v-691L686.61,96.38l25.11,8.75,56.38,19.66Z"/><path d="M639.67,396c0,28.05-11.23,50.79-25.07,50.79S589.53,424.08,589.53,396s11.22-50.78,25.07-50.78S639.67,368,639.67,396Z"/></g></g></svg><span>Iniciar Sesión</span></a>
                                <a href="registro.php" class="enlace salir-enlace"><svg class="icon-regis svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 663.43 720.94"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M190.29,720.94l.11-.16a.43.43,0,0,0,0,.16Z"/><path d="M540,720.94h-.11a.43.43,0,0,0,0-.16Z"/><path d="M453.21,200.36c0,17-5.56,32.9-15.66,44.69-9.19,10.73-21.08,16.63-33.45,16.63s-24.27-5.9-33.46-16.63C360.54,233.26,355,217.39,355,200.36s5.56-32.91,15.66-44.69C379.83,144.94,391.72,139,404.1,139s24.26,5.91,33.45,16.64C447.65,167.45,453.21,183.32,453.21,200.36Z"/><path d="M404.1,91C350.46,91,307,140,307,200.36s43.48,109.32,97.12,109.32,97.11-48.94,97.11-109.32S457.73,91,404.1,91Zm0,194.65c-40.32,0-73.12-38.27-73.12-85.32S363.78,115,404.1,115s73.11,38.28,73.11,85.33S444.41,285.68,404.1,285.68Z"/><path d="M453.21,200.36c0,17-5.56,32.9-15.66,44.69-9.19,10.73-21.08,16.63-33.45,16.63s-24.27-5.9-33.46-16.63C360.54,233.26,355,217.39,355,200.36s5.56-32.91,15.66-44.69C379.83,144.94,391.72,139,404.1,139s24.26,5.91,33.45,16.64C447.65,167.45,453.21,183.32,453.21,200.36Z"/><path d="M453.21,200.36c0,17-5.56,32.9-15.66,44.69-9.19,10.73-21.08,16.63-33.45,16.63s-24.27-5.9-33.46-16.63C360.54,233.26,355,217.39,355,200.36s5.56-32.91,15.66-44.69C379.83,144.94,391.72,139,404.1,139s24.26,5.91,33.45,16.64C447.65,167.45,453.21,183.32,453.21,200.36Z"/><path d="M484.66,422.72c19.54,27.58,32.73,63,38.08,101.68H285.45c5.35-38.66,18.54-74.1,38.07-101.68C346.26,390.63,374.87,373,404.09,373S461.93,390.63,484.66,422.72Z"/><path d="M404.09,325C310.57,325,234.76,432,234.76,564c0,2.76,0,5.5.11,8.23a.43.43,0,0,0,0,.16H573.32a.43.43,0,0,0,0-.16c.08-2.73.11-5.47.11-8.23C573.43,432,497.62,325,404.09,325ZM259.14,548.4c2.58-53,18.25-102.08,44.8-139.56C331.3,370.22,366.86,349,404.09,349s72.8,21.27,100.16,59.89c26.55,37.48,42.22,86.56,44.8,139.56Z"/><path d="M522.74,524.4H285.45c5.35-38.66,18.54-74.1,38.07-101.68C346.26,390.63,374.87,373,404.09,373s57.84,17.68,80.57,49.77C504.2,450.3,517.39,485.74,522.74,524.4Z"/><path d="M522.74,524.4H285.45c5.35-38.66,18.54-74.1,38.07-101.68C346.26,390.63,374.87,373,404.09,373s57.84,17.68,80.57,49.77C504.2,450.3,517.39,485.74,522.74,524.4Z"/><path d="M613.43,0H50A50,50,0,0,0,0,50V613.43a50,50,0,0,0,50,50H613.43a50,50,0,0,0,50-50V50A50,50,0,0,0,613.43,0ZM596.74,606.74h-530a10,10,0,0,1-10-10v-530a10,10,0,0,1,10-10H596.74a10,10,0,0,1,10,10V596.74A10,10,0,0,1,596.74,606.74Z"/><polygon points="253.52 304.66 199.41 304.66 199.41 250.55 145.3 250.55 145.3 304.66 91.19 304.66 91.19 358.77 145.3 358.77 145.3 412.88 199.41 412.88 199.41 358.77 253.52 358.77 253.52 304.66"/></g></g></svg><span>Registrarse</span></a>
                            </div>`;
                            
                        }

                    }
                    
                }

            
            //-----------------------------------------------------------------------------------------------

        });

    }

//<-- Contacto.php FIN -->


//<-- productoVista.php INICIO -->


    if(document.querySelector("#productoVistaHTML")!==null){

        
        //<- Contenedor para Reseñas del Producto INICIO ->

            const estrellas = document.querySelectorAll(".star");

            function colorStar(numero){

                if(numero==1){
                    for(let i=0; i<numero; i++){
                        estrellas[i].style.fill = "#ff5151";
                    }
                }else{
                    if(numero==2){
                        for(let i=0; i<numero; i++){
                            estrellas[i].style.fill = "#ff9360";
                        }
                    }else{
                        if(numero==3){
                            for(let i=0; i<numero; i++){
                                estrellas[i].style.fill = "#ffbe5d";
                            }
                        }else{
                            if(numero==4){
                                for(let i=0; i<numero; i++){
                                    estrellas[i].style.fill = "#FFC850";
                                }
                            }else{
                                if(numero==5){
                                    for(let i=0; i<numero; i++){
                                        estrellas[i].style.fill = "#FFC851";
                                    }
                                }
                            }
                        }
                    }
                }

            }

            function quitarColorStar(){
                for(let i=0; i<estrellas.length; i++){
                    estrellas[i].style.fill = "#532f1eaa";
                }
            }

            function marcarEstrella(numero, btn, textA, span1, span2){

                
                document.querySelector(".inputReseña").value = numero;
                document.querySelector(".spanDarasXEstrellas").textContent = "Darás "+numero+" Estrellas a este Producto";

                for(let e=0; e<estrellas.length; e++){
                    estrellas[e].removeAttribute("onmouseover");
                    estrellas[e].removeAttribute("onmouseleave");
                }

                if(numero==1){
                    for(let i=0; i<estrellas.length; i++){
                        estrellas[i].style.fill = "#532f1eaa";
                    }
                    for(let i=0; i<numero; i++){
                        estrellas[i].style.fill = "#ff5151";
                    }
                    document.querySelector(".spanDarasXEstrellas").style.color = "#ff8282";
                    document.querySelector(".spanDarasXEstrellas").textContent = "Darás "+numero+" Estrella a este Producto";

                }else{
                    if(numero==2){
                        for(let i=0; i<estrellas.length; i++){
                            estrellas[i].style.fill = "#532f1eaa";
                        }
                        for(let i=0; i<numero; i++){
                            estrellas[i].style.fill = "#ff9360";
                        }
                        document.querySelector(".spanDarasXEstrellas").style.color = "#ff9360";
                    }else{
                        if(numero==3){
                            for(let i=0; i<estrellas.length; i++){
                                estrellas[i].style.fill = "#532f1eaa";
                            }
                            for(let i=0; i<numero; i++){
                                estrellas[i].style.fill = "#ffbe5d";
                            }
                            document.querySelector(".spanDarasXEstrellas").style.color = "#ffbe5d";
                        }else{
                            if(numero==4){
                                for(let i=0; i<estrellas.length; i++){
                                    estrellas[i].style.fill = "#532f1eaa";
                                }
                                for(let i=0; i<numero; i++){
                                    estrellas[i].style.fill = "#FFC850";
                                }
                                document.querySelector(".spanDarasXEstrellas").style.color = "#FFC850";
                            }else{
                                if(numero==5){
                                    for(let i=0; i<estrellas.length; i++){
                                        estrellas[i].style.fill = "#532f1eaa";
                                    }
                                    for(let i=0; i<numero; i++){
                                        estrellas[i].style.fill = "#FFC851";
                                    }
                                    document.querySelector(".spanDarasXEstrellas").style.color = "#FFC851";
                                }
                            }
                        }
                    }
                }

                verifTAReseña(textA, btn, span2, span1);

            }

            function subirReseñaFuncion(divRese, contenidoRese, btnERese, estrellasRese, idProducto, idUserLogueado){

                let contenido = document.querySelector("."+contenidoRese).value;
                let estrellas = document.querySelector("."+estrellasRese).value;

                let formNewReseña = new FormData();

                formNewReseña.append("contenidoRese", contenido);
                formNewReseña.append("estrellasRese", estrellas);
                formNewReseña.append("btnEnviarRese", btnERese);
                formNewReseña.append("divConteinRese", divRese);
                formNewReseña.append("idProductoRese", idProducto);
                formNewReseña.append("idUserRese", idUserLogueado);

                fetch("http://localhost/kuitmine/productoVistaOR.php", {
                method: "POST",
                body: formNewReseña
                }).then(response => response.json())
                .then(data => {
                    document.querySelector(".div1").innerHTML = data[0]
                    document.querySelector(".div2").innerHTML = data[1]
                    document.querySelector(".div31").innerHTML = data[2]
                    document.querySelector("."+contenidoRese).value="";
                    document.querySelector("."+btnERese).setAttribute("disabled", "");
                    document.querySelector("."+btnERese).classList.replace("btnSubirReseña", "btnSubirReseña2");
                }).catch(err => console.log(err));

            }

            function verifTAReseña(textA, btnERese, spanD, spanC){

                document.querySelector("."+spanD).textContent = document.querySelector("."+textA).value.length;

              
                if(document.querySelector("."+textA).value.length > 0 && document.querySelector("."+textA).value.length <= 200 && document.querySelector(".inputReseña").value!=""){

                    document.querySelector("."+btnERese).classList.replace("btnSubirReseña2", "btnSubirReseña");
                    document.querySelector("."+btnERese).removeAttribute("disabled");
                    document.querySelector("."+spanD).style.color = "#532f1e";
                    document.querySelector("."+spanC).style.color = "#532f1e";

                }else{

                    if(document.querySelector("."+textA).value.length == 0){

                        document.querySelector("."+btnERese).classList.replace("btnSubirReseña", "btnSubirReseña2");
                        document.querySelector("."+btnERese).setAttribute("disabled", "");
                        document.querySelector("."+spanD).style.color = "#532f1e";
                        document.querySelector("."+spanC).style.color = "#532f1e";

                    }else{

                        if(document.querySelector("."+textA).value.length > 200){
                            document.querySelector("."+btnERese).classList.replace("btnSubirReseña", "btnSubirReseña2");
                            document.querySelector("."+btnERese).setAttribute("disabled", "");
                            document.querySelector("."+spanD).style.color = "red";
                            document.querySelector("."+spanC).style.color = "red";
                        }
    
                    }

                }


            }


            function obtenerReseñas(){

                let formReseñas = new FormData();

                queryReseñas = "SELECT * FROM `resenias` WHERE `resenias`.`Id_productoRese` = "+document.querySelector(".oRecobrar").value+" ORDER BY `resenias`.`Id_resenia` DESC";

                formReseñas.append("queryResenias", queryReseñas);

                fetch("http://localhost/kuitmine/productoVistaOR.php", {
                method: "POST",
                body: formReseñas
                }).then(response => response.json())
                .then(data => {
                    document.querySelector(".div1").innerHTML = data[0]
                    document.querySelector(".div2").innerHTML = data[1]
                    document.querySelector(".div31").innerHTML = data[2]
                }).catch(err => console.log(err));

            }

            
            obtenerReseñas();


            function mostrarReseCuadroInt(divReseñaInt, flechaIcon){


                if(document.querySelector("."+divReseñaInt).offsetHeight == 60){
                    document.querySelector("."+flechaIcon).style.transform = "rotate(360deg)";
                    document.querySelector("."+divReseñaInt).style.height = "max-content";
                }else{
                    if(document.querySelector("."+divReseñaInt).offsetHeight > 60){
                        document.querySelector("."+flechaIcon).style.transform = "rotate(180deg)";
                        document.querySelector("."+divReseñaInt).style.height = "6rem";
                    }
                }

            }
        

        //<- Contenedor para Reseñas del Producto FIN ->


        //<- Contenedor para Preguntas del Producto INICIO ->

            //Funciones para enviar y cargar las pregunta.

                function cargarPreguntas(){

                    let idProducto = document.querySelector(".oRecobrar").value;

                    let queryCargasPregunta = "SELECT * FROM `comentarios` WHERE `comentarios`.`Tipo` = 'Pregunta' AND `comentarios`.`Id_productoC` = "+idProducto+" ORDER BY `comentarios`.`Id_comentario` DESC;";

                    let formPreguntasCargar = new FormData();

                    formPreguntasCargar.append("sqlCargarPreguntas", queryCargasPregunta);

                    fetch("http://localhost/kuitmine/productoVistaOR.php", {
                    method: "POST",
                    body: formPreguntasCargar
                    }).then(response => response.json())
                    .then(data => {
                        document.querySelector(".preguntasDiv2").innerHTML = data
                    }).catch(err => console.log(err));

                }

                cargarPreguntas();


                
                function funcMostrarRespu(btnMRes, divPreguntas, idComentario, nombreComentario){


                    if(document.querySelector("."+btnMRes).textContent=="Mostrar Respuestas"){


                        document.querySelector("."+btnMRes).textContent="Ocultar Respuestas"
                        
                        if(Object.entries(document.querySelector("."+divPreguntas)).length===0){

                            let sqlObtenRespu = "SELECT * FROM `kuitmine`.`comentarios` WHERE `kuitmine`.`comentarios`.`Tipo` = 'Respuesta' AND `kuitmine`.`comentarios`.`ComentarioR` = "+idComentario+" ORDER BY `kuitmine`.`comentarios`.`Id_comentario` DESC;";

                            let respuFormHtml = new FormData();

                            respuFormHtml.append("sqlRespuestas", sqlObtenRespu);
                            respuFormHtml.append("nombreComentario", nombreComentario);

                            fetch("http://localhost/kuitmine/productoVistaOR.php", {
                            method: "POST",
                            body: respuFormHtml
                            }).then(response => response.json())
                            .then(data => {
                                document.querySelector("."+divPreguntas).innerHTML = data
                                document.querySelector("."+divPreguntas).style.height = "max-content";
                            }).catch(err => console.log(err));

                        }else{


                            document.querySelector("."+divPreguntas).style.height = "max-content";

                        }

                    }else{

                        if(document.querySelector("."+btnMRes).textContent=="Ocultar Respuestas"){

                            document.querySelector("."+btnMRes).textContent="Mostrar Respuestas"
                            document.querySelector("."+divPreguntas).style.height = "0";
                            
                        }
                        
                    }

                }


                function responderPregunBtn(idDivResponder){
                    
                    document.querySelector("."+idDivResponder).style.height = "max-content";

                }


                function canselRespuC(idDivResponderC){

                    document.querySelector("."+idDivResponderC).style.height = "0";

                }


                function comprobarRes(textA, btnERes){

                    if(document.querySelector("."+textA).value.length > 0){

                        document.querySelector("."+btnERes).classList.replace("btnEnviarRespuesta", "btnEnviarRespuesta2");
                        document.querySelector("."+btnERes).removeAttribute("disabled");

                    }else{

                        if(document.querySelector("."+btnERes).classList.contains("btnEnviarRespuesta2")){
                            document.querySelector("."+btnERes).classList.replace("btnEnviarRespuesta2", "btnEnviarRespuesta");
                            document.querySelector("."+btnERes).setAttribute("disabled", "")
                        }

                    };

                }


                function funcionOSRes(textA, btnERespon, idComentario, idUser, idProducto, divRespues){

                    let contenido = document.querySelector("."+textA).value;

                    document.querySelector("."+btnERespon).classList.replace("btnEnviarRespuesta2", "btnEnviarRespuesta");

                    sqlInsertarRespu = "INSERT INTO `comentarios` (`Contenido`, `Tipo`, `MeGustas`, `NoMeGustas`, `RespuestasCant`, `ComentarioR`, `Id_usuarioC`, `Id_productoC`) VALUES ('"+contenido+"', 'Respuesta', 0, 0, 0, "+idComentario+", "+idUser+", "+idProducto+");"

                    let formInsertRespu = new FormData();

                    formInsertRespu.append("sqlInsertRespu", sqlInsertarRespu);
                    formInsertRespu.append("IdComent", idComentario);

                    fetch("http://localhost/kuitmine/productoVistaOR.php", {
                    method: "POST",
                    body: formInsertRespu
                    }).then(response => response.json())
                    .then(data => {
                        document.querySelector("."+divRespues).innerHTML = data
                        document.querySelector("."+textA).value = ""
                    }).catch(err => console.log(err));
                
                }


                function subirPregunta(idProducto, contenidoPre, idUserLogueado, preguContainer){

                    let contenidoPregunta = document.querySelector("#"+contenidoPre).value;

                    queryIntPregunta = "INSERT INTO `comentarios` (`Contenido`, `Tipo`, `MeGustas`, `NoMeGustas`, `RespuestasCant`, `ComentarioR`, `Id_usuarioC`, `Id_productoC`) VALUES ('"+contenidoPregunta+"', 'Pregunta', 0, 0, 0, 0, "+idUserLogueado+", '"+idProducto+"')";

                    let formPregunta = new FormData();


                    formPregunta.append("sqlIntPregunta", queryIntPregunta);
                    formPregunta.append("idproductoX", idProducto);

                    fetch("http://localhost/kuitmine/productoVistaOR.php", {
                    method: "POST",
                    body: formPregunta
                    }).then(response => response.json())
                    .then(data => {
                        document.querySelector("#"+contenidoPre).value="";
                        document.querySelector("."+preguContainer).innerHTML = data
                    }).catch(err => console.log(err));

                }

            //----------------------------------------------------------------------------------------

            //Funciones para enviar una respuesta.

                //Funcion A (Envio de la Respuesta).
                function enviarRespuesta(textArea, idComentario, idULogueado, idProducto, idDivRespuestas, idBotonEnviar){

                    contenidoRespu = document.querySelector("#"+textArea).value;

                    $queryIntRespuesta = "INSERT INTO `comentarios` (`Contenido`, `Tipo`, `MeGustas`, `NoMeGustas`, `RespuestasCant`, `ComentarioR`, `Id_usuarioC`, `Id_productoC`) VALUES ('"+contenidoRespu+"', 'Respuesta', 0, 0, 0, "+idComentario+", "+idULogueado+", '"+idProducto+"')";

                    let formRespuesta = new FormData();

                    formRespuesta.append("sqlIntRespuesta", $queryIntRespuesta);
                    formRespuesta.append("idComentario1", idComentario);


                    fetch("http://localhost/kuitmine/productoVistaOR.php", {
                    method: "POST",
                    body: formRespuesta
                    }).then(response => response.json())
                    .then(data => {
                        document.querySelector("."+idDivRespuestas).innerHTML=data;
                        document.querySelector("#"+textArea).value="";
                    }).catch(err => console.log(err));

                }


                //Función B (Verifica que la respuesta no esté vacía).

                function desbloqBtnEnviar(textArea, btnEnviar){

                    if(document.querySelector("#"+textArea).value.length > 0){

                        document.querySelector("."+btnEnviar).removeAttribute("disabled");
                        document.querySelector("."+btnEnviar).classList.replace("btnEnviarRes", "btnEnviarRes2"); 

                    }else{

                        if(document.querySelector("."+btnEnviar).getAttribute("disabled") == null){

                            document.querySelector("."+btnEnviar).setAttribute("disabled", "");
                            document.querySelector("."+btnEnviar).classList.replace("btnEnviarRes2", "btnEnviarRes");

                        }

                    }

                }

                //Función C (Desplegar cuadro para responder)

                    //C-1 Mostrar con el botón "Responder".
                    function mostrarCResponder(idDivResponder){

                        if(document.querySelector("."+idDivResponder).classList.contains("divResponder")){
                            document.querySelector("."+idDivResponder).classList.replace("divResponder", "divResponder2");
                        }

                    }

                    //C-2 Ocultar con el botón "Cancelar".
                    function cerrarCresponder(idDivResponder){

                        if(document.querySelector("."+idDivResponder).classList.contains("divResponder2")){
                            document.querySelector("."+idDivResponder).classList.replace("divResponder2", "divResponder");
                        }

                    }

                //-------------------------------------------------------------------------

                //Funcion D (Ocultar y Mostrar el Div de las Respuestas).

                
                    function mostrarRespuestas(idBoton, idDivRespuestas, idComentario){

                        let clase = "."+idDivRespuestas;


                        let elemento = document.querySelector(clase);

                        let estado = Object.entries(elemento).length === 0;
                       
                        if(estado === true){


                            queryDevolRespues = "SELECT * FROM `comentarios` WHERE `comentarios`.`ComentarioR` = "+idComentario;

                            if(document.querySelector("."+idBoton).textContent="Mostrar Respuestas"){
                                document.querySelector("."+idBoton).textContent="Ocultar Respuestas";

                                let formDevolRespu = new FormData();
                                formDevolRespu.append("queryRespuDevol", queryDevolRespues);

                                fetch("http://localhost/kuitmine/productoVistaOR.php", {
                                    method: "POST",
                                    body: formDevolRespu
                                }).then(response => response.json())
                                .then(data => {
                                    document.querySelector("."+idDivRespuestas).innerHTML=data;
                                }).catch(err => console.log(err));

                                
                            }

                        }else{


                            if(document.querySelector("."+idBoton).textContent=="Mostrar Respuestas"){
                                document.querySelector("."+idBoton).textContent="Ocultar Respuestas";
                                document.querySelector("."+idDivRespuestas).style.height = "0rem";
                            }else{
                                if(document.querySelector("."+idBoton).textContent=="Ocultar Respuestas"){
                                    document.querySelector("."+idBoton).textContent="Mostrar Respuestas";
                                    document.querySelector("."+idDivRespuestas).style.height = "max-content";
                                }
                            }

                        }

                    }

                //--------------------------------------------------------
            

            //---------------------------------------------------------------------------------------------------------

        //<- Contenedor para Preguntas del Producto FIN ->




        

        function funcionOS(cadena, cadena2, cadena3){

            $btnAtributo = document.querySelector("#"+cadena3).getAttribute("abierto");

            if(document.querySelector("#"+cadena3).getAttribute("abierto")!==null && document.querySelector("#"+cadena2).textContent!=""){
                    
                document.querySelector("#"+cadena3).textContent="Mostrar Respuestas";
                document.querySelector("#"+cadena3).removeAttribute("abierto");
                document.querySelector("#"+cadena2).style.height = "0rem";
                
            }else{

                if(document.querySelector("#"+cadena3).getAttribute("abierto")===null && document.querySelector("#"+cadena2).textContent!=""){

                    document.querySelector("#"+cadena3).textContent="Ocultar Respuestas";
                    document.querySelector("#"+cadena3).setAttribute("abierto", "true");
                    document.querySelector("#"+cadena2).style.height = "max-content";

                }
                
            }
            
  
            if($btnAtributo===null && Object.entries(document.querySelector("#"+cadena2)).length === 0){

                document.querySelector("#"+cadena3).textContent="Ocultar Respuestas";
                document.querySelector("#"+cadena3).setAttribute("abierto", "true");
                document.querySelector("#"+cadena2).style.height = "max-content";

                let idComentario = cadena;
                let idComenDecod = "";
                let numC = 0;
                let caracter="";
                let inicio = 0;
                let final = 0;

                for(let i=0; i<idComentario.length; i++){
                    caracter = idComentario[i];
                    if(caracter=="#" && numC==0){
                        numC += 1;
                    }else{
                        if(caracter=="#" && numC==1){
                            numC += 1;
                            inicio = i+1;
                        }else{
                            if(caracter=="#" && numC==2){
                                final = i;
                                break;
                            }
                        }
                    }        
                }

                idComenDecod = idComentario.substring(inicio, final);
                idComenDecod = parseFloat(idComenDecod.substring(2, idComenDecod.length));

                idComenDecod = (((((idComenDecod*1000)-5)/3)-4)/2);

            
                let formRespuestas = new FormData();

                queryR = "SELECT * FROM `comentarios` WHERE `comentarios`.`ComentarioR` = "+idComenDecod+" ORDER BY `comentarios`.`Id_comentario` DESC";

                formRespuestas.append("respuestaC", queryR);
                        
                fetch("http://localhost/kuitmine/productoVistaOR.php", {
                    method: "POST",
                    body: formRespuestas
                }).then(response => response.json())
                .then(data => {
                    document.querySelector("#"+cadena2).innerHTML=data
                }).catch(err => console.log(err));

            }
            

            

        }
        
        window.addEventListener("load", ()=>{

            //Tomando objetos del DOM -------------------------------------------------------------
        

                const productoContain = document.querySelector(".seccion2");
                const clase2Detalles = document.querySelector("#seccion2Detalles");
                const entradaPregunta = document.querySelector(".entradaPreguntasPdt");
                const divPreguntas = document.querySelector(".preguntasDiv");
                const flechaAbajoIcon = document.querySelector(".flechaAbajoIcon");
                const preguntaTA = document.querySelector("#preguntaTA");
                const btnSubirPregunta = document.querySelector(".btnSubirPregunta");

                const navBarUl = document.querySelector(".Header_Nav-UL"); //UL de la Barra de navegación


            //-----------------------------------------------------------------------------------


            //VARIABLES GLOBALES --------------------------------------------------------------------


                var tamañoPdtContaint = 0;
                var tamañoPdtContaint2 = 0;


            //-------------------------------------------------------------------------------------


            
            setTimeout(() => {
                tamañoPdtContaint = productoContain.offsetHeight;
                tamañoPdtContaint2 = productoContain.offsetWidth;
                clase2Detalles.setAttribute("style", "height: "+tamañoPdtContaint+"px; width: "+tamañoPdtContaint2+"px; position: absolute; z-index: 100; left: 95%; transform: translateX(-100%); margin-top: 284px; display: flex; justify-content: flex-end;");
            }, 1500);

           

            window.addEventListener("resize", ()=>{
                let tamañoPdtContaint = productoContain.offsetHeight;
                let tamañoPdtContaint2 = productoContain.offsetWidth;
                clase2Detalles.removeAttribute("style");
                clase2Detalles.setAttribute("style", "height: "+tamañoPdtContaint+"px; width: "+tamañoPdtContaint2+"px; position: absolute; z-index: 100; left: 95%; transform: translateX(-100%); margin-top: 284px; display: flex; justify-content: flex-end;");
            
                
                let tamaño = divPreguntas.offsetWidth;
                entradaPregunta.style.width = tamaño+"px"; 
            })





            //(Función 1) Cambiar contenido del UL en el NavBar según el estado de la sesión (Usuario Iniciado - Usuario NO iniciado)


                //obtenemos el tipo de usuario de un input oculto con la clase "class1".
                let tipoUser = document.querySelector(".class1").value;

                //Revisando el dato obtenido:
                if(tipoUser==="#ld45"){
                    navBarUl.innerHTML =
                    `<div class="nav-lisContaint">
                        <li class="liInicio"><a href="productos.php" class="enlace">Productos</a></li>
                        <li><a class="enlace" href="historial.php" >Historial</a></li>
                        <li><a class="enlace" href="lisDeseos.php" >Lista de Deseos</a></li>
                        <li><a class="enlace" href="contacto.php">Contáctanos</li>
                    </div>
                    <div class="iniRegiContain">
                        <a href="user.php" class="enlace user-enlace"><svg class="icon-user svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 329.65 368.26"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M175.57,0c8.45,1.65,17,3.14,24.9,6.61,32.2,14,52.35,38,58.64,72.74,5,27.51-1.54,52.59-18.61,74.68-16.13,20.86-37.49,33.25-63.68,36.52-30.7,3.82-57.56-5.39-79.34-27.09-22.88-22.8-32.39-50.86-27.15-83C76.87,40.34,106,10.28,145.58,1.61,148.38,1,151.2.53,154,0Z"/><path d="M162.65,368.26A186.31,186.31,0,0,1,51.37,331a189.07,189.07,0,0,1-49.46-54,11.15,11.15,0,0,1-.57-11.54q24.6-50.67,79-65.29a121.24,121.24,0,0,1,13.39-2.59c4.81-.73,8.89,1.36,12.68,4a97,97,0,0,0,40.4,16.92c26.47,4.41,51.48.17,73.61-15.29,9.42-6.59,18.47-5.82,28.27-3.29,33.67,8.68,58.77,28.6,76.25,58.41a80.19,80.19,0,0,1,4,8.44,8.09,8.09,0,0,1-.52,7.89c-20.4,33.17-47.66,58.75-83,75.43C219.64,362.28,192.64,368.13,162.65,368.26Z"/></g></g></svg><span>Mi Perfil</span></a>
                        <a href="cerrar.php" class="enlace salir-enlace"><svg class="icon-salir svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 317.07 310.36"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M317.07,109.54a28.93,28.93,0,0,1-7,10q-23.36,23.22-46.6,46.57c-3.13,3.13-6.58,5.66-11.15,6.07-7.12.63-13.1-2.61-16.05-8.66-3-6.25-1.85-13.7,3.41-19.12,6.18-6.36,12.57-12.51,18.83-18.79.76-.76,1.85-1.32,2-2.62-1.19-.66-2.44-.33-3.63-.34q-40.51,0-81,0c-9.54,0-15.91-5.41-17.45-14.6-1.77-10.52,5.72-19.7,16.41-19.75,23.3-.1,46.6,0,69.9,0h16.61c-3.47-3.59-6.56-6.86-9.74-10-3.85-3.88-7.9-7.56-11.63-11.54-7.2-7.68-7.2-17.57-.19-23.93A15.9,15.9,0,0,1,260,42.12a32.66,32.66,0,0,1,3.51,3Q287.25,68.86,311,92.59a22.21,22.21,0,0,1,6.1,9.52Z"/><path d="M62.7,32.29c4.54,2.37,9.08,4.77,13.64,7.11C93.21,48.06,110,56.86,127,65.29c7.86,3.9,11.36,9.91,11.35,18.5q-.09,60.15,0,120.31v3.09c0,4.35,0,4.36,4.24,4.36h30.93c3.09,0,6.19,0,9.28,0,5.28-.1,8-2.75,8-8q.06-28,0-56c0-4.8,0-4.81,4.73-4.81,7.83,0,15.67.09,23.5,0,2.68,0,3.61.81,3.6,3.54-.07,26.9,0,53.81-.07,80.72,0,9.58-6.87,16.37-16.44,16.4q-32.17.1-64.34,0c-3.17,0-4,.93-4,4,.14,17.73.08,35.46.07,53.19,0,8.63-5.72,12.22-13.37,8.27Q67.34,279.27,10.23,249.68c-6.87-3.55-10.19-9-10.18-16.9Q.22,125.14,0,17.51C0,9.06,5.1.49,16.73,0c.82,0,1.65,0,2.47,0q91.86,0,183.72,0a42.88,42.88,0,0,1,5.54.4c8,1,13.91,7.06,14,15.14.22,17.22.07,34.44.11,51.65,0,1.92-.7,2.86-2.7,2.85-8.77,0-17.53,0-26.29,0-2.5,0-2.83-1.4-2.83-3.39q.06-12.84,0-25.67c0-6.57-2.64-9.24-9.11-9.24q-58.45,0-116.91,0H62.9Z"/></g></g></svg><span>Salir</span></a>
                    </div>`;
                }else{

                    if(tipoUser==="#ad64"){

                        navBarUl.innerHTML =
                        `<div class="nav-lisContaint">
                            <li class="liInicio"><a href="productos.php" class="enlace">Productos</a></li>
                            <li><a class="enlace" href="historial.php" >Historial</a></li>
                            <li><a class="enlace" href="lisDeseos.php" >Lista de Deseos</a></li>
                            <li><a class="enlace" href="contacto.php">Contáctanos</li>
                        </div>
                        <div class="iniRegiContain">
                            <a href="user.php" class="enlace user-enlace"><svg class="icon-user svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 329.65 368.26"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M175.57,0c8.45,1.65,17,3.14,24.9,6.61,32.2,14,52.35,38,58.64,72.74,5,27.51-1.54,52.59-18.61,74.68-16.13,20.86-37.49,33.25-63.68,36.52-30.7,3.82-57.56-5.39-79.34-27.09-22.88-22.8-32.39-50.86-27.15-83C76.87,40.34,106,10.28,145.58,1.61,148.38,1,151.2.53,154,0Z"/><path d="M162.65,368.26A186.31,186.31,0,0,1,51.37,331a189.07,189.07,0,0,1-49.46-54,11.15,11.15,0,0,1-.57-11.54q24.6-50.67,79-65.29a121.24,121.24,0,0,1,13.39-2.59c4.81-.73,8.89,1.36,12.68,4a97,97,0,0,0,40.4,16.92c26.47,4.41,51.48.17,73.61-15.29,9.42-6.59,18.47-5.82,28.27-3.29,33.67,8.68,58.77,28.6,76.25,58.41a80.19,80.19,0,0,1,4,8.44,8.09,8.09,0,0,1-.52,7.89c-20.4,33.17-47.66,58.75-83,75.43C219.64,362.28,192.64,368.13,162.65,368.26Z"/></g></g></svg><span>Mi Perfil</span></a>
                            <a href="cerrar.php" class="enlace salir-enlace"><svg class="icon-salir svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 317.07 310.36"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M317.07,109.54a28.93,28.93,0,0,1-7,10q-23.36,23.22-46.6,46.57c-3.13,3.13-6.58,5.66-11.15,6.07-7.12.63-13.1-2.61-16.05-8.66-3-6.25-1.85-13.7,3.41-19.12,6.18-6.36,12.57-12.51,18.83-18.79.76-.76,1.85-1.32,2-2.62-1.19-.66-2.44-.33-3.63-.34q-40.51,0-81,0c-9.54,0-15.91-5.41-17.45-14.6-1.77-10.52,5.72-19.7,16.41-19.75,23.3-.1,46.6,0,69.9,0h16.61c-3.47-3.59-6.56-6.86-9.74-10-3.85-3.88-7.9-7.56-11.63-11.54-7.2-7.68-7.2-17.57-.19-23.93A15.9,15.9,0,0,1,260,42.12a32.66,32.66,0,0,1,3.51,3Q287.25,68.86,311,92.59a22.21,22.21,0,0,1,6.1,9.52Z"/><path d="M62.7,32.29c4.54,2.37,9.08,4.77,13.64,7.11C93.21,48.06,110,56.86,127,65.29c7.86,3.9,11.36,9.91,11.35,18.5q-.09,60.15,0,120.31v3.09c0,4.35,0,4.36,4.24,4.36h30.93c3.09,0,6.19,0,9.28,0,5.28-.1,8-2.75,8-8q.06-28,0-56c0-4.8,0-4.81,4.73-4.81,7.83,0,15.67.09,23.5,0,2.68,0,3.61.81,3.6,3.54-.07,26.9,0,53.81-.07,80.72,0,9.58-6.87,16.37-16.44,16.4q-32.17.1-64.34,0c-3.17,0-4,.93-4,4,.14,17.73.08,35.46.07,53.19,0,8.63-5.72,12.22-13.37,8.27Q67.34,279.27,10.23,249.68c-6.87-3.55-10.19-9-10.18-16.9Q.22,125.14,0,17.51C0,9.06,5.1.49,16.73,0c.82,0,1.65,0,2.47,0q91.86,0,183.72,0a42.88,42.88,0,0,1,5.54.4c8,1,13.91,7.06,14,15.14.22,17.22.07,34.44.11,51.65,0,1.92-.7,2.86-2.7,2.85-8.77,0-17.53,0-26.29,0-2.5,0-2.83-1.4-2.83-3.39q.06-12.84,0-25.67c0-6.57-2.64-9.24-9.11-9.24q-58.45,0-116.91,0H62.9Z"/></g></g></svg><span>Salir</span></a>
                        </div>`;

                    }else{
                        
                        if(tipoUser==="neutral"){

                            navBarUl.innerHTML =
                            `<div class="nav-lisContaint">
                                <li class="liInicio"><a href="productos.php" class="enlace">Productos</a></li>
                                <li><a class="enlace enlaceContactanos" href="contacto.php">Contáctanos</li>
                            </div>
                            <div class="iniRegiContain">
                                <a href="inicioSesion.php" class="enlace user-enlace"><svg class="icon-entrar svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 808.1 803.64"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M471.85,390.9l-189.17-178a15.58,15.58,0,0,0-26.26,11.35V303H15.58A15.59,15.59,0,0,0,0,318.57v166.5a15.59,15.59,0,0,0,15.58,15.58H256.42v78.79a15.58,15.58,0,0,0,26.26,11.35l189.17-178A15,15,0,0,0,471.85,390.9Z"/><path d="M577.24,803.64H778.1a30,30,0,0,0,30-30V723.15ZM778.1,0H577.24L808.1,80.49V30A30,30,0,0,0,778.1,0Z"/><path d="M530.88,803.64H285.24a30,30,0,0,1-30-30V610.82a35.44,35.44,0,0,0,41.15-5.47l55.23-52V707.26h165v68.23A35,35,0,0,0,530.88,803.64Z"/><path d="M272.1,188.59a35.51,35.51,0,0,0-16.86,4.23V30a30,30,0,0,1,30-30H530.88a35,35,0,0,0-14.21,28.15V96.38h-165V250.27l-55.23-52A35.35,35.35,0,0,0,272.1,188.59Z"/><path d="M558.25,9.27a20,20,0,0,0-26.58,18.88V775.49a20,20,0,0,0,26.58,18.88L808.1,707.26V96.38ZM768.1,678.84,711.72,698.5l-25.13,8.76L571.67,747.33v-691L686.61,96.38l25.11,8.75,56.38,19.66Z"/><path d="M639.67,396c0,28.05-11.23,50.79-25.07,50.79S589.53,424.08,589.53,396s11.22-50.78,25.07-50.78S639.67,368,639.67,396Z"/></g></g></svg><span>Iniciar Sesión</span></a>
                                <a href="registro.php" class="enlace salir-enlace"><svg class="icon-regis svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 663.43 720.94"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M190.29,720.94l.11-.16a.43.43,0,0,0,0,.16Z"/><path d="M540,720.94h-.11a.43.43,0,0,0,0-.16Z"/><path d="M453.21,200.36c0,17-5.56,32.9-15.66,44.69-9.19,10.73-21.08,16.63-33.45,16.63s-24.27-5.9-33.46-16.63C360.54,233.26,355,217.39,355,200.36s5.56-32.91,15.66-44.69C379.83,144.94,391.72,139,404.1,139s24.26,5.91,33.45,16.64C447.65,167.45,453.21,183.32,453.21,200.36Z"/><path d="M404.1,91C350.46,91,307,140,307,200.36s43.48,109.32,97.12,109.32,97.11-48.94,97.11-109.32S457.73,91,404.1,91Zm0,194.65c-40.32,0-73.12-38.27-73.12-85.32S363.78,115,404.1,115s73.11,38.28,73.11,85.33S444.41,285.68,404.1,285.68Z"/><path d="M453.21,200.36c0,17-5.56,32.9-15.66,44.69-9.19,10.73-21.08,16.63-33.45,16.63s-24.27-5.9-33.46-16.63C360.54,233.26,355,217.39,355,200.36s5.56-32.91,15.66-44.69C379.83,144.94,391.72,139,404.1,139s24.26,5.91,33.45,16.64C447.65,167.45,453.21,183.32,453.21,200.36Z"/><path d="M453.21,200.36c0,17-5.56,32.9-15.66,44.69-9.19,10.73-21.08,16.63-33.45,16.63s-24.27-5.9-33.46-16.63C360.54,233.26,355,217.39,355,200.36s5.56-32.91,15.66-44.69C379.83,144.94,391.72,139,404.1,139s24.26,5.91,33.45,16.64C447.65,167.45,453.21,183.32,453.21,200.36Z"/><path d="M484.66,422.72c19.54,27.58,32.73,63,38.08,101.68H285.45c5.35-38.66,18.54-74.1,38.07-101.68C346.26,390.63,374.87,373,404.09,373S461.93,390.63,484.66,422.72Z"/><path d="M404.09,325C310.57,325,234.76,432,234.76,564c0,2.76,0,5.5.11,8.23a.43.43,0,0,0,0,.16H573.32a.43.43,0,0,0,0-.16c.08-2.73.11-5.47.11-8.23C573.43,432,497.62,325,404.09,325ZM259.14,548.4c2.58-53,18.25-102.08,44.8-139.56C331.3,370.22,366.86,349,404.09,349s72.8,21.27,100.16,59.89c26.55,37.48,42.22,86.56,44.8,139.56Z"/><path d="M522.74,524.4H285.45c5.35-38.66,18.54-74.1,38.07-101.68C346.26,390.63,374.87,373,404.09,373s57.84,17.68,80.57,49.77C504.2,450.3,517.39,485.74,522.74,524.4Z"/><path d="M522.74,524.4H285.45c5.35-38.66,18.54-74.1,38.07-101.68C346.26,390.63,374.87,373,404.09,373s57.84,17.68,80.57,49.77C504.2,450.3,517.39,485.74,522.74,524.4Z"/><path d="M613.43,0H50A50,50,0,0,0,0,50V613.43a50,50,0,0,0,50,50H613.43a50,50,0,0,0,50-50V50A50,50,0,0,0,613.43,0ZM596.74,606.74h-530a10,10,0,0,1-10-10v-530a10,10,0,0,1,10-10H596.74a10,10,0,0,1,10,10V596.74A10,10,0,0,1,596.74,606.74Z"/><polygon points="253.52 304.66 199.41 304.66 199.41 250.55 145.3 250.55 145.3 304.66 91.19 304.66 91.19 358.77 145.3 358.77 145.3 412.88 199.41 412.88 199.41 358.77 253.52 358.77 253.52 304.66"/></g></g></svg><span>Registrarse</span></a>
                            </div>`;
                        }

                    }
                    
                }


            //-----------------------------------------------------------------------------------------------------------------------


            //(Funcion 2) Definiendo altura del contenedor de seccion2detalles y scrollx de producto sugeridos


                preguntaTA.addEventListener("input", (e)=>{
                    let textoTamaño = e.target.value.length;
                    document.querySelector(".cantCaracterSpan").textContent=textoTamaño;
                    if(textoTamaño>250){
                        document.querySelector(".cantCaracterSpan").setAttribute("style", "color: red;");
                        document.querySelector("#spanCuentaCaracter").setAttribute("style", "color: red;");
                        document.querySelector(".btnSubirPregunta").setAttribute("disabled", "");
                        document.querySelector(".btnSubirPregunta").classList.add("botonEnviar2");
                    }else{
                        if(document.querySelector(".cantCaracterSpan").getAttribute("style") == "color: red;"){
                            document.querySelector(".cantCaracterSpan").removeAttribute("style");
                            document.querySelector("#spanCuentaCaracter").removeAttribute("style");
                            if(document.querySelector(".btnSubirPregunta").getAttribute("disabled")!==null){
                                document.querySelector(".btnSubirPregunta").removeAttribute("disabled");
                                document.querySelector(".btnSubirPregunta").classList.remove("botonEnviar2");
                            }
                        }       
                    }
                    if(e.target.value.length<=250){
                        if(document.querySelector("#mErrorPregunta").getAttribute("style")=="display:default;"){
                            document.querySelector("#mErrorPregunta").removeAttribute("style");
                            document.querySelector("#mErrorPregunta").setAttribute("style", "display:none;");
                            document.querySelector("#mErrorPregunta").textContent="#####";
                            if(document.querySelector(".btnSubirPregunta").getAttribute("disabled")!==null){
                                document.querySelector(".btnSubirPregunta").removeAttribute("disabled");
                                document.querySelector(".btnSubirPregunta").classList.remove("botonEnviar2");
                            }
                        }
                    }
                });  


                btnSubirPregunta.addEventListener("click", (e)=>{
                    if(preguntaTA.value.length>250){
                        e.preventDefault();
                        document.querySelector("#mErrorPregunta").removeAttribute("style");
                        document.querySelector("#mErrorPregunta").setAttribute("style", "display:default;");
                        document.querySelector("#mErrorPregunta").textContent="La pregunta es demasiado larga.";
                    }
                });
                

                let tamañoPreguntasInput = divPreguntas.offsetWidth;

                flechaAbajoIcon.addEventListener("click", ()=>{

                    let tamañoPreguntasInput = divPreguntas.offsetWidth;

                    if(flechaAbajoIcon.getAttribute("style")=="transform: rotate(180deg);"){
                        entradaPregunta.removeAttribute("style");
                        entradaPregunta.setAttribute("style", "margin-bottom: 2rem; width: "+tamañoPreguntasInput+"px ; height: max-content; background-color: #FFE4C5; position: absolute; bottom: 0; display: flex; border-radius: 0 0 1rem 1rem; z-index: 150; flex-wrap: wrap; padding: 2rem; left: 50%; transform: translateX(-50%)");
                        flechaAbajoIcon.setAttribute("style", "transform: rotate(0deg);");
                    }else{
                        entradaPregunta.removeAttribute("style");
                        entradaPregunta.setAttribute("style", "overflow: hidden; margin-bottom: 2rem; width: "+tamañoPreguntasInput+"px ; height: 6rem; background-color: #FFE4C5; position: absolute; bottom: 0; display: flex; border-radius: 0 0 1rem 1rem; z-index: 150; flex-wrap: wrap; padding: 2rem; left: 50%; transform: translateX(-50%)");
                        flechaAbajoIcon.setAttribute("style", "transform: rotate(180deg);");
                    }

            
                });
                

                
                entradaPregunta.setAttribute("style", "overflow: hidden; margin-bottom: 2rem; width: "+tamañoPreguntasInput+"px ; height: 6rem; background-color: #FFE4C5; position: absolute; bottom: 0; display: flex; border-radius: 0 0 1rem 1rem; z-index: 150; flex-wrap: wrap; padding: 2rem; left: 50%; transform: translateX(-50%)");
                flechaAbajoIcon.setAttribute("style", "transform: rotate(180deg);");

                

                
            //-----------------------------------------------------------------------------------------------------------
            

            //(Funcion 3) Mostrar respuestas del comentario con el boton "Mostrar Respuesta"

                

            //--------------------------------------------------------------------------------------------------------- 


            

            
        })

         
             
          

     //------------------------------------------------------------------------------------

        
    }

    
//<-- productoVista.php FIN -->