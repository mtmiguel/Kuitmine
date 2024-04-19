<?php

    session_start();

    include("carritoBase2.php");
    //aqui empieza el carrito

    if(isset($_SESSION['carrito']) || isset($_POST['NombreCarrito'])){
        $variableId = $_POST["Id22"];
        if(isset($_SESSION['carrito'])){
            $carritoCompras = $_SESSION['carrito'];
            if(isset($_POST['NombreCarrito'])){
                $nombreCar = $_POST["NombreCarrito"];
                $categoCarrito = $_POST["CategoCarrito"];
                $PrecioCarrito = $_POST["PrecioCarrito"];
                $IvaCarrito = $_POST["IvaCarrito"];
                $DescuCarrito = $_POST["DescuCarrito"];
                $ImagenCarrito = $_POST["ImagenCarrito"];
                $referenciaCarrito = $_POST["referenciaCarrito"];
                $cantidadCarrito = $_POST["cantidadCarrito"];
                $donde=-1;
                if($donde!=-1){
                    $cuanto = $carritoCompras[$donde]["cantidadCarrito"] + $cantidadCarrito;
                    $carritoCompras[$donde]=array("NombrePdtCar"=>$nombreCar, "PrecioPdtCat"=>$PrecioCarrito, "CantidadPdtCar"=>$cuanto, "refPdtCar"=>$referenciaCarrito, "ImgPdtPrin"=>$ImagenCarrito);
                }else{
                    $carritoCompras[]=array("NombrePdtCar"=>$nombreCar, "PrecioPdtCat"=>$PrecioCarrito, "CantidadPdtCar"=>$cantidadCarrito, "refPdtCar"=>$referenciaCarrito, "ImgPdtPrin"=>$ImagenCarrito);
                }
                
            }
        }else{
            $nombreCar = $_POST["NombreCarrito"];
            $categoCarrito = $_POST["CategoCarrito"];
            $PrecioCarrito = $_POST["PrecioCarrito"];
            $IvaCarrito = $_POST["IvaCarrito"];
            $DescuCarrito = $_POST["DescuCarrito"];
            $ImagenCarrito = $_POST["ImagenCarrito"];
            $referenciaCarrito = $_POST["referenciaCarrito"];
            $cantidadCarrito = $_POST["cantidadCarrito"];
            $carritoCompras[]=array("NombrePdtCar"=>$nombreCar, "PrecioPdtCat"=>$PrecioCarrito, "CantidadPdtCar"=>$cantidadCarrito, "refPdtCar"=>$referenciaCarrito, "ImgPdtPrin"=>$ImagenCarrito);
        }



        if(isset($_POST["CantPdtActu"])){
            $idActu= $_POST["IdProductoActu"];
            $cuantos = $_POST["CantPdtActu"];
            if($cuantos<1){
                $carritoCompras[$idActu]=null;
            }else{
                $carritoCompras[$idActu]["CantidadPdtCar"]=$cuantos;
            }
        }


        if(isset($_POST['deleteItem'])){
            $idDelete = $_POST['deleteItem'];
            $carritoCompras[$idDelete]=null;
        }


        $_SESSION['carrito']=$carritoCompras;

    }

    header("location: ".$_SERVER['HTTP_REFERER']."");

?>