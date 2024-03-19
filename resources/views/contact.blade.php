@extends('layouts.app')

@section('content')
  <div class="hero">
    <div class="container-fluid  ">
      <div  data-aos="zoom-out" data-aos-duration="1500" class="row">
        <div class="col">
        </div>
        <div class="col-12 col-md-6 hero-canvas d-flex justify-content-center align-items-center">
            <div class="hero-text">
              <h2><strong>Kontak Dinas Pendidikan Kabupaten Natuna</strong></h2>
              @if ($about)
              <div class="tentang-kami">
                <ul>
                    <li>Telepon: {{ $about->no_telepon }}</li>
                    <li>Email: {{ $about->email }}</li>
                    <li>Instagram: {{ $about->instagram }}</li>
                    <li>Alamat: {{ $about->alamat }}</li>

                </ul>
              </div>
              @else
              <div class="empty px-5" style="border: 1px solid #d7d7d7;">
                <h3 class="text-white text-center my-5">Tidak ada informasi tersedia</h3>
              </div>
              @endif
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
