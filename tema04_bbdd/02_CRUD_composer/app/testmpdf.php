<?php
    require __DIR__ . "/vendor/autoload.php";

    use Mpdf\Mpdf;

    //$mpdf = new \Mpdf\Mpdf();
    $mpdf = new Mpdf();

    $mpdf->WriteHTML('<h1>Hello world!</h1>');
    $mpdf->WriteHTML('<p>Hola a todos</p>');

    $mpdf->Output();
?>