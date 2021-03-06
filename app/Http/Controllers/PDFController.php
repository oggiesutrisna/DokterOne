<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Support\Facades\File;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpWord\TemplateProcessor;

class PDFController extends Controller
{
    public function __invoke($id)
    {
        $pasien = Pasien::find($id);

        Settings::setPdfRendererName(Settings::PDF_RENDERER_DOMPDF);
        Settings::setPdfRendererPath('.');

        $templateDocx = new TemplateProcessor(public_path('result.docx'));

        // Set the variable value inside template docx file to dynamic data based on $pasien variable
        $templateDocx->setValue('nomor_surat', $pasien->nosurat);
        $templateDocx->setValue('nama', $pasien->nama);
        $templateDocx->setValue('dob', $pasien->dob);
        $templateDocx->setValue('jenis_kelamin', $pasien->jenis_kelamin);
        $templateDocx->setValue('sampling_time', $pasien->sampling_time);
        $templateDocx->setValue('nomor_pid', $pasien->nomor_pid);
        $templateDocx->setValue('jenis_pemeriksaan', $pasien->jenis_pemeriksaan);
        $templateDocx->setValue('nationality', $pasien->nationality);
        $templateDocx->setValue('result', $pasien->result);

        // If `results` folder didn't exists on disk, so make the `results` directory
        // Example path will be created are : /public/`results`/
        if (!File::exists(public_path('results'))) {
            File::makeDirectory(public_path('results'));
        }

        $temporaryPdfFileName = "results/temp-of-$pasien->name[$pasien->nomor_pid].pdf";
        $newFileName = "results/result-$pasien->nama[$pasien->nomor_pid].pdf";

        // So the TemplateProcessor Class will process or change the variables on setValue('variable', 'actual_data')
        // according to the dynamic data from the $pasien variable and save it to temporary file name
        $templateDocx->saveAs($temporaryPdfFileName);

        // After that load the temporary file that was created in the line of code above
        // And command the IOFactory Class to load temporary file, and save to a new name (this is the result of the file we can see)
        IOFactory::load($temporaryPdfFileName)->save($newFileName, "PDF");

        // If temporary file file exists, delete it
        if (File::exists(public_path($temporaryPdfFileName))) {
            File::delete(public_path($temporaryPdfFileName));
        }

        return response()->download(public_path($newFileName));
    }
}
