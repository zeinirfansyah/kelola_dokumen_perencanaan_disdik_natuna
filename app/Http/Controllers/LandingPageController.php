<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Galery;
use App\Models\Lkjip;
use App\Models\Peraturan;
use App\Models\Pkrkt;
use App\Models\Spmp;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index() {
        $about = About::first();
        return view('home', compact('about'));
    }

    public function showLKJIP(Request $request) {
        $documentsQuery =Lkjip::query();
    
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
        $latestDocument = $documentsQuery->first();
    
        $years =Lkjip::select('tahun')->distinct()->get();
    
        $documents = $documentsQuery->paginate(4);
    
        return view('lkjip', [
            'documents' => $documents,
            'latestDocument' => $latestDocument,
            'years' => $years,
        ]);
    }

    public function showSPMP(Request $request) {
        $documentsQuery =Spmp::query();
    
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
        $latestDocument = $documentsQuery->first();
    
        $years =Spmp::select('tahun')->distinct()->get();
    
        $documents = $documentsQuery->paginate(4);
    
        return view('spmp', [
            'documents' => $documents,
            'latestDocument' => $latestDocument,
            'years' => $years,
        ]);
    }
    
    public function showPKRKT(Request $request) {
        $documentsQuery =Pkrkt::query();
    
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
        $latestDocument = $documentsQuery->first();
    
        $years =Pkrkt::select('tahun')->distinct()->get();
    
        $documents = $documentsQuery->paginate(4);
    
        return view('pkrkt', [
            'documents' => $documents,
            'latestDocument' => $latestDocument,
            'years' => $years,
        ]);
    }
    public function showPeraturan(Request $request) {
        $documentsQuery =Peraturan::query();
    
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
        $latestDocument = $documentsQuery->first();
    
        $years =Peraturan::select('tahun')->distinct()->get();
    
        $documents = $documentsQuery->paginate(4);
    
        return view('peraturan', [
            'documents' => $documents,
            'latestDocument' => $latestDocument,
            'years' => $years,
        ]);
    }

    public function showGalery(Request $request) {
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
    
        return view('galery', [
            'documents' => $documents,
            'years' => $years,
        ]);
    }
    
    public function showContact()
    {
        $about = About::first();
        return view('contact', compact('about'));
    }
}