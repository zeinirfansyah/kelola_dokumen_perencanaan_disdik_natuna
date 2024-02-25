@extends('layouts.app')

@section('content')
  <div class="home">
    <div class="container-fluid">
      <div class="row dark-canvas">
        <div class="col-12 col-md-6 home-desc">
         <div class="home-title">
          <h3>
            <strong>
              Laporan Kinerja Instansi Pemerintah
            </strong>
          </h3>
          <div class="home-content">
            <p>
              LKJIP merupakan dokumen pelaporan wajib yang berfungsi sebagai indikator akuntabilitas dari pelaksanaan tugas dan fungsi yang dipercayakan kepada setiap instansi pemerintah atas  penggunaan anggaran.
            </p>
            <ul>
              @foreach ($documents as $document)
              <li>
                <a href="{{ asset('storage/documents/lkjip/' . $document->file) }}"
                  target="_blank" rel="noopener">
                  {{ $document->nama_dokumen }}
                </a>
              </li>
            @endforeach
            </ul>
          </div>
          <div class="my-3">
            {{ $documents->links('pagination::bootstrap-4') }}
          </div>
         </div>
        </div>
        <div class="col text-center">
          @if ($latestDocument)
          <a href="{{ asset('storage/documents/lkjip/' . $latestDocument->file) }}" target="_blank" rel="noopener" class="icon-document">
            <img src="{{asset('assets/illustration/document.svg')}}" alt="LKJIP" class="justify-content-center" style="width: 300px;">
            <p class="text-center">
              <strong>
                {{ $latestDocument->nama_dokumen }}
              </strong>
            </p>
          </a>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection