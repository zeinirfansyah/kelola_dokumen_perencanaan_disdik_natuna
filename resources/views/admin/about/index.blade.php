@extends('admin.layouts.master') @section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">About</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active">About</li>
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
              <h3>Tentang Kami</h3>
            </div>
          </div>
          <div class="card-body">
            <table class="table table-bordered mb-2">
              <tr>
                <td colspan="2">
                  <div class="row">
                    <div class="col-12 col-md-3">
                      <div class="d-flex justify-content-center">
                        <div class="image">
                          <div class="row">
                            <div class="col">
                              <img src="{{ asset('storage/kepala_dinas/' . $about->foto_kepala_dinas) }}"
                                class="img-fluid rounded"
                                style="height: 300px; width: 200px; object-fit: cover;  border: 5px solid #d7d7d7;"
                                alt="{{ $about->foto_kepala_dinas }}">
                            </div>
                          </div>
                          <div class="row">
                            <div class="col">
                              <h6 class="text-center mb-0 mt-2"><strong>{{ $about->kepala_dinas }}</strong></h6>
                              <div class="text-center">(Kepala Dinas)</div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <h5>Tentang Dinas Pendidikan</h5>
                      {{ $about->tentang_disdik }}
                      <hr>
                      <h5>Quote</h5>
                      <p>{{ $about->quotes }} - {{ $about->kepala_dinas }}</p>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <th class="col-2">Nomor Telepon</th>
                <td>{{ $about->no_telepon }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>{{ $about->email }}</td>
              </tr>
              <tr>
                <th>Instagram</th>
                <td>{{ $about->instagram }}</td>
              </tr>
              <tr>
                <th>Alamat</th>
                <td>{{ $about->alamat }}</td>
              </tr>
            
            </table>
            <a href="{{ route('about.update', ['id' => $about->id]) }}" class="btn btn-primary">Edit Data</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
