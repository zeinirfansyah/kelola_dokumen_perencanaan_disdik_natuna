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
              <li class="breadcrumb-item active">{{ $galery->nama_dokumen }}</li>
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
              <h3><strong>{{ $galery->nama_dokumen }}</strong></h3>
              <strong class="alert alert-info px-2 py-1">Oleh: {{ $galery->user->nama_user }}</strong>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">
                <div class="d-flex justify-content-center">
                  <div class="image mb-3">
                    @if ($galery->file === 'default_document.jpg')
                      <img src="{{ asset('storage/documents/galery/' . $galery->file) }}" class="img-fluid rounded"
                        style="height: 450px; width: 100%; object-fit: contain;  border: 5px solid #d7d7d7;">
                    @else
                      <img src="{{ asset('storage/documents/galery/' . $galery->file) }}" class="img-fluid rounded"
                        style="height: 450px; width: 100%; object-fit: contain;  border: 5px solid #d7d7d7;"
                        alt="{{ $galery->file }}">
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
                <td>{{ $galery->nama_dokumen }}</td>
              </tr>
              <tr>
                <th class="col-2">Tahun Diambil</th>
                <td>{{ $galery->tahun }}</td>
              </tr>
              <tr>
                <td colspan="2">
                  <h5>Keterangan</h5>
                  {{ $galery->keterangan }}
                </td>
              </tr>
            </table>
            <a href="{{ route('galery.update', $galery->id) }}" class="btn btn-primary">Edit Data</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
