@extends('layouts.app')

@section('content')
  <div class="home">
    <div class="container-fluid">
      <div class="row dark-canvas">
        <div class="col-12 col-md-6 home-desc">
          <div class="home-title">
            <h3>
              <strong>
                Peraturan Pendidikan
              </strong>
            </h3>
            <div class="home-content">
              <p>
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nulla voluptatum libero quae quisquam amet commodi sunt nemo voluptate soluta quasi molestias architecto veniam, pariatur quaerat! Cumque odit, repellat similique voluptates iusto nihil accusantium dolorum fugit maiores eaque hic. Vero eligendi ipsam deserunt, molestiae ullam exercitationem possimus tenetur ipsum incidunt facere?
              </p>
              <ul>
                @foreach ($documents as $document)
                  <li>
                    <a href="{{ asset('storage/documents/peraturan/' . $document->file) }}" target="_blank" rel="noopener">
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
          <a href="{{ asset('storage/documents/peraturan/' . $latestDocument->file) }}" target="_blank" rel="noopener"
            class="icon-document">
            <img src="{{ asset('assets/illustration/document.svg') }}" alt="Peraturan Pendidikan" class="justify-content-center"
              style="width: 300px;">
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
