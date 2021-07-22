<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Metadata\Settings;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\Writer\PDF\DomPDF;
use PhpOffice\PhpWord\Writer\PDF;

class PDFController extends Controller
{
    public function createPDF(Pasien $id) {
        $domPdfPath = base_path('vendor/dompdf/dompdf');
        Settings::setPdfRendererPath($domPdfPath);
        Settings::setPdfRendererName('DomPDF');

        $pasien = Pasien::find($id);

        $template = new TemplateProcessor(public_path('result.docx'));
        $template->setValue('nosurat', $pasien->nosurat);
        $template->setValue('name', $pasien->name);
        $template->setValue('dob', $pasien->dob);
        $template->setValue('gender', $pasien->gender);
        $template->setValue('sampling_time', $pasien->sampling_time);
        $template->setValue('nomor_pid', $pasien->nomor_pid);
        $template->setValue('jenis_pemeriksaan', $pasien->jenis_pemeriksaan);
        $template->setValue('nationality', $pasien->nationality);

        $SaveDocPath = public_path('new-result.docx');
        $content = IOFactory::load($SaveDocPath);
        // saving the result
        $savePdfPath = public_path('new_result.pdf');
        // exists
        if ( file_exists($savePdfPath)) {
            unlink($savePdfPath);
        }
        $PdfWriter = IOFactory::createWriter($content, 'PDF');
        header("Content-Disposition: Attachment; filename=$pasien->name .'pdf'");
        $PdfWriter->save("php://output");
    }
}
