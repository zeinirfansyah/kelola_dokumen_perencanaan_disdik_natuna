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
              <li class="breadcrumb-item">About</li>
              <li class="breadcrumb-item active">Update About</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <div class="content">
      <div class="container-fluid">
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
          <form action="{{ route('about.edit', ['id' => $about->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="row">
              <div class="col">
                <label for="kepala_dinas" class="form-label">Nama User</label>
                <input type="text" name="kepala_dinas" value="{{ old('kepala_dinas', $about->kepala_dinas) }}"
                  placeholder="Masukkan nama lengkap" required class="form-control" />

                <label for="no_telepon" class="form-label">Nomor Telepon</label>
                <input name="no_telepon" value="{{ old('no_telepon', $about->no_telepon) }}"
                  placeholder="Masukkan nomor telepon" class="form-control" />

                <!-- email input -->
                <label for="email" class="form-label">Email</label>
                <input name="email" value="{{ old('email', $about->email) }}" placeholder="Masukkan email"
                  class="form-control" />
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror

                <!-- instagram input -->
                <label for="instagram" class="form-label">Instagram</label>
                <input name="instagram" type="text" value="{{ old('instagram', $about->instagram) }}"
                  placeholder="Masukan Instagram" class="form-control" />
                @error('instagram')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror

                <!-- alamat -->
                <label for="alamat" class="form-label">{{ __('Alamat') }}</label>
                <textarea name="alamat" class="form-control" rows="3" placeholder="Masukan Alamat">{{ old('alamat', $about->alamat) }}</textarea>

                <label for="foto_kepala_dinas"
                class="col-md-4 col-form-label text-md-end">{{ __('Foto Kepala Dinas') }}</label>
                <input id="foto_kepala_dinas" type="file"
                  class="form-control @error('foto_kepala_dinas') is-invalid @enderror" name="foto_kepala_dinas"
                  accept=".jpg, .jpeg, .png">
                @error('foto_kepala_dinas')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror


              </div>
              <div class="col">
                <!-- textarea tentang disdik-->
                <label for="tentang_disdik" class="form-label">Tentang Disdik</label>
                <textarea name="tentang_disdik" class="form-control" rows="5" placeholder="Tentang Disdik">{{ old('tentang_disdik', $about->tentang_disdik) }}</textarea>

                <!-- quotes -->
                <label for="quotes" class="form-label">{{ __('Quotes') }}</label>
                <textarea name="quotes" class="form-control" rows="5" placeholder="Masukan Quotes">{{ old('quotes', $about->quotes) }}</textarea>
              </div>
            </div>

            <button type="submit" class="btn btn-primary mt-2">
              Update About
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
