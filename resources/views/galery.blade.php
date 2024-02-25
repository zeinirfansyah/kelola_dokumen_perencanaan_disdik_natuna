@extends('layouts.app')

@section('content')
  <div class="home">
    <div class="container-fluid">
      <div class="row dark-canvas">
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
      </div>
    </div>
  </div>
@endsection
