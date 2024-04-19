<?php


   if(isset($_SESSION['carrito'])){
        $carritoCompras = $_SESSION['carrito'];
   }


   if(isset($_SESSION['carrito'])){

        for($i=0; $i<=count($carritoCompras)-1; $i++){
                if(isset($carritoCompras[$i])){
                if($carritoCompras[$i]!=null){
                if(!isset($carritoCompras["CantidadPdtCar"])){$carritoCompras["CantidadPdtCar"] = 0;}else{$carritoCompras["CantidadPdtCar"] = $carritoCompras["CantidadPdtCar"];}
                $totalCantidad = $carritoCompras["CantidadPdtCar"];
        $totalCantidad++;
        if(!isset($totalCantidad2)){$totalCantidad2 = 0 ;}else{$totalCantidad2 = $totalCantidad2;}
        $totalCantidad2 += $totalCantidad;
        }}}

   }

   //declaramos variables
   if(!isset($totalCantidad2)){
        $totalCantidad2 ='';
   }else{
        $totalCantidad2 = $totalCantidad2;
   }

?>


<!-- CARRITO BARRA -->

    <div title="Mi Carrito" class="baseCarrito" style="cursor:pointer; &:hover{& div{& svg{fill:#ebaa76}}}; z-index: 1000; position: absolute; top: 20.5rem; left: 65rem; height: max-content; width:max-content; display: flex;">
        <div class="baseCarrito2" style=" height: max-content; width:4rem; display: flex; justify-content: center; align-items: center;">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 468.58 326.36"><g id="Capa_2" data-name="Capa 2"><g id="Capa_1-2" data-name="Capa 1"><path d="M467.27,92.57c-4.51-16.24-18.13-26.28-35.79-26.28q-152.66,0-305.29.09c-4.61,0-6.81-1.25-8.09-5.8q-5.05-18-11-35.77C102.4,10.72,92.44,1.37,77.71.63,55-.51,32.09.22,9.27.36,4,.39.37,4.41,0,9.66-.43,16.9,4,21.1,12.45,21.14c20.15.09,40.3,0,60.46.08,7.62,0,12.09,3.33,14.52,10.55,1.75,5.2,3.28,10.47,4.9,15.72Q121,140.23,149.58,233c2.26,7.34,5.71,14,11.93,18.59,3.35,2.48,3.63,3.89.89,7.26a41,41,0,0,0-2.5,48.47,41.53,41.53,0,0,0,44.79,17.83c26.3-6.27,39.3-35.5,26.72-60.09-2.53-4.94-2.51-5,3.06-5q27.22,0,54.46,0c18.32,0,36.64.09,55-.06,4.37,0,4.87.94,2.58,4.61a36.51,36.51,0,0,0-5.31,17.52,41.59,41.59,0,1,0,74-23.17c-2.19-2.78-1.64-3.91,1-5.77a34.1,34.1,0,0,0,13.22-18.27q18.91-61.8,37.83-123.59A33,33,0,0,0,467.27,92.57ZM194.09,305a20.25,20.25,0,0,1,.07-40.5,20.25,20.25,0,0,1-.07,40.5Zm187.63,0a20.25,20.25,0,0,1,.1-40.5,20.25,20.25,0,1,1-.1,40.5Zm64.19-195.61Q428,167.69,410.08,226c-3,9.68-7.16,12.84-17.44,12.84q-102.9,0-205.81,0c-10.13,0-14.53-3.29-17.39-12.94Q149.76,159.54,130.13,93.2c-1.74-5.86-1.71-5.87,4.15-5.87H283.14q73.19,0,146.37,0C444.09,87.33,450.17,95.55,445.91,109.41Z" /><path d="M376.94,142.4a21.06,21.06,0,0,0-4-.14q-76.4,0-152.8,0a21.44,21.44,0,0,0-5.45.4c-3.32.89-4.9,3.23-4.61,6.74a5.81,5.81,0,0,0,5.3,5.68,26.84,26.84,0,0,0,4.49.13h152.3a29.2,29.2,0,0,0,4.49-.1c3.49-.57,6-2.58,6-6.2S380.48,143.09,376.94,142.4Z" /><path d="M364.74,186.15c-1,0-2-.05-3-.05H228.42c-1,0-2,0-3,0-3.91.22-6.33,2.16-6.26,6.21s2.63,5.86,6.51,6c1.5,0,3,0,4.5,0H360.5c1.5,0,3,0,4.49-.07,3.8-.27,5.89-2.57,5.81-6.17S368.55,186.31,364.74,186.15Z"/></g></g></svg>
        </div>
        <span class="cantEnCarritoSpan" style="font-size: 1.4rem; font-family: 'Poppins Regular', sans-serif; font-weight:800; margin-left: .2rem;"><?php echo $totalCantidad2; ?></span>
    </div>

<!-- CARRITO BARRA FIN-->