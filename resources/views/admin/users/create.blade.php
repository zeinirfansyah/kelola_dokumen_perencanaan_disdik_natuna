@extends('admin.layouts.master') @section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User Management</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item">User Management</li>
              <li class="breadcrumb-item active">Create User</li>
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
          <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
              <div class="col">
                <label for="nama_user" class="form-label">Nama User</label>
                <input type="text" name="nama_user" value="{{ old('nama_user') }}" placeholder="Masukkan nama lengkap"
                  required class="form-control" />

                <label for="no_telepon" class="form-label">Nomor Telepon</label>
                <input name="no_telepon" value="{{ old('no_telepon') }}" placeholder="Masukkan nomor telepon"
                  class="form-control" />

                <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Avatar')}}</label>
                <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                @error('avatar')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
              </div>
              <div class="col">
                <!-- email input -->
                <label for="email" class="form-label">Email</label>
                <input name="email" value="{{ old('email') }}" placeholder="Masukkan email" class="form-control" />

                <!-- password input -->
                <label for="password" class="form-label">Password</label>
                <input name="password" type="password" value="{{ old('password') }}" placeholder="Masukan Password" class="form-control" />

                <!-- role dropdown -->
                <label for="role" class="form-label">Role</label>
                <select name="role" class="form-control">
                  <option value="admin">Admin</option>
                  <option value="visitor">Visitor</option>
                </select>
              </div>
            </div>

            <button type="submit" class="btn btn-primary mt-2">
              Create User
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
