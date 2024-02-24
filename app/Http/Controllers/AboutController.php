<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function createAbout()
    {
        // Kirim data kategori ke view
        return view('admin.about.create');
    }

    private function handleDocumentUpload(Request $request, $currentDocument)
    {

        $kepala_dinas = $request->kepala_dinas;

        if ($request->hasFile('foto_kepala_dinas') && $request->file('foto_kepala_dinas')->isValid()) {
            $document = $request->file('foto_kepala_dinas');
            $filename = time() . '-' . $kepala_dinas . '.' . $document->getClientOriginalExtension();
    
            // Save the file in the 'public/documents/galery' directory
            $document->storeAs('public/kepala_dinas', $filename);
    
            return $filename; // Return the generated filename
        }
    
        // If no new document file is provided, return the current document filename
        return $currentDocument;
    }

    public function storeAbout(Request $request)
    {
        $validate = $request->validate([
            'tentang_disdik' => 'required|string|max:640',
            'alamat' => 'required|string|max:640',
            'no_telepon' => 'required|string|max:640',
            'instagram' => 'required|string|max:640',
            'email' => 'required|string|max:640',
            'kepala_dinas' => 'required|string|max:640',
            'quotes' => 'required|string|max:640',
            'foto_kepala_dinas' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'required' => ':attribute harus diisi.',
            'string' => ':attribute harus berupa string.',
            'max' => ':attribute maksimal :max karakter ataumaksimal :max KB.',
            'image' => ':attribute harus berupa gambar.',
            'mimes' => ':attribute harus berupa gambar.',
            'unique' => ':attribute sudah ada.',
        ]);

        $filename = $this->handleDocumentUpload($request, 'default_document.jpg');

        $about = [
            'user_id' => Auth::user()->id,
            'tentang_disdik' => $request->tentang_disdik,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'instagram' => $request->instagram,
            'email' => $request->email,
            'kepala_dinas' => $request->kepala_dinas,
            'quotes' => $request->quotes,
            'foto_kepala_dinas' => $filename,
            'created_at' => now(),
            'updated_at' => now(),
        ];
        
       
        About::create($about);
        return redirect()->route('about.index')->with('success', 'Data Tersimpan');
    }

    public function updateAbout()
    {
        $about = About::first();
        return view('admin.about.update', compact('about'));
    }

    public function editAbout(Request $request)
    {
        $about = About::first();
        
        $validate = $request->validate([
            'tentang_disdik' => 'string|max:640',
            'alamat' => 'string|max:640',
            'no_telepon' => 'string|max:640',
            'instagram' => 'string|max:640',
            'email' => 'string|max:640',
            'kepala_dinas' => 'string|max:640',
            'quotes' => 'string|max:640',
            'foto_kepala_dinas' => 'image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'required' => ':attribute harus diisi.',
            'string' => ':attribute harus berupa string.',
            'max' => ':attribute maksimal :max karakter ataumaksimal :max KB.',
            'image' => ':attribute harus berupa gambar.',
            'mimes' => ':attribute harus berupa gambar.',
            'unique' => ':attribute sudah ada.',
        ]);

        $currentDocument = $about->foto_kepala_dinas;
        $filename = $this->handleDocumentUpload($request, $currentDocument);
        
        $about = [
            'user_id' => Auth::user()->id,
            'tentang_disdik' => $request->tentang_disdik,
            'alamat' => $request->alamat,
            'no_telepon' => $request->no_telepon,
            'instagram' => $request->instagram,
            'email' => $request->email,
            'kepala_dinas' => $request->kepala_dinas,
            'quotes' => $request->quotes,
            'foto_kepala_dinas' => $filename
        ];
       
        $about = About::first()->update($about);
        if ($currentDocument !== $filename) {
            Storage::delete("public/about/{$currentDocument}");
        }

        return redirect()->route('about.index')->with('success', 'Data Tersimpan');
    }
}
