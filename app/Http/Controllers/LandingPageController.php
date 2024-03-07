<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Dpa;
use App\Models\Galery;
use App\Models\Kdp;
use App\Models\Lkjip;
use App\Models\Musrenbangkab;
use App\Models\Peraturan;
use App\Models\Pkrkt;
use App\Models\Renja;
use App\Models\Rkpd;
use App\Models\Sapras;
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

    public function showSapras(Request $request) {
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
        $latestDocument = $documentsQuery->first();
    
        $years =Sapras::select('tahun')->distinct()->get();
    
        $documents = $documentsQuery->paginate(4);
    
        return view('sapras', [
            'documents' => $documents,
            'latestDocument' => $latestDocument,
            'years' => $years,
        ]);
    }

    public function showKdp(Request $request) {
        $documentsQuery =Kdp::query();
    
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
    
        $years =Kdp::select('tahun')->distinct()->get();
    
        $documents = $documentsQuery->paginate(4);
    
        return view('kdp', [
            'documents' => $documents,
            'latestDocument' => $latestDocument,
            'years' => $years,
        ]);
    }

    public function showMusrenbangkab(Request $request) {
        $documentsQuery =Musrenbangkab::query();
    
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
    
        $years =Musrenbangkab::select('tahun')->distinct()->get();
    
        $documents = $documentsQuery->paginate(4);
    
        return view('musrenbangkab', [
            'documents' => $documents,
            'latestDocument' => $latestDocument,
            'years' => $years,
        ]);
    }

    public function showRenja(Request $request) {
        $documentsQuery =Renja::query();
    
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
    
        $years =Renja::select('tahun')->distinct()->get();
    
        $documents = $documentsQuery->paginate(4);
    
        return view('renja', [
            'documents' => $documents,
            'latestDocument' => $latestDocument,
            'years' => $years,
        ]);
    }

    public function showRkpd(Request $request) {
        $documentsQuery =Rkpd::query();
    
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
    
        $years =Rkpd::select('tahun')->distinct()->get();
    
        $documents = $documentsQuery->paginate(4);
    
        return view('rkpd', [
            'documents' => $documents,
            'latestDocument' => $latestDocument,
            'years' => $years,
        ]);
    }

    public function showDpa(Request $request) {
        $documentsQuery =Dpa::query();
    
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
    
        $years =Dpa::select('tahun')->distinct()->get();
    
        $documents = $documentsQuery->paginate(4);
    
        return view('dpa', [
            'documents' => $documents,
            'latestDocument' => $latestDocument,
            'years' => $years,
        ]);
    }

}
