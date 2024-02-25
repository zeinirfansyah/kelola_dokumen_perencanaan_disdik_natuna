@extends('layouts.app')

@section('content')
  <div class="home">
    <div class="container-fluid">
      <div class="row dark-canvas">
        <div class="col-12 col-md-6 home-desc">
         <div class="home-title">
          <h3>
            <strong>
                Standar Pelayanan Minimal Pendidikan
            </strong>
          </h3>
          <div class="home-content">
            <p>
                SPM Pendidikan merupakan singkatan dari Standar Pelayanan Minimal Pendidikan. SPM Pendidikan adalah ketentuan mengenai jenis dan mutu pelayanan dasar pendidikan yang merupakan urusan pemerintahan wajib yang berhak diperoleh setiap Peserta Didik secara minimal. Permendikbudristek 32 tahun 2022 tentang SPM Pendidikan mengatur tentang Jenis dan penerima Pelayanan Dasar, Mutu Pelayanan Dasar, pencapaian SPM Pendidikan, dan pelaporan dan evaluasi.
            </p>
            <ul>
              @foreach ($documents as $document)
              <li>
                <a href="{{ asset('storage/documents/spmp/' . $document->file) }}"
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
          <a href="{{ asset('storage/documents/spmp/' . $latestDocument->file) }}" target="_blank" rel="noopener" class="icon-document">
            <img src="{{asset('assets/illustration/document.svg')}}" alt="SPMP" class="justify-content-center" style="width: 300px;">
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