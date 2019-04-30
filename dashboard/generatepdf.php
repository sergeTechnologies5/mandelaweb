<?php
    require('phpToPDF/phpToPDF.php');

    //It is possible to include a file that outputs html and store it in a variable 
    //using output buffering.
    ob_start();


    //Set Your Options -- we are saving the PDF as 'my_filename.pdf' to a 'my_pdfs' folder
    $pdf_options = array(
        "source_type" => 'url',
        "source" => 'http://192.168.0.220/mandelaweb/dashboard/reports.php',
        "action" => 'view',
        "color" => 'monochrome',
        "page_orientation" => 'landscape');
      
      // CALL THE phpToPDF FUNCTION WITH THE OPTIONS SET ABOVE
      phptopdf($pdf_options);

    //Code to generate PDF file from options above
    phptopdf($pdf_options);
?>