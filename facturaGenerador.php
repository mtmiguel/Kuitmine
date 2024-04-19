<?php include("conexion.php");?>
<?php

    //Recibimos los Datos de la venta.
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $NombreC = $_POST["nombre"];
        $DireccionE = $_POST["direccion"];
        $fechaEF = $_POST["fecha"];
        $fechaVF = $_POST["fechaVen"];
        $cantidadPro = $_POST["cantidad"];
        $precioPro = $_POST["precio"];
        $descuPro = $_POST["descu"];
        $ivaPro = $_POST["iva"];
        $precioProT = $_POST["precioT"];
    }

    //Utilizamos el archivo Autoload de Composer Dompdf 
    require __DIR__ . "/vendor/autoload.php";

    //Definimos los métodos a utilizar (crear pdf con Dompdf Composer)
    use Dompdf\Dompdf;
    use Dompdf\Options;


    $opciones = new Options;
    $opciones -> setChroot(__DIR__);
    $opciones -> setIsRemoteEnabled(true);

    $dompdf = new Dompdf($opciones);

    $dompdf -> setPaper("A4", "landscape");

    $html = file_get_contents("facturaPlantilla.html");

    $html = str_replace(["{{Usuario}}", "{{direcciEnvi}}", "{{Fecha}}", "{{FechaVenci}}", "{{Cantidad}}", "{{Precio}}", "{{IVA}}", "{{Descuento}}", "{{Importe}}", "{{Subtotal}}", "{{Total}}"],
    [$NombreC, $DireccionE, $fechaEF, $fechaVF, $cantidadPro, $precioPro, $ivaPro."%", $descuPro."%", $precioProT, $precioProT, $precioProT], $html);

    $dompdf -> loadHtml($html);


    $dompdf -> render();

    $dompdf -> addInfo("Title", "Factura de Compra");

    $dompdf -> stream("Factura.pdf", ["Attachment" => 1]);

    $pdfSalida = $dompdf -> output();
    file_put_contents("facturas/Factura".$fechaVF.".pdf", $pdfSalida);

?>