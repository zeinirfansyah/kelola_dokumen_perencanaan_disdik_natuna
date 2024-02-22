@extends('admin.layouts.master') @section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Galeri</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active">Galeri</li>
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <div class="content">
      <div class="container-fluid">
        <!-- filter and search -->
        <div class="row">
          <div class="col-md-12">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header">
                  <a href="{{ route('galery.create') }}" class="btn btn-default">Add Photo</a>

                  <div class="card-tools">
                    <form method="GET" action="{{ route('galery.index') }}" class="form-inline">
                      <div class="input-group input-group-sm" style="width: 300px">
                        <input type="text" name="search" class="form-control ml-2" placeholder="Search"
                          value="{{ request('search') }}" />

                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
            <div class="container-fluid">
              <div class="card p-3">
                <div class="row row-cols-2 row-cols-md-3">
                  @foreach ($documents as $document)
                    <div class="col">
                      <a href="{{ route('galery.detail', ['id' => $document->id]) }}" style="color: #000;">
                        <div class="card">
                          <div class="card-body">
                            <div class="image">
                              <img src="{{ asset('storage/documents/galery/' . $document->file) }}"
                                class="img-fluid rounded"
                                style="height: 300px; width: 100%; object-fit: cover; border: 5px solid #d7d7d7;"
                                alt="{{ $document->file }}">
                            </div>
                          </div>
                          <div class="card-footer truncate-text text-center">
                          {{ $document->nama_dokumen }}
                          </div>
                        </div>
                      </a>
                    </div>
                  @endforeach
                </div>

                <div class="mx-3">
                  {{ $documents->links('pagination::bootstrap-5') }}
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
      </div>
    </div>
  </div>

  <script>
    // Add this script to your page or in a separate JavaScript file
    document.addEventListener('DOMContentLoaded', function() {
      var elements = document.getElementsByClassName('truncate-text');

      for (var i = 0; i < elements.length; i++) {
        var text = elements[i].textContent.trim();
        var words = text.split(' ');
        var truncatedText = words.slice(0, 12).join(' ');

        if (words.length > 10) {
          truncatedText += '...'; // Add ellipsis if content is truncated
        }

        elements[i].textContent = truncatedText;
      }
    });
  </script>
  
@endsection
