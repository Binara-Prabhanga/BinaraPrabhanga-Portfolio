<?php

namespace App\Http\Controllers;

use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificateController extends Controller
{
    public function uploadForm()
    {
        return inertia('UploadCertificate');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $file = $request->file('file');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/certificates', $filename);

        Certificate::create([
            'title' => $request->title,
            'filename' => $filename,
        ]);

        return back()->with('success', 'Certificate uploaded!');
    }

    public function list()
    {
        return inertia('Certificates', [
            'certificates' => Certificate::latest()->get()
        ]);
    }

    public function file($filename)
    {
        $path = 'public/certificates/' . $filename;

        if (!Storage::exists($path)) {
            abort(404);
        }

        return response()->file(storage_path('app/' . $path));
    }
}
