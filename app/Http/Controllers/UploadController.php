<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class UploadController extends Controller
{
    public function upload(){
        return view('upload');
    }

    public function proses_upload(Request $request){
        $request->validate([
            'file' => 'required',
            'keterangan' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload, $file->getClientOriginalName());
        }
    }

    public function resize_upload(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png',
            'keterangan' => 'required',
        ]);

        $path = public_path('img/logo');

        if (!File::isDirectory($path)) {
            File::makeDirectory($path, 0777, true);
        }

        $file = $request->file('file');

        $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();

        $canvas = Image::canvas(200, 200);

        $resizeImage = Image::make($file)->resize(null, 200, function($constraint) {
            $constraint->aspectRatio();
        });

        $canvas->insert($resizeImage, 'center');

        if ($canvas->save($path . '/' . $fileName)) {
            return redirect()->route('upload')->with('success', 'Data berhasil ditambahkan!');
        } else {
            return redirect()->route('upload')->with('error', 'Data gagal ditambahkan!');
        }
    }

    public function dropzone()
    {
        return view('dropzone');
    }

    public function dropzone_store(Request $request)
    {
        $image = $request->file('file');

        $path = public_path('img/dropzone');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $imageName = time() . '.' . $image->extension();
        $image->move($path, $imageName);

        return response()->json(['success' => $imageName]);
    }

    // ✅ HALAMAN FORM PDF
    public function pdf_upload()
    {
        return view('pdf_upload');
    }

    // ✅ SIMPAN PDF (FIXED - hanya satu!)
    
    public function pdf_store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        $pdf = $request->file('file');

        $pdfName = 'pdf_' . time() . '.' . $pdf->getClientOriginalExtension();

        $path = public_path('pdf');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $pdf->move($path, $pdfName);

        return response()->json(['success' => $pdfName]);
    }
}