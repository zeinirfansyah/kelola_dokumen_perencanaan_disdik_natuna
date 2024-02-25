@extends('layouts.app')

@section('content')
  <div class="home">
    <div class="container-fluid">
      <div class="row">
        
        <div class="col">
        </div>
        <div class="col-12 col-md-6 dark-canvas">
            <div class="home-text">
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
                <p>No information available</p>
              @endif
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection
