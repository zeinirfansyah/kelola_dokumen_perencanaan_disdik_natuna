@extends('admin.layouts.master') @section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Update Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active">Update Profile</li>
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
          <form action="{{ route('profile.edit', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')

            <div class="row">
              <div class="col">
                <label for="nama_user" class="form-label">Nama User</label>
                <input type="text" name="nama_user" value="{{ old('nama_user', $user->nama_user), }}" placeholder="Masukkan nama lengkap"
                  required class="form-control" />

                <label for="no_telepon" class="form-label">Nomor Telepon</label>
                <input name="no_telepon" value="{{ old('no_telepon', $user->no_telepon) }}" placeholder="Masukkan nomor telepon"
                  class="form-control" />

                <label for="avatar" class="form-label">Avatar</label>
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
                <input name="email" value="{{ old('email', $user->email) }}" placeholder="Masukkan email" class="form-control" />

                <!-- password -->
                <hr>
                <div class="password mt-2">
                <label for="activatePassword">Ganti Password</label>
                <input type="checkbox" id="activatePassword" onchange="togglePassword()" class="ml-1"/>
                <input id="passwordInput" type="password" name="password" placeholder="Masukkan password" class="form-control" />

                <script>
                    document.addEventListener("DOMContentLoaded", function () {
                        // Set initial state
                        togglePassword();
                    });
                
                    function togglePassword() {
                        var passwordInput = document.getElementById("passwordInput");
                        var activatePassword = document.getElementById("activatePassword");
                
                        passwordInput.disabled = !activatePassword.checked;
                    }
                </script>
                </div>

              </div>
            </div>

            <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#confirmationModal">
              Update Profile
            </button>

            <!-- Confirmation alert modal -->
            <div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog"
                aria-labelledby="confirmationModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="confirmationModalLabel">Confirmation</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to update this profile?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>
                        </div>
                    </div>
                </div>
            </div>


          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
