<?php
    define('FPDF_FONTPATH','./font/');
    require('fpdf.php');  // MAKE SURE YOU HAVE pdf LINE

    $pdf = new FPDF();
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',20);
    $pdf->Cell(20,10,'Mario',0,0);
    $pdf->Cell(20,10,'Rossi',0,0);
    $pdf->Cell(20,10,'',0,1);
    $pdf->Image('./img/qrcode.png', 30, 40,100,100);
    $pdf->Output("testsuccess.pdf",'F');
    header("location:testsuccess.pdf");
?>