@extends('layouts.app')

@section('content')
  <div class="hero">
    <div class="container-fluid hero-canvas d-flex justify-content-center align-items-center">
      <div class="container">
        <div  data-aos="zoom-out" data-aos-duration="1500" class="row">
          <div class="col-12 col-md-6 hero-desc hero-desc d-flex justify-content-center align-items-center">
            <div class="hero-title">
              <h3>
                <strong>
                  Rencana Kerja Dinas Pendidikan
                </strong>
              </h3>
              <div class="hero-content">
                <p>
                    Dokumen yang bersifat indikatif yang memuat program-program pembangunan Pendidikan.
                </p>
                <ul>
                  @if ($documents->count() > 0)
                    @foreach ($documents as $document)
                      <li>
                        <a href="{{ asset('storage/documents/renja/' . $document->file) }}" target="_blank"
                          rel="noopener">
                          {{ $document->nama_dokumen }}
                        </a>
                      </li>
                    @endforeach
                  @else
                    <li class="text-white my-5">Tidak ada dokumen terlampir</li>
                  @endif
                </ul>
              </div>
              <div class="my-3">
                {{ $documents->links('pagination::bootstrap-4') }}
              </div>
            </div>
          </div>
          <div class="col text-center hero-desc d-flex justify-content-center align-items-center">
            @if ($latestDocument)
              <a href="{{ asset('storage/documents/renja/' . $latestDocument->file) }}" target="_blank" rel="noopener"
                class="icon-document">
                <img src="{{ asset('assets/illustration/document.svg') }}" alt="Renja Pendidikan"
                  class="justify-content-center" style="width: 300px;">
                <p class="text-center">
                  <strong>
                    {{ $latestDocument->nama_dokumen }}
                  </strong>
                </p>
              </a>
            @else
              <div class="empty px-5" style="border: 1px solid #d7d7d7;">
                <h3 class="text-white text-center my-5">Tidak ada dokumen terlampir</h3>
              </div>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
