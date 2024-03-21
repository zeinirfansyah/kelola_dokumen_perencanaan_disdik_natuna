@extends('admin.layouts.master') @section('content')
  <div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dokumen Rencana Kerja Dinas Pendidikan</h1>
          </div>
          <!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Home</li>
              <li class="breadcrumb-item active">Dokumen Rencana Kerja Dinas Pendidikan</li>
            </ol>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <div class="content">
      <div class="container-fluid">
        <!-- filter and search -->
        <div class="row">
          <div class="col-md-12">
            <div class="container-fluid">
              <div class="card">
                <div class="card-header">
                  <a href="{{ route('renja.create') }}" class="btn btn-default">Add</a>

                  <div class="card-tools">
                    <form method="GET" action="{{ route('renja.index') }}" class="form-inline">
                      <div class="input-group input-group-sm" style="width: 300px">
                        <select name="tahun" class="form-control">
                        <option value="semua" selected>Semua</option>
                          @for($year = date("Y"); $year >= 2000; $year--)
                          <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                            {{ $year }}
                          </option>
                      @endfor
                        </select>
                        <input type="text" name="search" class="form-control ml-2" placeholder="Search"
                          value="{{ request('search') }}" />

                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
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

        <!-- Main row -->
        <div class="row">
          <div class="col-md-12">
            <div class="container-fluid">
              <div class="card">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>
                            Tahun
                        </th>
                        <th>
                            Nama Dokumen
                        </th>
                        <th>
                            Keterangan
                        </th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($documents as $document)
                        <tr>
                          <td class="col-1">
                            {{ $document->tahun }}
                          </td>
                          <td class="col-4">
                            <a href="{{ asset('storage/documents/renja/' . $document->file) }}"
                              download>{{ $document->nama_dokumen }}</a>
                          </td>
                          <td class="col-4 truncate-text">
                            {{ $document->keterangan }}
                          </td>
                          <td class="col-2">
                            <a href="{{ route('renja.update', ['id' => $document->id]) }}" class="btn btn-default">Edit</a>
                            <form action="{{ route('renja.delete', ['id' => $document->id]) }}" method="POST" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="button" class="btn btn-danger" data-toggle="modal"
                                data-target="#deleteModal{{ $document->id }}">
                                Delete
                              </button>

                              <!-- Confirmation alert modal -->
                              <div class="modal fade" id="deleteModal{{ $document->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="deleteModalLabel{{ $document->id }}" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="deleteModalLabel{{ $document->id }}">Confirmation</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <p>Are you sure you want to delete this document?</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                      <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <br />
                  <div class="mx-3">
                    {{ $documents->links('pagination::bootstrap-5') }}
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row (main row) -->
      </div>
    </div>
  </div>

  <script>
    // Add this script to your page or in a separate JavaScript file
    document.addEventListener('DOMContentLoaded', function() {
      var elements = document.getElementsByClassName('truncate-text');

      for (var i = 0; i < elements.length; i++) {
        var text = elements[i].textContent.trim();
        var words = text.split(' ');
        var truncatedText = words.slice(0, 10).join(' ');

        if (words.length > 10) {
          truncatedText += '...'; // Add ellipsis if content is truncated
        }

        elements[i].textContent = truncatedText;
      }
    });
  </script>
@endsection
