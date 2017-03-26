<?php
 ob_start();
include '../vista/AsistenciaEventoPdf.php';
 $content = ob_get_clean();
require_once '../librerias/html2pdf/html2pdf.class.php';

 try
    {
        $html2pdf = new HTML2PDF('P', 'A4', 'es', true, 'UTF-8', 3);
        $html2pdf->pdf->SetDisplayMode('fullpage');
        $html2pdf->writeHTML($content);
        $html2pdf->Output('AsistenciaEvento.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }