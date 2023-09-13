@extends('dashboard/layouts/main')
@section('konten')
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title" align="center">Data Pengguna</h4>
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
            </div>
        @endif

        @if (session()->has('berhasil'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session('berhasil') }}
            </div>
        @endif

        @if (session()->has('hapus'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('hapus') }}
            </div>
        @endif

            <div class="row">
                <div class="input-group" >
                    <div class="col-sm-4">
                        <form action="/admin/pengguna" method="GET">
                            <input type="text" class="form-control" name="search" placeholder="Cari Apaa..">
                    </div>
                    <button class="btn btn-primary" type="submit" id="button-addon2"><i
                            class='icon-search'></i></button>
                    </form>
                </div>
            </div>

            <div class="table-responsive pt-3">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Nama Pengguna</th>
                    <th>Alamat</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Telepon</th>
                    @if (Auth::user()->role_id == 1)
                    <th>Aksi</th>
                    @endif
                  </tr>
                </thead>

             @foreach ($data_pengguna as $item)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item['username'] }}</td>
                  <td>{{ $item['name'] }}</td>
                  <td>{{ $item['alamat_penumpang'] }}</td>
                  <td>{{ $item['tgl_lahir'] }}</td>
                  <td>{{ $item['jenis_kelamin'] }}</td>
                  <td>{{ $item['telepon'] }}</td>
                  @if (Auth::user()->role_id == 1)
                  <td>
                    <a href="{{ route('pengguna.edit', $item->id) }}" class="badge bg-warning ">
                      <i class="ti-pencil-alt mx-2"></i></a>
                      <form onsubmit="return confirm('apakah anda yakin?')"
                          action="{{ route('pengguna.destroy', $item->id) }}" method="POST"
                          class="d-inline">
                          @method('delete')
                          @csrf
                          <button type="submit" class="badge bg-danger border-0"><i class="icon-trash mx-2"></i></button>
                      </form>
                  </td>
              @endif
                </tr>
             @endforeach
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:../../partials/_footer.html -->
  <footer class="footer">
    <div class="d-sm-flex justify-content-center justify-content-sm-between">
      <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 Indi Rahmadani</span>
  </footer>
  <!-- partial -->
</div>
@endsection