<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use App\Models\Pasien;

class CreatePDFController extends Controller
{
    public function createPDF($id) {
        Pasien::find($id);
        $template = new TemplateProcessor(public_path('result.docx'));

        $SaveDocPath = public_path('new-result.docx');
        $template->setValue('nosurat', $pasien->nosurat);
        $template->setValue('name', $pasien->name);
        $template->setValue('dob', $pasien->dob);
        $template->setValue('gender', $pasien->gender);
        $template->setValue('sampling_time', $pasien->sampling_time);
        $template->setValue('nomor_pid', $pasien->nomor_pid);
        $template->setValue('jenis_pemeriksaan', $pasien->jenis_pemeriksaan);
        $template->setValue('nationality', $pasien->nationality);

        $content = IOFactory::load($SaveDocPath);
        $savePdfPath = public_path('new_result.pdf');
        // exists
        if ( file_exists($savePdfPath)) {
            unlink($savePdfPath);
        }

        $PdfWriter = IOFactory::createWriter($content, '.pdf');

        header("Content-Disposition: Attachment; filename=$pasien->name .'pdf'");
        $PdfWriter->save("php://output");
        echo 'kekw';
    }
}
