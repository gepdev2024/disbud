<?php

namespace App\Services;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
class CertificateService
{
  public function generateCertificate($data)
  {
    // Load the view and pass the data to it
    $pdf = PDF::loadView('certificates.template', $data);

    // Save the PDF to a file
    $filePath = 'Pengirim/' . $data['filename'] . '.pdf';
    $pdf->save(storage_path('app/public/' . $filePath));

    return $filePath;
  }
}
