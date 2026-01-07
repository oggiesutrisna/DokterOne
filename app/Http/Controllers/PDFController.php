<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\File;

class PDFController extends Controller
{
    /**
     * Download the PDF
     */
    public function __invoke(Pasien $pasien)
    {
        // Generate PDF from Blade template
        $pdf = Pdf::loadView('pdf.result', compact('pasien'));
        
        // ... rest of code uses $pasien directly
        
        // Set paper size and orientation
        $pdf->setPaper('a4', 'portrait');
        
        // Optional: Set DomPDF options for better rendering
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'defaultFont' => 'DejaVu Sans',
        ]);

        // If `results` folder didn't exist, create it
        if (!File::exists(public_path('results'))) {
            File::makeDirectory(public_path('results'));
        }

        $fileName = "result-{$pasien->nama}[{$pasien->nomor_pid}].pdf";
        $filePath = public_path("results/{$fileName}");
        
        // Save the PDF
        $pdf->save($filePath);

        // Return as download
        return response()->download($filePath, $fileName);
    }

    /**
     * Preview the PDF in browser
     */
    public function preview(Pasien $pasien)
    {
        // Generate PDF from Blade template
        $pdf = Pdf::loadView('pdf.result', compact('pasien'));
        
        // ... rest of code uses $pasien directly

        
        // Set paper size and orientation
        $pdf->setPaper('a4', 'portrait');
        
        // Optional: Set DomPDF options for better rendering
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'defaultFont' => 'DejaVu Sans',
        ]);

        // Stream the PDF to browser (opens in new tab)
        return $pdf->stream("preview-{$pasien->nama}.pdf");
    }
}
