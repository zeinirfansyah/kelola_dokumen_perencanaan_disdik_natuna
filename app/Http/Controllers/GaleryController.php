<?php

namespace App\Http\Controllers;

use App\Models\Galery;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GaleryController extends Controller
{
    public function index(Request $request) {
        $documentsQuery =Galery::query();
    
        if ($request->has('search')) {
            $searchQuery = $request->search;
            $documentsQuery->where(function ($query) use ($searchQuery) {
                $query->where('nama_dokumen', 'like', "%$searchQuery%")
                    ->orWhere('tahun', 'like', "%$searchQuery%");
            });
        }
    
        // filter by tahun
        if ($request->has('tahun') && $request->tahun !== 'semua') {
            $documentsQuery->where('tahun', $request->tahun);
        }
    
        // order by tahun in descending order
        $documentsQuery->orderByDesc('tahun');
    
        $years =Galery::select('tahun')->distinct()->get();
    
        $documents = $documentsQuery->paginate(6);
    
        return view('admin.galery.index', [
            'documents' => $documents,
            'years' => $years,
        ]);
    }
    
    public function detailDocument($id)
    {
        $document = Galery::find($id);
        return view('admin.galery.detail', ['document' => $document]);
    }

    public function createDocument()
    {
        return view('admin.galery.create');
    }


    public function storeDocument(Request $request)
    {
        $validate = $request->validate([  
            'nama_dokumen' => 'required|string|max:640',
            'tahun' => 'required|string|max:640',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'max:640',
        ], [
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute sudah ada.',
            'string' => ':attribute harus string.',
            'image' => ':attribute harus jpeg, png, jpg.',
            'mimes' => ':attribute harus jpeg, png, jpg.',
            'max' => ':attribute maksimal 2 MB atau 640 karakter.',
            'min' => ':attribute minimal 8 karakter.',
            'exists' => ':attribute tidak ditemukan.',
        ]);

        $filename = $this->handleDocumentUpload($request, 'default_document.jpg');

        $document = [
            'user_id' => Auth::user()->id,
            'nama_dokumen' => $request->nama_dokumen,
            'tahun' => $request->tahun,
            'file' => $filename,
            'keterangan' => $request->keterangan,
            'created_at' => now(),
            'updated_at' => now(),
        ];

       Galery::create($document);

        return redirect()->route('galery.index')->with('success', 'Document data created successfully');
    }

    public function deleteDocument($id)
    {
        $document = Galery::find($id);

        // Get the file name from the database record
        $filename = $document->file;

        // Delete the database record
        $document->delete();

        // Delete the associated file from storage
        Storage::delete("public/documents/galery/{$filename}");

        return redirect()->route('galery.index')->with('success', 'Galery deleted successfully');
    }

    private function handleDocumentUpload(Request $request, $currentDocument)
    {

        $nama_dokumen = $request->nama_dokumen;

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $document = $request->file('file');
            $filename = time() . '-' . $nama_dokumen . '.' . $document->getClientOriginalExtension();
    
            // Save the file in the 'public/documents/galery' directory
            $document->storeAs('public/documents/galery', $filename);
    
            return $filename; // Return the generated filename
        }
    
        // If no new document file is provided, return the current document filename
        return $currentDocument;
    }

    public function updateDocument($id)
    {
        $document = Galery::find($id);
        return view('admin.galery.update', compact('document'));
    }

    public function editDocument(Request $request, $id)
    {
        $document = Galery::find($id);

        $validate = $request->validate([  
            'nama_dokumen' => 'required|string|max:640',
            'tahun' => 'required|string|max:640',
            'file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'max:640',
        ], [
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute sudah ada.',
            'string' => ':attribute harus string.',
            'image' => ':attribute harus jpeg, png, jpg.',
            'mimes' => ':attribute harus jpeg, png, jpg.',
            'max' => ':attribute maksimal 2 MB atau 640 karakter.',
            'min' => ':attribute minimal 8 karakter.',
            'exists' => ':attribute tidak ditemukan.',
        ]);


        // Handle file upload
        $currentFile = $document->file;
        $filename = $this->handleDocumentUpload($request, $currentFile);


        $document = [
            'user_id' => Auth::user()->id,
            'nama_dokumen' => $request->nama_dokumen,
            'tahun' => $request->tahun,
            'file' => $filename,
            'keterangan' => $request->keterangan,
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $document = Galery::where('id', $id)->update($document);
        // Delete the old file if it's different from the new one
        if ($currentFile !== $filename) {
            Storage::delete("public/documents/galery/{$currentFile}");
        }
        return redirect()->route('galery.detail', ['id' => $id])->with('success', 'GALERY data updated successfully');
    }
}
