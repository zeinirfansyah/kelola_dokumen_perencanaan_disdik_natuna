@extends('layouts.app')

@section('content')
  <div class="hero">
    <div class="container-fluid hero-canvas d-flex justify-content-center align-items-center">
      <div class="row">
        <div class="col dark-canvas">
         <div class="home-text">
          <div class="card" style="width: 40rem;">
            <div class="card-header">{{ __('Register') }}</div>
  
            <div class="card-body">
              <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
  
                <div class="row mb-3">
                  <label for="nama_user" class="col-md-4 col-form-label text-md-end">{{ __('Nama User') }}</label>
  
                  <div class="col-md-6">
                    <input id="nama_user" type="text" class="form-control @error('nama_user') is-invalid @enderror"
                      name="nama_user" value="{{ old('nama_user') }}" required autocomplete="nama_user" autofocus>
  
                    @error('nama_user')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
  
                <div class="row mb-3">
                  <label for="no_telepon" class="col-md-4 col-form-label text-md-end">{{ __('Nomor Telepon') }}</label>
  
                  <div class="col-md-6">
                    <input id="no_telepon" type="text"
                      class="form-control @error('no_telepon') is-invalid @enderror" name="no_telepon"
                      value="{{ old('no_telepon') }}" required autocomplete="no_telepon">
  
                    @error('no_telepon')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
  
                <div class="row mb-3">
                  <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>
  
                  <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                      name="email" value="{{ old('email') }}" required autocomplete="email">
  
                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
  
                <div class="row mb-3">
                  <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</label>
                  <input id="avatar" type="file" class="w-50 form-control @error('avatar') is-invalid @enderror"
                    name="avatar">
                  @error('avatar')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
  
                <div class="row mb-3">
                  <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
  
                  <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                      name="password" required autocomplete="new-password">
  
                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>
  
                <div class="row mb-3">
                  <label for="password-confirm"
                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
  
                  <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                      autocomplete="new-password">
                  </div>
                </div>
  
                <div class="row mb-0">
                  <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                      {{ __('Register') }}
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
         </div>
        </div>
      </div>
    </div>
  </div>
@endsection
