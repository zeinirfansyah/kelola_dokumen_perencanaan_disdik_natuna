@extends('admin.layouts.master') @section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Galeri</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Home</a></li>
              <li class="breadcrumb-item"><a href="{{ route('galery.index') }}">Galery</a></li>
              <li class="breadcrumb-item active">{{ $document->nama_dokumen }}</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container">
        @if ($errors->any())
          <div>
            <ul>
              @foreach ($errors->all() as $error)
                <div class="alert alert-danger" role="alert">
                  {{ $error }}
                </div>
              @endforeach
            </ul>
          </div>
        @endif
        <div class="card p-3">
          <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
              <h3><strong>{{ $document->nama_dokumen }}</strong></h3>
              <strong class="alert alert-info px-2 py-1">Uploader: {{ $document->user->nama_user }}</strong>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="d-flex justify-content-center">
                  <div class="image mb-3">
                    @if ($document->file === 'default_document.jpg')
                      <img src="{{ asset('storage/documents/galery/' . $document->file) }}" class="img-fluid rounded"
                        style="height: 450px; width: 100%; object-fit: contain;  border: 5px solid #d7d7d7;">
                    @else
                      <img src="{{ asset('storage/documents/galery/' . $document->file) }}" class="img-fluid rounded"
                        style="height: 450px; width: 100%; object-fit: contain;  border: 5px solid #d7d7d7;"
                        alt="{{ $document->file }}">
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <hr>
            <h5>Informasi Singkat</h5>
            <table class="table table-bordered my-2">
              <tr>
                <th class="col-2">Nama Dokumen</th>
                <td>{{ $document->nama_dokumen }}</td>
              </tr>
              <tr>
                <th class="col-2">Tahun Diambil</th>
                <td>{{ $document->tahun }}</td>
              </tr>
              <tr>
                <td colspan="2">
                  <h5>Keterangan</h5>
                  {{ $document->keterangan }}
                </td>
              </tr>
            </table>
            <a href="{{ route('galery.update', $document->id) }}" class="btn btn-primary">Edit Data</a>

            <form action="{{ route('galery.delete', ['id' => $document->id]) }}" method="POST"
              class="d-inline">
              @csrf
              @method('DELETE')
              <button type="button" class="btn btn-danger" data-toggle="modal"
                data-target="#deleteModal{{ $document->id }}">
                Delete
              </button>

              <!-- Confirmation alert modal -->
              <div class="modal fade" id="deleteModal{{ $document->id }}" tabindex="-1" role="dialog"
                aria-labelledby="deleteModalLabel{{ $document->id }}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="deleteModalLabel{{ $document->id }}">Confirmation</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <p>Are you sure you want to delete this document?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
