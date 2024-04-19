<?php

    //Conexión a la base de datos kuitmine:

        require 'connDataAdmin.php';

    //-----------------------------------------------------------------------

    $campo = isset($_POST["campoBEspe"]) ? $conn->real_escape_string($_POST["campoBEspe"]) : null;
    $categoria = isset($_POST["categoria"]) ? $conn->real_escape_string($_POST["categoria"]) : null;
    $precio = isset($_POST["precio"]) ? $conn->real_escape_string($_POST["precio"]) : null;
    $ventas = isset($_POST["ventas"]) ? $conn->real_escape_string($_POST["ventas"]) : null;

    $where = '';
    $order = 'ORDER BY producto.Id_producto DESC';


    if($campo != null){
        $where = " WHERE producto.Nombre LIKE '%".$campo."%'";
    };


    if($categoria != "Sin Dato" && ($campo == null || $campo == "")){
        $where = " WHERE producto.Categoria LIKE '%".$categoria."%'";
    };


    if($ventas == "Mas Vendido" && $precio == "Sin Dato"){
        $order = "ORDER BY kuitmine.productodetail.n_ventas DESC";
    }else{
        if($ventas == "Menos Vendido" && $precio == "Sin Dato"){
            $order = "ORDER BY kuitmine.productodetail.n_ventas ASC";
        }
    }

    if($ventas == "Mas Vendido" && $precio == "Mayor Precio"){
        $order = "ORDER BY productodetail.n_ventas DESC, producto.Precio DESC";
    }else{
        if($ventas == "Mas Vendido" && $precio == "Menor Precio"){
            $order = "ORDER BY productodetail.n_ventas DESC, producto.Precio ASC";
        }else{
            if($ventas == "Menos Vendido" && $precio == "Mayor Precio"){
                $order = "ORDER BY productodetail.n_ventas ASC, producto.Precio DESC";
            }else{
                if($ventas == "Menos Vendido" && $precio == "Menor Precio"){
                    $order = "ORDER BY productodetail.n_ventas ASC, producto.Precio ASC"; 
                }
            }
        }
    }


    if($precio == "Mayor Precio" && $ventas == "Sin Dato"){
        $order = "ORDER BY producto.Precio DESC";
    }else{
        if($precio == "Menor Precio" && $ventas == "Sin Dato"){
            $order = "ORDER BY producto.Precio ASC";
        }
    }


    if($precio == "Mayor Precio" && $ventas=="Mas Vendido"){
        $order = "ORDER BY producto.Precio DESC, productoDetail.n_ventas DESC";
    }else{
        if($precio == "Mayor Precio" && $ventas=="Menos Vendido"){
            $order = "ORDER BY producto.Precio DESC, productoDetail.n_ventas ASC";
        }else{
            if($precio == "Menor Precio" && $ventas=="Mas Vendido"){
                $order = "ORDER BY producto.Precio ASC, productoDetail.n_ventas DESC";
            }else{
                if($precio == "Mayor Precio" && $ventas=="Menos Vendido"){
                    $order = "ORDER BY producto.Precio DESC, productoDetail.n_ventas ASC";
                }
            }
        }
    }

    $sql="SELECT * FROM `producto` INNER JOIN `productodetail`
        ON `producto`.`Id_productodetail` = `productoDetail`.`Id_productoDetail` $where $order";

    $result = $conn->query($sql);
    $num_rows = $result->num_rows;


    $html="";


    if($num_rows>0){
        while($row = $result->fetch_assoc()){
            $html .='<button class="btnProduct" title="Ver Producto" type="submit" form="anun'.$row["Id_producto"].'">
                        <div class="anuncio">
                            <div class="anun-imgContain">
                                <img src="imgSubidas/'.$row["imagenPrin"].'" alt="Imágen Producto" class="anun-img">
                            </div>
                            <div class="anun-contenido">
                                <span class="anun-titulo">'.$row["Nombre"].'</span>
                                <span class="anun-precio">'.$row["Precio"].'</span>
                                <div class="anun-calificacion"></div>
                                <div class="anun-decrip">'.$row["Descripcion"].'</div>
                            </div>
                        </div>
                        <form action="actuDelete.php" method="POST" id="anun'.$row["Id_producto"].'" name="anun'.$row["Id_producto"].'">
                            <input type="hidden" value="'.$row["Id_producto"].'" name="Idproducto">
                        </form>
                    </button>';
        }
    }else{
        $html .= "Productos NO Encontrados";
    }

    echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>