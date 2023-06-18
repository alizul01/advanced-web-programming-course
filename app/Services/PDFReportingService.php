<?php

namespace App\Services;

use \Barryvdh\DomPDF\Facade\Pdf;

class PDFReportingService
{
    public function exportToPDF($data)
    {
        $pdf = PDF::loadView('pdf.report', compact('data'));
        return $pdf->download('invoice.pdf');
    }
}

?>
