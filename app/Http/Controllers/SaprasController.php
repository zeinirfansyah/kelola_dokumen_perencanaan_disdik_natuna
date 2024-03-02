<?php

namespace App\Http\Controllers;

use App\Models\Sapras;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SaprasController extends Controller
{
    public function index(Request $request) {
        $documentsQuery =Sapras::query();
    
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
    
        $years =Sapras::select('tahun')->distinct()->get();
    
        $documents = $documentsQuery->paginate(10);
    
        return view('admin.sapras.index', [
            'documents' => $documents,
            'years' => $years,
        ]);
    }
    
    

    public function createDocument()
    {
        return view('admin.sapras.create');
    }


    public function storeDocument(Request $request)
    {
        $validate = $request->validate([  
            'nama_dokumen' => 'required|string|max:1000',
            'tahun' => 'required|string|max:1000',
            'file' => 'required|mimes:pdf,doc,docx,xls,xlsx|max:2048',
            'keterangan' => 'max:1000',
        ], [
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute sudah ada.',
            'string' => ':attribute harus string.',
            'mimes' => ':attribute harus berupa file PDF, Word, Excel.',
            'max' => ':attribute maksimal 2 MB atau 1000 karakter.',
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

       Sapras::create($document);

        return redirect()->route('sapras.index')->with('success', 'Document data created successfully');
    }

    public function deleteDocument($id)
    {
        $document = Sapras::find($id);

        // Get the file name from the database record
        $filename = $document->file;

        // Delete the database record
        $document->delete();

        // Delete the associated file from storage
        Storage::delete("public/documents/sapras/{$filename}");

        return redirect()->route('sapras.index')->with('success', 'Sapras deleted successfully');
    }

    private function handleDocumentUpload(Request $request, $currentDocument)
    {

        $nama_dokumen = $request->nama_dokumen;

        if ($request->hasFile('file') && $request->file('file')->isValid()) {
            $document = $request->file('file');
            $filename = time() . '-' . $nama_dokumen . '.' . $document->getClientOriginalExtension();
    
            // Save the file in the 'public/documents/sapras' directory
            $document->storeAs('public/documents/sapras', $filename);
    
            return $filename; // Return the generated filename
        }
    
        // If no new document file is provided, return the current document filename
        return $currentDocument;
    }

    public function updateDocument($id)
    {
        $document = Sapras::find($id);
        return view('admin.sapras.update', compact('document'));
    }

    public function editDocument(Request $request, $id)
    {
        $document = Sapras::find($id);

        $validate = $request->validate([  
            'nama_dokumen' => 'required|string|max:1000',
            'tahun' => 'required|string|max:1000',
            'file' => 'mimes:pdf,doc,docx,xls,xlsx|max:2048',
            'keterangan' => 'max:1000',
        ], [
            'required' => ':attribute harus diisi.',
            'unique' => ':attribute sudah ada.',
            'string' => ':attribute harus string.',
            'mimes' => ':attribute harus berupa file PDF, Word, Excel.',
            'max' => ':attribute maksimal 2 MB atau 1000 karakter.',
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

        $document = Sapras::where('id', $id)->update($document);
        // Delete the old file if it's different from the new one
        if ($currentFile !== $filename) {
            Storage::delete("public/documents/sapras/{$currentFile}");
        }
        return redirect()->route('sapras.index', ['id' => $id])->with('success', 'Sapras updated successfully');
    }
}
