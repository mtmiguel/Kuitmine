<?php include("conexion.php");?>
<?php
    session_start();
    $correo=0;
    $contrasenia=0;

    $conn=new conexion("kuitmine");
    $sql="SELECT * FROM `usuario` INNER JOIN `detallesusuario` ON `usuario`.`Id_detallesUsuario` = `detallesusuario`.`Id_detallesUsuario` ORDER BY `Id_usuario` DESC";
    $result=$conn->consultar($sql);


    if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_REQUEST["btnEntrar"])){
        $correo=$_POST["correo"];
        $contrasenia=$_POST["contrasenia"];
        foreach($result as $resu){
            if($resu['E_mail']===$correo){
                $correo=true;
                $id = $resu['Id_usuario'];
                if($resu['Contrasenia']===$contrasenia){
                    $contrasenia=true;
                    break;
                }else{
                    continue;
                }
            }
        }
        if($correo!==true){
            echo "Usuario NO encontrado ";
        }else{
            echo "Usuario encontrado ";
            if($contrasenia===true){
                echo "contraseña encontrada ";
                $_SESSION['iniciado']=$resu['Id_usuario'];
                $_SESSION['tipoUsuario']=$resu['Rol'];
                if($_SESSION['tipoUsuario']==="Administrador" || $_SESSION['tipoUsuario']==="Empleado"){
                    header("location:Administracion.php");
                }else{
                    if($_SESSION['tipoUsuario']==="Cliente"){
                        header("location:Index.php");
                    }
                }
            }else{
                echo "contraseña NO encontrada ";
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en" tema="dia">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inicio de Sesión</title>
        <link rel="stylesheet" href="estilos\inicioSesion.css">
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
            <div class="main_divContImg1">
                <img src="img\imgFondo3.jpg" alt="Imagen de fondo">
            </div>
            <div class="main_formContain">
                <form  action="InicioSesion.php" method="post" id="formIngresar">
                    <div class="formDivIcon">
                        <img src="img\IconoInicio.svg" alt="Icono Usuario">
                    </div>
                    <span class="spanIniSesi">Inicio de Sesión</span>
                    <div class="formDiv divCorreo">
                        <input type="text" name="correo" id="correo" required>
                        <span class="placeCorreo">Correo</span>
                    </div>
                    <div class="formDiv divContra">
                        <input type="password" name="contrasenia" id ="contrasenia" required>
                        <span class="placeContra">Contraseñia</span>
                    </div>
                    <div class="formDiv divBtnEntrar">
                        <button type="submit" name="btnEntrar" form="formIngresar">Entrar</button>
                    </div>
                    <div class="formDiv divCambiContra">
                        <span>¿Olvidó la contraseña? <a href="">Cambiar Aquí</a></span>
                    </div>
                </form>
                <div class="divRegistrese">
                    <span>¿No tienes cuenta? <a href="registro.php">Regístrate</a></span>
                </div>
            </div>
            <div class="main_divContImg2">
                <img src="img\imgFondoProducts - copia.jpg" alt="Imagen de fondo">
            </div>
        </main>
        <footer class="footer">
            <div class="footer_content">
            </div>
            <span class="copy">©2023 Dynaroot - Todos los Derechos Reservados</span>
        </footer>
        <script src="js\app4.js"></script>
    </body>
</html>