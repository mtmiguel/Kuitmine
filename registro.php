<?php require("conexion.php")?>
<?php

    $conn = new conexion("kuitmine");

    date_default_timezone_set('America/Bogota');

    $fechaActual = date("d-m-Y");
    $horaActual = date("h:i:s");

    if($_SERVER["REQUEST_METHOD"] === "POST"){
        $Nombres = $_POST["Nombres"];
        $Apellidos = $_POST["Apellidos"];
        $Sexo = $_POST["Inputsexo"];
        $F_nacimiento = $_POST["f_naci"];
        $F_union = $_POST["f_union"];
        $E_civil = $_POST["InputE"];
        $Direccion = $_POST["Direccion"];
        $Telefono = $_POST["Telefono"];
        $E_mail = $_POST["e_mail"];
        $Ndocu = $_POST["Ndocu"];
        $tipoD = $_POST["tDocumento"];
        $Rol = $_POST["userRol"];
        $Contrasenia = $_POST["Contrasenia"];
        $Pclave = $_POST["pClave"];

        if($Rol == "Cliente Común"){
            $sql = "INSERT INTO `tipodocumento` (`n_documento`, `tipo_documento`) VALUES ($Ndocu, '$tipoD')";
            $result = $conn->ejecutar($sql);

            $sql = "INSERT INTO `detallesusuario` (`Sexo`, `f_nacimiento`, `Direccion`, `Celular`, `E_mail`, `f_union`, `e_civil`, `Id_tipoDocumento`)
            VALUES ('$Sexo', '$F_nacimiento', '$Direccion', '$Telefono', '$E_mail', '$F_union', '$E_civil', $result)";
            $result2 = $conn->ejecutar($sql);

            $sql = "INSERT INTO `usuario` (`Nombres`, `Apellidos`, `Rol`, `Contrasenia`, `palabraClave`, `cuentaE`, `Id_detallesUsuario`)
            VALUES ('$Nombres', '$Apellidos', '$Rol', '$Contrasenia', '$Pclave', 'Activa', $result2)";
            $result3 = $conn->ejecutar($sql);
            header("location:inicioSesion.php");
        }else{
            if($Rol == "Administrador"){
                
            }
        }

        
    }

?>

<!DOCTYPE html>
<html lang="en" tema="dia">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
        <link rel="stylesheet" href="estilos\registro.css">
    </head>
    <body class="body">
        <header class="Header">
            <div class="Header_divLogo">
                <a href="index.php" title="Inicio"><img src="img\logoPequeño.png" alt="Logo kuitmine" class="divLogo-imgLogo"></a>
            </div>
            <div class="Header_divNav">
                <nav class="divNav-nav">
                    <ul class="nav-UL">
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="productos.php">Productos</a></li>
                        <li><a href="contacto.php">Contacto</a></li>
                        <div class="ul-divIniRegis">
                            <li class="liIni"><a href="inicioSesion.php">Iniciar Sesion</a></li>
                            <li class="liResg"><a href="registro.php">Registro</a></li>
                        </div>
                    </ul>
                </nav>
            </div>
        </header>
        <main class="main">
            <div class="main_divRegistro">
                <span class="spanRegistro">Registro del Usuario</span>
                <div class="regis_divFormContain">   
                    <form action="Registro.php" method="POST" enctype="multipart/form-data" id="formRegistro">      
                        <div class="divDatosP">
                            <span class="dPspan">Datos Personales</span>
                            <div>
                                <span>Nombre</span>
                                <input type="text" class="Nombres"  name="Nombres" placeholder="Escriba aquí">
                            </div>
                            <div>
                                <span>Apellido</span>
                                <input type="text" class="Apellidos" name="Apellidos" placeholder="Escriba aquí">
                            </div>
                            <span>Género</span>
                            <select name="Inputsexo" id="Inputsexo">
                                <option>Masculino</option>
                                <option>Femenino</option>
                                <option>Otro</option>
                            </select>
                            <div>
                                <span>Fecha de Nacimiento</span>
                                <input type="text" class="f_nacimiento" name="f_naci" placeholder="Escriba aquí">
                            </div>
                            <input type="hidden" name="f_union" class="f_union" value="<?php echo $fechaActual?>">
                            <span>Estado Civil</span>
                            <select name="InputE" id="InputE">
                                <option>Soltero/a</option>
                                <option>Casado/a</option>
                            </select>
                        </div>
                        <div class="divDatosC">
                            <span class="dCspan">Datos de Contacto</span>
                            <div>
                                <span>Dirección</span>
                                <input type="text" class="Direccion" name="Direccion" placeholder="Escriba aquí">
                            </div>
                            <div>
                                <span>Número de teléfono</span>
                                <input type="number" class="Telefono" name="Telefono" placeholder="Escriba aquí">
                            </div>
                            <div>
                                <span>Correo Electrónico</span>
                                <input type="text" class="e_mail" name="e_mail" placeholder="Escriba aquí">
                            </div>
                        </div>
                        <div class="divDatosL">
                            <span class="dLspan">Datos Laborales</span>
                            <div>
                                <span>Documento</span>
                                <select name="tDocumento" id="tDocumento">
                                    <option>NIT</option>
                                    <option>Cédula de Identidad</option>
                                </select>
                                <input type="number" class="nDocumento" name="Ndocu" placeholder="Escriba aquí">
                            </div>
                            <div>
                                <span>Elija su rol</span>
                                <select name="userRol" id="userRol">
                                    <option disabled>Administrador</option>
                                    <option disabled>Empleado</option>
                                    <option>Cliente Común</option>
                                </select>
                            </div>
                        </div>
                        <div class="divDatosS">
                            <span class="dSspan">Seguridad</span>
                            <div>
                                <span>Contraseña</span>
                                <input type="password" class="contrasenia" name="Contrasenia" placeholder="Escriba aquí">
                            </div>
                            <div>
                                <span>Palabra Clave</span>
                                <input type="text" class="pClave" name="pClave" placeholder="Escriba aquí">
                            </div>
                        </div>
                        <div class="btnEnviarContain">
                            <button type="submit" name="btnEnviar" form="formRegistro">Registrarse</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="main_divImg">
                <img src="img\imgFondoProducts.jpg" alt="Imagen de fondo">
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