@extends('layouts.app')

@section('content')
  <div class="home">
    <section data-aos="zoom-out" data-aos-duration="1000" id="section1" class="hero">
      <div class="hero-canvas d-flex justify-content-center align-items-center text-center w-100">
        <div class="container">
          <div  data-aos="zoom-in" data-aos-duration="1000" class="hero-text px-md-5">
            <h1><strong>Sistem Informasi Berbasis Web Dinas Pendidikan dan Kebudayaan Kabupaten Natuna <br>(SIMBEK)</strong></h1>
          </div>
        </div>
      </div>
    </section>
    <section data-aos="zoom-in" data-aos-duration="1000" id="section2">
      <div class="container">
        <div class="row my-5">
          <div class="col-12 col-md-4 d-flex justify-content-center align-items-center">
            @if ($about)
              <div class="content">
                <img src="{{ asset('storage/kepala_dinas/' . $about->foto_kepala_dinas) }}" class="img-fluid rounded"
                  style="height: 300px; width: 200px; object-fit: cover;  border: 5px solid #d7d7d7;"
                  alt="{{ $about->foto_kepala_dinas }}">
              </div>
            @else
            <p>Tidak ada informasi tersedia</p>
            @endif
          </div>
          <div class="col d-flex justify-content-center align-items-center text-center text-md-start mt-3 mt-md-0">
            @if ($about)
              <div class="content">
               <div class="tentand-disdik">
                <h5>Tentang Dinas Pendidikan</h5>
                {{ $about->tentang_disdik }}
               </div>
                <hr>
               <div class="kutipan-kadis d-none d-md-block">
                <h5>Kutipan</h5>
                <p>{{ $about->quotes }}</p>
                <p>- {{ $about->kepala_dinas }}</p>
               </div>
              </div>
            @else
              <p>Tidak ada informasi tersedia</p>
            @endif
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
