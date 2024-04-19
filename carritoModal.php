
<!--- MODAL CARRITO -->

    <div class="fondoNegroModal2 fondoNModal"></div>
    <div class="modalBase2 modalB">
        <div class="btnX">X</div>
        <span class="MicarritoSpan">Mi carrito</span>
        <div class="listaDiv">
            <ul class="ul">
            <?php
                    if(isset($_SESSION['carrito'])){
                        $total=0;
                        for($i = 0; $i <= count($carritoCompras)-1; $i ++) {
                            if(isset($carritoCompras[$i])){
                            if($carritoCompras[$i]!=NULL){
                ?>
                <li>
                    <div>
                        <span>Cantidad: <?php echo $carritoCompras[$i]['CantidadPdtCar']; ?> | <?php echo $carritoCompras[$i]["NombrePdtCar"]; ?></span><div>$<?php echo ($carritoCompras[$i]["PrecioPdtCat"]*$carritoCompras[$i]["CantidadPdtCar"]); ?></div>
                    </div>
                </li>
                <?php
                    $total = $total + ($carritoCompras[$i]["PrecioPdtCat"] * $carritoCompras[$i]["CantidadPdtCar"]);
                }
                }
                }
                }
                ?>
                <li class="liTotal">
                    <div>
                        <span class="totalMoneda">Total(COP): </span>
                        <span class="totalNumero">$<?php
                        if(isset($_SESSION["carrito"])){
                        $total = 0;
                        for($i=0; $i<=count($carritoCompras)-1; $i++){
                            if(isset($carritoCompras[$i])){
                        if($carritoCompras[$i]!=null){
                        $total = $total + ($carritoCompras[$i]["PrecioPdtCat"]*$carritoCompras[$i]["CantidadPdtCar"]);
                        }
                        }}}
                        if(!isset($total)){ $total = 0; } else{$total = $total; }
                        echo $total;
                        ?>
                        </span>
                    </div>
                </li>
            </ul>
        </div>
        <div class="modalBtnsDiv">
            <a href="continuarPCarrito.php" class="botonCPEDIDO">Continuar Pedido</a>
            <a href="borrarCarrito.php" class="vaciarCarrito">Vaciar Carrito</a>
        </div>
    </div>

<!--- MODAL CARRITO FIN -->