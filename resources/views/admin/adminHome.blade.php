@extends('admin.layouts.master')
@section('content')
  <div class="content-wrapper">
    <div class="content">
      <section id="section1" class="hero">
        <div class="hero-canvas d-flex justify-content-center align-items-center text-center w-100 py-5">
          <div class="container">
            <div class="hero-text px-md-5">
              <h1><strong>Sistem Informasi Berbasis Web Dinas Pendidikan dan Kebudayaan Kabupaten Natuna
                  <br>(SIMBEK)</strong></h1>
            </div>
          </div>
        </div>
      </section>
      <section id="section2">
        <div class="container">
          <div class="card px-2 mt-3">
            <div class="row my-2">
              <div class="col col-md-4 d-flex justify-content-center align-items-center">
                @if ($about)
                  <div class="content">
                    <img src="{{ asset('storage/kepala_dinas/' . $about->foto_kepala_dinas) }}" class="img-fluid rounded"
                      style="height: 300px; width: 200px; object-fit: cover;  border: 5px solid #d7d7d7;"
                      alt="{{ $about->foto_kepala_dinas }}">
                  </div>
                @else
                  <div class="empty text-center" style="height: 300px; width: 200px; border: 1px solid #d7d7d7;">
                    No image available
                  </div>
                @endif
              </div>
              <div class="col d-flex justify-content-center align-items-center">
                @if ($about)
                  <div class="content">
                    <h5>Tentang Dinas Pendidikan</h5>
                    {{ $about->tentang_disdik }}
                    <hr>
                    <h5>Kutipan</h5>
                    <p>{{ $about->quotes }}</p>
                    <p>- {{ $about->kepala_dinas }}</p>
                  </div>
                @else
                  <p>Tidak ada informasi tersedia</p>
                @endif
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
@endsection
