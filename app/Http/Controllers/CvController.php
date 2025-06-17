<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    // Show upload form (if using Blade or Inertia)
    public function uploadForm()
    {
        return inertia('UploadCv'); // will create UploadCv.vue
    }

    // Handle file upload
    public function upload(Request $request)
    {
        $request->validate([
            'cv' => 'required|mimes:pdf|max:2048',
        ]);

        $file = $request->file('cv');
        $filename = 'Binara_Prabhanga_CV.pdf';
        $file->storeAs('public/cv', $filename);

        return back()->with('success', 'CV uploaded successfully!');
    }

    // Serve the CV for download or inline view
    public function view()
    {
        $path = 'public/cv/Binara_Prabhanga_CV.pdf';

        if (!Storage::exists($path)) {
            abort(404, 'CV not found.');
        }

        return response()->file(storage_path('app/' . $path));
    }
}
