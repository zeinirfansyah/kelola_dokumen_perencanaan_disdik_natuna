@extends('layouts.app')

@section('content')
  <div class="home">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-6 dark-canvas">
          <div class="home-text">
            <h2><strong>Selamat Datang di Website Perencanaan Dinas Pendidikan Kabupaten Natuna</strong></h2>
            @if ($about)
              <p class="tnetang-kami">
                {{ $about->tentang_disdik }}
              </p>
            @else
              <p>No information available</p>
            @endif
          </div>
        </div>
        <div class="col">
        </div>
      </div>
    </div>
  </div>
@endsection
