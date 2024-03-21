@extends('admin.layouts.master') @section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Rencana Kerja Pembangunan Daerah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">Update RKPD</li>
              <li class="breadcrumb-item active">Create Document</li>
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
          <form action="{{ route('rkpd.edit', ['id' => $document->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="row">
              <div class="col">
                <label for="nama_dokumen" class="form-label">Nama Dokumen</label>
                <input type="text" name="nama_dokumen" value="{{ old('nama_dokumen', $document->nama_dokumen) }}" placeholder="Masukkan nama dokumen"
                  required class="form-control" />

                <!-- tahun dropdown -->
                <label for="tahun" class="form-label">Tahun</label>
                <select name="tahun" class="form-control" required>
                    <option value="" disabled selected>Pilih Tahun</option>
                    @for($year = date("Y"); $year >= 2000; $year--)
                        <option value="{{ $year }}" {{ $document->tahun == $year ? 'selected' : '' }}>{{ $year }}</option>
                    @endfor
                </select>

                <label for="file" class="form-label">{{ __('File')}}</label>
                <input type="file" name="file" accept=".pdf, .doc, .docx, .xls, .xlsx"  class="form-control">
                @error('file')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              
              
              </div>
              <div class="col">
                <label for="keterangan" class="form-label">Keterangan</label>
              <textarea name="keterangan" placeholder="Masukkan keterangan" class="form-control" rows="7">{{ old('keterangan', $document->keterangan) }}</textarea>
              </div>
              
            </div>

            <button type="submit" class="btn btn-primary mt-2">
              Edit Document
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
