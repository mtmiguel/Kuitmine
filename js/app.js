//<-- Index.php INICIO -->


    


    if(document.querySelector(".indexHTML")!==null){    //Verificando que estamos en Index.php


        window.addEventListener("load", (e)=>{

            //Seleccionando Elementos del DOM


                //VARIABLES
                    
                    const navBarUl = document.querySelector(".Header_Nav-UL"); 

                //----------------------------

            //--------------------------------------------------------------
            
            if(document.querySelector(".class1Index").value=="#ld45" || document.querySelector(".class1Index").value=="#ad64"){
                
                navBarUl.innerHTML =
                `<div class="nav-lisContaint">
                    <li class="liInicio lienlace"><a href="productos.php" class="enlace">Productos</a></li>
                    <li class="lihistorial lienlace"><a href="historial.php" class="enlace">Historial</a></li>
                    <li class="lilisdeseos lienlace"><a href="lisDeseos.php" class="enlace">Lista de Deseos</a></li>
                    <li class="licontacto lienlace"><a class="enlace" href="contacto.php">Contáctanos</li>
                </div>
                <div class="iniRegiContain">
                    <a href="user.php" class="enlace user-enlace"><svg class="icon-user svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 329.65 368.26"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M175.57,0c8.45,1.65,17,3.14,24.9,6.61,32.2,14,52.35,38,58.64,72.74,5,27.51-1.54,52.59-18.61,74.68-16.13,20.86-37.49,33.25-63.68,36.52-30.7,3.82-57.56-5.39-79.34-27.09-22.88-22.8-32.39-50.86-27.15-83C76.87,40.34,106,10.28,145.58,1.61,148.38,1,151.2.53,154,0Z"/><path d="M162.65,368.26A186.31,186.31,0,0,1,51.37,331a189.07,189.07,0,0,1-49.46-54,11.15,11.15,0,0,1-.57-11.54q24.6-50.67,79-65.29a121.24,121.24,0,0,1,13.39-2.59c4.81-.73,8.89,1.36,12.68,4a97,97,0,0,0,40.4,16.92c26.47,4.41,51.48.17,73.61-15.29,9.42-6.59,18.47-5.82,28.27-3.29,33.67,8.68,58.77,28.6,76.25,58.41a80.19,80.19,0,0,1,4,8.44,8.09,8.09,0,0,1-.52,7.89c-20.4,33.17-47.66,58.75-83,75.43C219.64,362.28,192.64,368.13,162.65,368.26Z"/></g></g></svg><span>Mi Perfil</span></a>
                    <a href="cerrar.php" class="enlace salir-enlace"><svg class="icon-salir svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 317.07 310.36"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M317.07,109.54a28.93,28.93,0,0,1-7,10q-23.36,23.22-46.6,46.57c-3.13,3.13-6.58,5.66-11.15,6.07-7.12.63-13.1-2.61-16.05-8.66-3-6.25-1.85-13.7,3.41-19.12,6.18-6.36,12.57-12.51,18.83-18.79.76-.76,1.85-1.32,2-2.62-1.19-.66-2.44-.33-3.63-.34q-40.51,0-81,0c-9.54,0-15.91-5.41-17.45-14.6-1.77-10.52,5.72-19.7,16.41-19.75,23.3-.1,46.6,0,69.9,0h16.61c-3.47-3.59-6.56-6.86-9.74-10-3.85-3.88-7.9-7.56-11.63-11.54-7.2-7.68-7.2-17.57-.19-23.93A15.9,15.9,0,0,1,260,42.12a32.66,32.66,0,0,1,3.51,3Q287.25,68.86,311,92.59a22.21,22.21,0,0,1,6.1,9.52Z"/><path d="M62.7,32.29c4.54,2.37,9.08,4.77,13.64,7.11C93.21,48.06,110,56.86,127,65.29c7.86,3.9,11.36,9.91,11.35,18.5q-.09,60.15,0,120.31v3.09c0,4.35,0,4.36,4.24,4.36h30.93c3.09,0,6.19,0,9.28,0,5.28-.1,8-2.75,8-8q.06-28,0-56c0-4.8,0-4.81,4.73-4.81,7.83,0,15.67.09,23.5,0,2.68,0,3.61.81,3.6,3.54-.07,26.9,0,53.81-.07,80.72,0,9.58-6.87,16.37-16.44,16.4q-32.17.1-64.34,0c-3.17,0-4,.93-4,4,.14,17.73.08,35.46.07,53.19,0,8.63-5.72,12.22-13.37,8.27Q67.34,279.27,10.23,249.68c-6.87-3.55-10.19-9-10.18-16.9Q.22,125.14,0,17.51C0,9.06,5.1.49,16.73,0c.82,0,1.65,0,2.47,0q91.86,0,183.72,0a42.88,42.88,0,0,1,5.54.4c8,1,13.91,7.06,14,15.14.22,17.22.07,34.44.11,51.65,0,1.92-.7,2.86-2.7,2.85-8.77,0-17.53,0-26.29,0-2.5,0-2.83-1.4-2.83-3.39q.06-12.84,0-25.67c0-6.57-2.64-9.24-9.11-9.24q-58.45,0-116.91,0H62.9Z"/></g></g></svg><span>Salir</span></a>
                </div>`;
                    
            }else{

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



            //Animaciones del Inicio

                let seccioneAnimar = document.querySelectorAll("section");

                //Función para animar la seccion al bajar el scroll
                window.onscroll = () => {
                    seccioneAnimar.forEach(seccion => {

                        let tope = window.scrollY;
                        let topeActual = seccion.offsetTop;
                        let alturaSeccion = seccion.offsetHeight;
                        

                        if(tope >= topeActual-260 && ((tope < topeActual + alturaSeccion))){
                            seccion.classList.add("mostrarAnimacion");
                        }else{
                            seccion.classList.remove("mostrarAnimacion");
                        }

                    });
                }

            //----------------------------------------------------------------------------------------


        });


    }

    
//<-- Index.php FIN-->



//<-- Administracion.php INICIO-->

    
    if(document.querySelector(".crudHTML")!==null){

        let campoBespecifica = document.querySelector(".bEspecifica");
        let campoCategoria = document.querySelector("#categoFiltro");
        let campoPrecio = document.querySelector("#precioFiltro");
        let campoVentas = document.querySelector("#ventasFiltro");
        
        window.addEventListener("load", obtenerData);

        campoBespecifica.addEventListener("keyup", obtenerData);

        campoCategoria.addEventListener("input", (e)=>{
            if(campoBespecifica.value==null || campoBespecifica.value==""){
                let categoria = document.querySelector("#categoFiltro").value;
                let precio = campoPrecio.value;
                let content = document.querySelector("#productCrudContain");
                let ventas = campoVentas.value;
                let url = "http://localhost/kuitmine/loadDataAdmin.php";
              

                let formaDataCatego = new FormData();

                formaDataCatego.append("categoria", categoria);
                formaDataCatego.append("precio", precio);
                formaDataCatego.append("ventas", ventas);

                fetch(url, {
                    method: "POST",
                    body: formaDataCatego
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data
                }).catch(err => console.log(err));
            }
        });


        campoPrecio.addEventListener("input", (e)=>{
            if(campoBespecifica.value==null || campoBespecifica.value==""){
                let categoria = campoCategoria.value;
                let precio = e.target.value;
                let ventas = campoVentas.value;
                let content = document.querySelector("#productCrudContain");
                let url = "http://localhost/kuitmine/loadDataAdmin.php";
           

                let formaDataPrecio = new FormData();

                formaDataPrecio.append("categoria", categoria);
                formaDataPrecio.append("precio", precio);
                formaDataPrecio.append("ventas", ventas);

                fetch(url, {
                    method: "POST",
                    body: formaDataPrecio
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data
                }).catch(err => console.log(err));
            }
        });


        campoVentas.addEventListener("input", (e)=>{
            if(campoBespecifica.value==null || campoBespecifica.value==""){
                let categoria = campoCategoria.value;
                let precio = campoPrecio.value;
                let content = document.querySelector("#productCrudContain");
                let ventas = e.target.value;
                let url = "http://localhost/kuitmine/loadDataAdmin.php";

                let formaDataVenta = new FormData();

                formaDataVenta.append("categoria", categoria);
                formaDataVenta.append("precio", precio);
                formaDataVenta.append("ventas", ventas);

                fetch(url, {
                    method: "POST",
                    body: formaDataVenta
                }).then(response => response.json())
                .then(data => {
                    content.innerHTML = data
                }).catch(err => console.log(err));
            }
        });


        function obtenerData(){
            let campoBespe = document.querySelector(".bEspecifica").value;
            let content = document.querySelector("#productCrudContain");
            let url = "http://localhost/kuitmine/loadDataAdmin.php";
            campoCategoria.value = "Sin Dato";
            campoPrecio.value = "Sin Dato";
            campoVentas.value = "Sin Dato";
            
            let formaData = new FormData();

            formaData.append("campoBEspe", campoBespe);

            fetch(url, {
                method: "POST",
                body: formaData
            }).then(response => response.json())
            .then(data => {
                content.innerHTML = data
            }).catch(err => console.log(err));
        }


    }


//<-- Administracion.php FIN-->



//<-- lisDesesos.php INICIO -->


    if(document.querySelector("#lisDeseosHTML")!==null){


        window.addEventListener("load", ()=>{

            let tipoUser = document.querySelector(".class1LiDeseos").value;
            const navBarUl = document.querySelector(".Header_Nav-UL"); 

            
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


        })


    }


//<-- lisDesesos.php FIN -->




//<-- Historial.php INICIO -->


if(document.querySelector("#HistorialHTML")!==null){


    window.addEventListener("load", ()=>{

        let tipoUser = document.querySelector(".class1Historial").value;
        const navBarUl = document.querySelector(".Header_Nav-UL"); 

        
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


    })


}


//<-- Historial.php FIN -->



//<-- actuDelete.php INICIO -->


    if(document.querySelector(".actuDeleteHTML")!==null){   //Verificando que estemos en actuDelete.php

        btnEliminar = document.querySelector("#btnEliminar");
        formm = document.querySelector("#formOculto2");
        btnEditar = document.querySelector(".btnActualizar1");
        btnCancelar = document.querySelector(".cancelIcon1");
        btnGuardar = document.querySelector(".agreeIcon1");
        nombrePdtInput = document.querySelector("#nombrePdtInput");
        precioPdtInput = document.querySelector("#precioPdtInput");
        ivaPdtInput = document.querySelector("#ivaPdtInput");
        descuPdtInput = document.querySelector("#descuPdtInput");
        categoPdtInput = document.querySelector("#categoPdtInput");
        stockPdtInput = document.querySelector("#stockPdtInput");
        descripPdtInput = document.querySelector("#descripPdtInput");
        descrip2PdtInput = document.querySelector("#descrip2PdtInput");
        candadoIconC = document.querySelectorAll(".candadoC");
        candadoIconA = document.querySelectorAll(".candadoA2");

        function actualizarInfoPdt(btnCancel, btnAgree, id, nombre, precio, iva, descuento, categoria, stock, dCorta, dLarga){
         
            let id1 = id;
            let nombre1 = document.querySelector("#"+nombre).value;
            let precio1 = document.querySelector("#"+precio).value;
            let iva1 = document.querySelector("#"+iva).value;
            let descuento1 = document.querySelector("#"+descuento).value;
            let categoria1 = document.querySelector("#"+categoria).value;
            let dcorta1 = document.querySelector("#"+dCorta).value;
            let dlarga1 = document.querySelector("#"+dLarga).value;
            let sqld = "UPDATE `kuitmine`.`producto` SET `kuitmine`.`producto`.`Nombre`= '"+nombre1+"', `kuitmine`.`producto`.`Descripcion`='"+dcorta1+"', `kuitmine`.`producto`.`DescripcionL`='"+dlarga1+"', `kuitmine`.`producto`.`Precio`='"+precio1+"', `kuitmine`.`producto`.`Categoria`='"+categoria1+"', `kuitmine`.`producto`.`IVA`='"+iva1+"', `kuitmine`.`producto`.`Descuento`='"+descuento1+"' WHERE `kuitmine`.`producto`.`Id_producto` = "+id1+";";
         
            let fomrActuPdt = new FormData();

            fomrActuPdt.append("IdPdt", id1);
            fomrActuPdt.append("sqlActuPdt", sqld);

            fetch("http://localhost/kuitmine/productoVistaOR.php", {
                method: "POST",
                body: fomrActuPdt
            }).then(response => response.json())
            .then(data => {
                btnCancelar.classList.replace("cancelIcon2", "cancelIcon1");
                btnGuardar.classList.replace("agreeIcon2", "agreeIcon1");
                btnEditar.removeAttribute("disabled");
                btnEditar.classList.replace("btnActualizar2", "btnActualizar1");
                nombrePdtInput.setAttribute("readonly", "true");
                precioPdtInput.setAttribute("readonly", "true");
                descripPdtInput.setAttribute("readonly", "true");
                descrip2PdtInput.setAttribute("readonly", "true");
                ivaPdtInput.setAttribute("readonly", "true");
                descuPdtInput.setAttribute("readonly", "true");
                categoPdtInput.setAttribute("disabled", "");
                stockPdtInput.setAttribute("readonly", "true");

                candadoIconC[0].classList.replace("candadoC2", "candadoC");
                candadoIconC[1].classList.replace("candadoC2", "candadoC");
                candadoIconC[2].classList.replace("candadoC2", "candadoC");
                candadoIconC[3].classList.replace("candadoC2", "candadoC");
                candadoIconC[4].classList.replace("candadoC2", "candadoC");
                document.querySelector(".candadoC23").classList.replace("candadoC23", "candadoC3");
                document.querySelector(".candadoC24").classList.replace("candadoC24", "candadoC4");
                document.querySelector(".candadoC25").classList.replace("candadoC25", "candadoC5");
                
                candadoIconA[0].classList.replace("candadoA", "candadoA2");
                candadoIconA[1].classList.replace("candadoA", "candadoA2");
                candadoIconA[2].classList.replace("candadoA", "candadoA2");
                candadoIconA[3].classList.replace("candadoA", "candadoA2");
                candadoIconA[4].classList.replace("candadoA", "candadoA2");
                document.querySelector(".candadoA3").classList.replace("candadoA3", "candadoA23");
                document.querySelector(".candadoA4").classList.replace("candadoA4", "candadoA24");
                document.querySelector(".candadoA5").classList.replace("candadoA5", "candadoA25");
            }).catch(err => console.log(err));

        }

        

        function cancelActu(id){

            idCancelar = id;

            let fomrCancelActuPdt = new FormData();

            fomrCancelActuPdt.append("idCancel", idCancelar);

            fetch("http://localhost/kuitmine/productoVistaOR.php", {
                method: "POST",
                body: fomrCancelActuPdt
            }).then(response => response.json())
            .then(data => {
                nombrePdtInput.value = data[0][1];
                precioPdtInput.value = data[0][4];
                descripPdtInput.value = data[0][2];
                descrip2PdtInput.value = data[0][3];
                ivaPdtInput.value = data[0][9];
                descuPdtInput.value = data[0][10];
                categoPdtInput.value = data[0][7];
                stockPdtInput.value = data[0][5];

            }).catch(err => console.log(err));

        }


        window.addEventListener("load", ()=>{


            //Seleccionando Elementos del DOM
            const btnEliminar = document.querySelector("#btnEliminar");
            const formm = document.querySelector("#formOculto2");
            const btnEditar = document.querySelector(".btnActualizar1");
            const btnCancelar = document.querySelector(".cancelIcon1");
            const btnGuardar = document.querySelector(".agreeIcon1");
            const nombrePdtInput = document.querySelector("#nombrePdtInput");
            const precioPdtInput = document.querySelector("#precioPdtInput");
            const ivaPdtInput = document.querySelector("#ivaPdtInput");
            const descuPdtInput = document.querySelector("#descuPdtInput");
            const categoPdtInput = document.querySelector("#categoPdtInput");
            const stockPdtInput = document.querySelector("#stockPdtInput");
            const descripPdtInput = document.querySelector("#descripPdtInput");
            const descrip2PdtInput = document.querySelector("#descrip2PdtInput");
            const candadoIconC = document.querySelectorAll(".candadoC");
            const candadoIconA = document.querySelectorAll(".candadoA2");
            

            //VARIABLES
                var letrasNumeros = "abcdefeghijklmnñopqrstuvwxyz1234567890";
                var numeros = "1234567890";
                var estadoPre = "";
            //---------------------------------------------------


            let descripCortas = document.getElementById("descripPdtInput").value;
            let cuentaCorta = 0;
            for(let i=0; i<descripCortas.length; i++){
                if(descripCortas[i]==" "){
                    continue;
                }else{
                    cuentaCorta++;
                }
            }

            document.querySelector(".contaCaracter255").textContent = cuentaCorta.toString();


            let descripLargas = document.getElementById("descrip2PdtInput").value;
            let cuentaLargas = 0;
            for(let i=0; i<descripLargas.length; i++){
                if(descripLargas[i]==" "){
                    continue;
                }else{
                    cuentaLargas++;
                }
            }

            document.querySelector(".contaSpanLargo").textContent = cuentaLargas.toString();



            nombrePdtInput.addEventListener("focusin", (e)=>{
                let atributo = e.target.getAttribute("maxlength");
                if(atributo===null){
                    e.target.setAttribute("maxlength", "50");
                }
            });

            precioPdtInput.addEventListener("focusin", (e)=>{
                let atributo = e.target.getAttribute("maxlength");
                if(atributo===null){
                    e.target.setAttribute("maxlength", "9");
                }
            });

            ivaPdtInput.addEventListener("focusin", (e)=>{
                let atributo = e.target.getAttribute("maxlength");
                if(atributo===null){
                    e.target.setAttribute("maxlength", "2");
                }
            });

            descuPdtInput.addEventListener("focusin", (e)=>{
                let atributo = e.target.getAttribute("maxlength");
                if(atributo===null){
                    e.target.setAttribute("maxlength", "2");
                }
            });

            stockPdtInput.addEventListener("focusin", (e)=>{
                let atributo = e.target.getAttribute("maxlength");
                if(atributo===null){
                    e.target.setAttribute("maxlength", "6");
                }
            });

            descripPdtInput.addEventListener("input", ()=>{

                let descripCortas = document.getElementById("descripPdtInput").value;
                let cuentaCorta = 0;
                for(let i=0; i<descripCortas.length; i++){
                    if(descripCortas[i]==" "){
                        continue;
                    }else{
                        cuentaCorta++;
                    }
                }

                document.querySelector(".contaCaracter255").textContent = cuentaCorta.toString();

                if(cuentaCorta>210){
                    if(document.querySelector(".contaCaracter255").classList.contains("conca255")){
                        document.querySelector(".contaCaracter255").classList.replace("conca255","conca2552");
                        document.querySelector(".contaCaracter").classList.replace("contaCarac","contaCarac2");
                    }  
                    estadoDescriC=false;   
                }else{
                    if(document.querySelector(".contaCaracter255").classList.contains("conca2552")){
                        document.querySelector(".contaCaracter255").classList.replace("conca2552","conca255");
                        document.querySelector(".contaCaracter").classList.replace("contaCarac2","contaCarac");
                    } 
                    estadoDescriC=true;
                }

            });


            descrip2PdtInput.addEventListener("input", ()=>{

                let descripLargas = document.getElementById("descrip2PdtInput").value;
                let cuentaLargas = 0;
                for(let i=0; i<descripLargas.length; i++){
                    if(descripLargas[i]==" "){
                        continue;
                    }else{
                        cuentaLargas++;
                    }
                }

                document.querySelector(".contaSpanLargo").textContent = cuentaLargas.toString();

                if(cuentaLargas>530){
                    if(document.querySelector(".contaSpanLargo").classList.contains("contSL")){
                        document.querySelector(".contaSpanLargo").classList.replace("contSL","contSL2");
                        document.querySelector(".contaCaracterLargo").classList.replace("contaCLargo","contaCLargo2");
                    }
                    estadoDescriL=false;
                }else{
                    document.querySelector(".contaSpanLargo").classList.replace("contSL2","contSL");
                    document.querySelector(".contaCaracterLargo").classList.replace("contaCLargo2","contaCLargo");
                    estadoDescriL=true;
                }  

            });

            //Boton para editar el nombre del producto
            btnEditar.addEventListener("click", (e)=>{

                btnCancelar.classList.replace("cancelIcon1", "cancelIcon2");
                btnGuardar.classList.replace("agreeIcon1", "agreeIcon2");
                btnEditar.setAttribute("disabled", "");
                btnEditar.classList.replace("btnActualizar1", "btnActualizar2");
                nombrePdtInput.removeAttribute("readonly");
                precioPdtInput.removeAttribute("readonly");
                descripPdtInput.removeAttribute("readonly");
                descrip2PdtInput.removeAttribute("readonly");
                ivaPdtInput.removeAttribute("readonly");
                descuPdtInput.removeAttribute("readonly");
                categoPdtInput.removeAttribute("disabled");
                stockPdtInput.removeAttribute("readonly");

                candadoIconC[0].classList.replace("candadoC", "candadoC2");
                candadoIconC[1].classList.replace("candadoC", "candadoC2");
                candadoIconC[2].classList.replace("candadoC", "candadoC2");
                candadoIconC[3].classList.replace("candadoC", "candadoC2");
                candadoIconC[4].classList.replace("candadoC", "candadoC2");
                document.querySelector(".candadoC3").classList.replace("candadoC3", "candadoC23");
                document.querySelector(".candadoC4").classList.replace("candadoC4", "candadoC24");
                document.querySelector(".candadoC5").classList.replace("candadoC5", "candadoC25");
                
                candadoIconA[0].classList.replace("candadoA2", "candadoA");
                candadoIconA[1].classList.replace("candadoA2", "candadoA");
                candadoIconA[2].classList.replace("candadoA2", "candadoA");
                candadoIconA[3].classList.replace("candadoA2", "candadoA");
                candadoIconA[4].classList.replace("candadoA2", "candadoA");
                document.querySelector(".candadoA23").classList.replace("candadoA23", "candadoA3");
                document.querySelector(".candadoA24").classList.replace("candadoA24", "candadoA4");
                document.querySelector(".candadoA25").classList.replace("candadoA25", "candadoA5");


            });

            btnCancelar.addEventListener("click", (e)=>{

                btnCancelar.classList.replace("cancelIcon2", "cancelIcon1");
                btnGuardar.classList.replace("agreeIcon2", "agreeIcon1");
                btnEditar.removeAttribute("disabled");
                btnEditar.classList.replace("btnActualizar2", "btnActualizar1");
                nombrePdtInput.setAttribute("readonly", "true");
                precioPdtInput.setAttribute("readonly", "true");
                descripPdtInput.setAttribute("readonly", "true");
                descrip2PdtInput.setAttribute("readonly", "true");
                ivaPdtInput.setAttribute("readonly", "true");
                descuPdtInput.setAttribute("readonly", "true");
                categoPdtInput.setAttribute("disabled", "");
                stockPdtInput.setAttribute("readonly", "true");

                candadoIconC[0].classList.replace("candadoC2", "candadoC");
                candadoIconC[1].classList.replace("candadoC2", "candadoC");
                candadoIconC[2].classList.replace("candadoC2", "candadoC");
                candadoIconC[3].classList.replace("candadoC2", "candadoC");
                candadoIconC[4].classList.replace("candadoC2", "candadoC");
                document.querySelector(".candadoC23").classList.replace("candadoC23", "candadoC3");
                document.querySelector(".candadoC24").classList.replace("candadoC24", "candadoC4");
                document.querySelector(".candadoC25").classList.replace("candadoC25", "candadoC5");
                
                candadoIconA[0].classList.replace("candadoA", "candadoA2");
                candadoIconA[1].classList.replace("candadoA", "candadoA2");
                candadoIconA[2].classList.replace("candadoA", "candadoA2");
                candadoIconA[3].classList.replace("candadoA", "candadoA2");
                candadoIconA[4].classList.replace("candadoA", "candadoA2");
                document.querySelector(".candadoA3").classList.replace("candadoA3", "candadoA23");
                document.querySelector(".candadoA4").classList.replace("candadoA4", "candadoA24");
                document.querySelector(".candadoA5").classList.replace("candadoA5", "candadoA25");

            });

            document.querySelector(".ai1").addEventListener("click", ()=>{
                
                let letraActual="";
                let estado="";
                let nombreC=nombrePdtInput.value;
                let precioC=precioPdtInput.value;
                let descri1 = document.querySelector(".contaCaracter255").textContent;

                if(document.querySelector(".mensajeE").classList.contains("mensajeErrorActualizar2")){
                    document.querySelector(".mensajeE").classList.replace("mensajeErrorActualizar","mensajeErrorActualizar2");
                    document.querySelector(".errorS").textContent="El campo de NOMBRE no puede estar vacío";
                }else{
                    document.querySelector(".mensajeE").classList.replace("mensajeErrorActualizar2","mensajeErrorActualizar1");
                    document.querySelector(".errorS").textContent="El campo de NOMBRE no puede estar vacío";
                }

                if(descri1==0){
                    document.querySelector(".mensajeEDC").classList.replace("mensajeErrorActualizarDC","mensajeErrorActualizarDC2");
                    document.querySelector(".errorSDC").textContent="El campo de la DESCRIPCIÓN CORTA no puede estar vacío";
                }


                if(nombreC==""){

                    if(!document.querySelector(".mensajeE").classList.contains("mensajeErrorActualizar2")){
                        document.querySelector(".mensajeE").classList.replace("mensajeErrorActualizar","mensajeErrorActualizar2");
                        document.querySelector(".errorS").textContent="El campo de NOMBRE no puede estar vacío";
                    }

                }else{

                    for1: for(let i=0; i<nombreC.length; i++){

                        letraActual=nombreC[i].toLowerCase();
    
                        if(letraActual===" "){
                            continue for1;
                        }
                        
                        for2: for(let e=0; e<letrasNumeros.length; e++){
    
                            if(letraActual!==letrasNumeros[e] ){
                                estado=false;
                                continue for2;
                            }else{
                                estado=true;
                                break for2;
                            }
    
                        }
    
                        if(estado!=false){
    
                            continue for1;
    
                        }else{
    
                            break for1;
    
                        }
    
                    };

                }

                if(precioC===""){

                    
                    if(!document.querySelector(".mensajeEPre").classList.contains("mensajeErrorActualizarPre2")){
                        document.querySelector(".mensajeEPre").classList.replace("mensajeErrorActualizarPre","mensajeErrorActualizarPre2");
                        document.querySelector(".errorSPre").textContent="El campo de PRECIO no puede estar vacío";
                    }else{
                        document.querySelector(".errorSPre").textContent="El campo de PRECIO no puede estar vacío";
                    };

                }else{

                    if(precioC!==""){

                        if(document.querySelector(".mensajeEPre").classList.contains("mensajeErrorActualizarPre2")){
                            document.querySelector(".mensajeEPre").classList.replace("mensajeErrorActualizarPre2","mensajeErrorActualizarPre");
                            document.querySelector(".errorSPre").textContent="El campo de PRECIO no puede estar vacío";
                        }else{
                            document.querySelector(".errorSPre").textContent="El campo de PRECIO no puede estar vacío";
                        };

                    

                        for1P: for(let i = 0; i<precioC.length; i++){
                            let numActualPre = precioC[i];
    
                            if(numActualPre===" "){
                                continue for1P;
                            }
    
                            for2P: for(let e = 0; e<numeros.length; e++){
                                if(numActualPre == numeros[e]){
                                    estadoPre=true;
                                    break for2P;
                                }else{
                                    estadoPre=false;
                                    continue for2P;
                                }
                            };
                            if(estadoPre==true){
                                estadoPre==true
                                continue for1P;
                            }else{
                                break for1P;
                            }
                        };

                    }

                }

                if(estado === true){
                    if(document.querySelector(".mensajeE").classList.contains("mensajeErrorActualizar2")){
                        document.querySelector(".mensajeE").classList.replace("mensajeErrorActualizar2","mensajeErrorActualizar");
                    }
                }

                if(estado === false){
                    document.querySelector(".mensajeE").classList.replace("mensajeErrorActualizar","mensajeErrorActualizar2");
                    document.querySelector(".errorS").textContent="El NOMBRE no puede llevar caracteres especiales";
                }

                if(estadoPre === false && precioC!=""){
                    document.querySelector(".mensajeEPre").classList.replace("mensajeErrorActualizarPre","mensajeErrorActualizarPre2");
                    document.querySelector(".errorSPre").textContent="El PRECIO no puede llevar letras o caracteres especiales";
                }

                if(parseInt(document.querySelector(".contaCaracter255").textContent) > 210){
                    document.querySelector(".mensajeEDC").classList.replace("mensajeErrorActualizarDC","mensajeErrorActualizarDC2");
                    document.querySelector(".errorSDC").textContent="la DESCRIPCIÓN CORTA excede el número de caracteres permitidos";
                }else{
                    if(document.querySelector(".mensajeEDC").classList.contains("mensajeErrorActualizarDC2")){
                        document.querySelector(".mensajeEDC").classList.replace("mensajeErrorActualizarDC2","mensajeErrorActualizarDC");
                        document.querySelector(".errorSDC").textContent="#####";
                    }
                }

                if(parseInt(document.querySelector(".contaSpanLargo").textContent) > 530){
                    document.querySelector(".mensajeEDL").classList.replace("mensajeErrorActualizarDL","mensajeErrorActualizarDL2");
                    document.querySelector(".errorSDL").textContent="la DESCRIPCIÓN LARGA excede el número de caracteres permitidos";
                }else{
                    if(document.querySelector(".mensajeEDL").classList.contains("mensajeErrorActualizarDL2")){
                        document.querySelector(".mensajeEDL").classList.replace("mensajeErrorActualizarDL2","mensajeErrorActualizarDL");
                        document.querySelector(".errorSDL").textContent="#####";
                    }
                }  

            });

            //Evento que despliega una ventana emergente para confirmar la eliminación de un item (SweetAlert).
            btnEliminar.addEventListener("click", (e)=>{

                e.preventDefault();
                swal.fire({
                    title: "Se va a eliminar un producto",
                    text: "No se podrá recuperar la información, ¿está seguro de querer continuar?", 
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Eliminar Producto",
                    cancelButtonText: "Cancelar",
                }).then((value)=>{
                    if (value.isConfirmed) {
                        formm.submit();
                    }else {
                        return false;
                    }
                });

                
            
            });


            nombrePdtInput.addEventListener("input", (e)=>{

            });


        });

    }


//<-- actuDelete.php FIN -->



//<-- pedidoExitoso.php -->



if(document.querySelector(".pedidoExitosoHTML")!=null){

    const navBarUl = document.querySelector(".Header_Nav-UL");

    let tipoUser = document.querySelector(".pedidoExitosoClass1").value;

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

}



//<-- pedidoExitoso.php FIN -->



//<-- continuarPCarrito.php -->

    if(document.querySelector(".contCarritoHTML")!=null){

        const navBarUl = document.querySelector(".Header_Nav-UL");

        let tipoUser = document.querySelector(".class1CCarrito").value;

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

    }

//<-- continuarPCarrito.php FIN -->




//<-- Productos.php INICIO -->

    //Comprobamos si la página se encuentra en Productos.php.
    if(document.querySelector("#productosClientes")!==null){

        
        //Al cargar la página se ejecutará lo siguiente:
        window.addEventListener("load", ()=>{

            //Tomando objetos del DOM:

                const categoriaSpan = document.querySelector(".spanCategoria"); //SpanCategoria
                const tipoSpan = document.querySelector(".spanTipo"); //SpanTipo
                const categoriaInputPdt = document.querySelector("#slt_categoria"); //selectCategoria
                const tipoInput = document.querySelector("#slt_tipo"); //selectTipo
                const precioInput = document.querySelector("#slt_precio"); //selectPrecio
                const navBarUl = document.querySelector(".Header_Nav-UL"); //UL de la Barra de navegación
                const bEspecificaPdt = document.querySelector(".bEspecificaPdt"); //Input Búsqueda Específica
                const productoContain = document.querySelector("#product_contain");//Contenedor de Productos

            //-----------------------------------------------------------------

            //Variables Globales:

            //-----------------------------------------------------------------


            //Ocultar y Mostrar Modal (Carrito de compras)

                const botonCarrito = document.querySelector(".baseCarrito");

                botonCarrito.addEventListener("click", ()=>{
                    document.querySelector(".modalB").classList.replace("modalBase2", "modalBase");
                    document.querySelector(".fondoNModal").addEventListener("click", ()=>{
                        document.querySelector(".modalB").classList.replace("modalBase", "modalBase2");
                        document.querySelector(".fondoNModal").classList.replace("fondoNegroModal", "fondoNegroModal2");
                    });
                    document.querySelector(".btnX").addEventListener("click", ()=>{
                        document.querySelector(".modalB").classList.replace("modalBase", "modalBase2");
                        document.querySelector(".fondoNModal").classList.replace("fondoNegroModal", "fondoNegroModal2");
                    });
                    document.querySelector(".fondoNModal").classList.replace("fondoNegroModal2", "fondoNegroModal");
                })

            //----------------------------------------------------------------


            //(Cambio Dinámico) Definiendo el tipo de usuario para cambiar el contenido del UL en la barra de navegación:

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
                        document.querySelector(".baseCarrito2").style.display = "none";

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
                            document.querySelector(".baseCarrito2").style.display = "none";
                        }

                    }
                    
                }

            
            //-----------------------------------------------------------------------------------------------
            
            

            //----------------------------------------------------------------------------------------------------


                function obtenerDataGeneral(){

                    let FormPdtGeneral = new FormData();
                    let tipoUser = document.querySelector(".class1").value;

                    $queryGeneral="SELECT * FROM `producto` INNER JOIN `productoDetail` ON `producto`.`Id_productoDetail` = `productoDetail`.`Id_productoDetail`"

                    FormPdtGeneral.append("pdtDataGeneral", $queryGeneral);
                    FormPdtGeneral.append("tipoUser", tipoUser);
                    
                    fetch("http://localhost/kuitmine/loadDataProduct.php", {
                        method: "POST",
                        body: FormPdtGeneral
                    }).then(response => response.json())
                    .then(data => {
                        productoContain.innerHTML=data
                    }).catch(err => console.log(err));

                }

                obtenerDataGeneral()


            //----------------------------------------------------------------------------------------------------



            //Enviar Producto a carritoBase.php con click sobre el voton de "Agregar al Carrito"

                
                

            //



            //(Funcion 1) Obtener todos los productos con FETCH para el contenedor de productos
                
                function obtenerDataPdtNombre(){


                    let bEspecificaPdtV = bEspecificaPdt.value;
                    let tipoUser = document.querySelector(".class1").value;
                    if(bEspecificaPdtV!==""){
                        categoriaInputPdt.value="Sin Dato"
                        tipoInput.value="Sin Dato"
                        precioInput.value="Sin Dato"
                    }

                    let FormPdtXNombre = new FormData();

                    FormPdtXNombre.append("pdtEspecificoN", bEspecificaPdtV);
                    FormPdtXNombre.append("tipoUser", tipoUser);

                   
                    fetch("http://localhost/kuitmine/loadDataProduct.php", {
                        method: "POST",
                        body: FormPdtXNombre
                    }).then(response => response.json())
                    .then(data => {
                        productoContain.innerHTML=data
                        if(categoriaInputPdt.options[categoriaInputPdt.selectedIndex].text==="Sin Dato"){
                            categoriaSpan.textContent = "Categoría";
                        }else{
                            categoriaSpan.textContent = categoriaInputPdt.options[categoriaInputPdt.selectedIndex].text;
                        }  
                        if(tipoInput.options[tipoInput.selectedIndex].text==="Sin Dato"){
                            tipoSpan.textContent = "Tipo";
                        }else{
                            tipoSpan.textContent = tipoInput.options[tipoInput.selectedIndex].text;
                        }  
                    }).catch(err => console.log(err));


                }

            //----------------------------------------------------------------------------------------
            

            //(Función 2) Obtener datos con FETCH para los select Categoria y Tipo

                function obtenerDataTipo(){

                    let tipoUser = document.querySelector(".class1").value;

                    let categoriaPdtV = categoriaInputPdt.options[categoriaInputPdt.selectedIndex].text;

                    let formCategoriaPdt = new FormData(); 

                    formCategoriaPdt.append("categoriaPdtPPP", categoriaPdtV);
                    formCategoriaPdt.append("tipoUser", tipoUser);

                    //Este fetch enviara a loadDataProduct.php el valor del select categoria para realizar la consulta
                    //(Conseguirá los tipos de la categoria para rellenar el siguiente Select)
                    fetch("http://localhost/kuitmine/loadDataProduct.php", {
                        method: "POST",
                        body: formCategoriaPdt
                    }).then(response => response.json())
                    .then(data => {
                        tipoInput.innerHTML = data; //llenamos el select Tipo con la respuesta de la consulta
                        if(tipoInput.options[tipoInput.selectedIndex].text==="Sin Dato"){
                            tipoSpan.textContent = "Tipo";
                        }else{
                            tipoSpan.textContent = tipoInput.options[tipoInput.selectedIndex].text;
                        }  
                    }).catch(err => console.log(err));

                }    

            //--------------------------------------------------------------------------------------------


            //(Función 3) Cambio del textContent de dos etiquetas Span segun el valor de dos input select

                tipoInput.addEventListener("input", (e)=>{

                    if(tipoInput.options[tipoInput.selectedIndex].text==="Sin Dato"){
                        tipoSpan.textContent = "Tipo";
                    }else{
                        tipoSpan.textContent = tipoInput.options[tipoInput.selectedIndex].text;
                    }  

                    let tipoPdtV = tipoInput.options[tipoInput.selectedIndex].text;
                    let precioPdtV = precioInput.options[precioInput.selectedIndex].text;
                    let categoriaPdtV = categoriaInputPdt.options[categoriaInputPdt.selectedIndex].text;
                    let tipoUser = document.querySelector(".class1").value;

                    let formTipoPdt = new FormData(); 

                    formTipoPdt.append("tipoPdtPPP", tipoPdtV);
                    formTipoPdt.append("precioPdtPPP", precioPdtV);
                    formTipoPdt.append("categoPdtPPP", categoriaPdtV);
                    formTipoPdt.append("tipoUser", tipoUser);

                    fetch("http://localhost/kuitmine/loadDataProduct.php", {
                        method: "POST",
                        body: formTipoPdt
                    }).then(response => response.json())
                    .then(data => {
                        productoContain.innerHTML = data; //llenamos el select Tipo con la respuesta de la consulta
                        if(tipoInput.options[tipoInput.selectedIndex].text==="Sin Dato"){
                            tipoSpan.textContent = "Tipo";
                        }else{
                            tipoSpan.textContent = tipoInput.options[tipoInput.selectedIndex].text;
                        }  
                    }).catch(err => console.log(err));

                });

            //---------------------------------------------------------------------------------------------


            //(Funcion 4) Cambio Dinámico del select "Tipo" segun el valor del select "Categoria" con FETCH

                categoriaInputPdt.addEventListener("input", ()=>{
                    if(categoriaInputPdt.options[categoriaInputPdt.selectedIndex].text==="Sin Dato"){
                        categoriaSpan.textContent = "Categoría";
                    }else{
                        categoriaSpan.textContent = categoriaInputPdt.options[categoriaInputPdt.selectedIndex].text;
                    }  
                    obtenerDataTipo()

                    let tipoPdtV = tipoInput.options[tipoInput.selectedIndex].text;
                    let precioPdtV = precioInput.options[precioInput.selectedIndex].text;
                    let categoriaPdtV = categoriaInputPdt.options[categoriaInputPdt.selectedIndex].text;
                    let tipoUser = document.querySelector(".class1").value;

                    let formTipoPdt = new FormData(); 

                    formTipoPdt.append("tipoPdtPPP", tipoPdtV);
                    formTipoPdt.append("precioPdtPPP", precioPdtV);
                    formTipoPdt.append("categoPdtPPP", categoriaPdtV);
                    formTipoPdt.append("tipoUser", tipoUser);

                    fetch("http://localhost/kuitmine/loadDataProduct.php", {
                        method: "POST",
                        body: formTipoPdt
                    }).then(response => response.json())
                    .then(data => {
                        productoContain.innerHTML = data; //llenamos el select Tipo con la respuesta de la consulta
                        if(tipoInput.options[tipoInput.selectedIndex].text==="Sin Dato"){
                            tipoSpan.textContent = "Tipo";
                        }else{
                            tipoSpan.textContent = tipoInput.options[tipoInput.selectedIndex].text;
                        }  
                    }).catch(err => console.log(err));

                })
                
            //---------------------------------------------------------------------------------------------


            //(Funcion 5)----------------------------------------------------------------------------------------

                precioInput.addEventListener("input", ()=>{

                    let tipoPdtV = tipoInput.options[tipoInput.selectedIndex].text;
                    let precioPdtV = precioInput.options[precioInput.selectedIndex].text;
                    let categoriaPdtV = categoriaInputPdt.options[categoriaInputPdt.selectedIndex].text;
                    let tipoUser = document.querySelector(".class1").value;

                    let formTipoPdt = new FormData(); 

                    formTipoPdt.append("tipoPdtPPP", tipoPdtV);
                    formTipoPdt.append("precioPdtPPP", precioPdtV);
                    formTipoPdt.append("categoPdtPPP", categoriaPdtV);
                    formTipoPdt.append("tipoUser", tipoUser);

                    fetch("http://localhost/kuitmine/loadDataProduct.php", {
                        method: "POST",
                        body: formTipoPdt
                    }).then(response => response.json())
                    .then(data => {
                        productoContain.innerHTML = data; //llenamos el select Tipo con la respuesta de la consulta
                        if(tipoInput.options[tipoInput.selectedIndex].text==="Sin Dato"){
                            tipoSpan.textContent = "Tipo";
                        }else{
                            tipoSpan.textContent = tipoInput.options[tipoInput.selectedIndex].text;
                        }  
                    }).catch(err => console.log(err));

                });


            //---------------------------------------------------------------------------------------------------
            

            //(Funcion 6) 

                bEspecificaPdt.addEventListener("input", ()=>{
                    obtenerDataPdtNombre();
                })    

            //-----------------------------------------------------------------------------------------------


        });

    }

//<-- Productos.php FIN -->


