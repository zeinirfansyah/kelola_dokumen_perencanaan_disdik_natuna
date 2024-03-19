@extends('layouts.app')

@section('content')
  <div class="hero">
    <div class="container-fluid hero-canvas d-flex justify-content-center align-items-center">
      <div class="container">
        <div  data-aos="zoom-out" data-aos-duration="1500" class="row">
          @if ($documents->count() > 0)
            @foreach ($documents as $document)
              <div class="col-4 my-2">
                <a href="{{ asset('storage/documents/galery/' . $document->file) }}" target="_blank" style="color: #000;">
                  <div class="image">
                    <img src="{{ asset('storage/documents/galery/' . $document->file) }}" class="img-fluid rounded"
                      style="height: 15rem; width: 100%; object-fit: cover; border: 5px solid #d7d7d7;"
                      alt="{{ $document->file }}">
                  </div>
                </a>
              </div>
            @endforeach
            <div class="my-3">
              {{ $documents->links('pagination::bootstrap-4') }}
            </div>
          @else
            <div class="empty px-5" style="border: 1px solid #d7d7d7;">
              <h3 class="text-white text-center my-5">Tidak ada informasi tersedia</h3>
            </div>
          @endif
        </div>
      </div>
    </div>
  </div>
@endsection
