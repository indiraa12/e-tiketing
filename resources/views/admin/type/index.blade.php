@extends('dashboard/layouts/main')
@section('konten')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Type Transportasi</h4>
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
                            <a href="{{ route('type.create') }}" class="btn btn-primary btn-sm">Tambah Tipe </a>
                            <div class="mb-3"></div>

                            <div class="row">
                                <div class="input-group">
                                    <div class="col-sm-4">
                                        <form action="/admin/type" method="GET">
                                            <input type="search" class="form-control" name="cari"
                                                placeholder="Cari Apaa..">
                                    </div>
                                    <button class="btn btn-primary" type="submit" id="button-addon2"><i
                                            class="icon-search"></i></button>
                                    </form>
                                </div>
                            </div>

                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Tipe Transportasi</th>
                                            <th>Kelas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    @foreach ($type as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item['nama_type'] }}</td>
                                            <td>{{ $item['keterangan'] }}</td>
                                            <td>
                                                <div class="d-inline-flex">
                                                    <a style="scale: .9" href="{{ route('type.edit', $item->id) }}"
                                                        class="btn btn-warning btn-icon btn-rounded d-flex">
                                                        <i class="ti-pencil-alt m-auto"></i>
                                                    </a>
                                                    <form onsubmit="return confirm('apakah anda yakin?')"
                                                        action="{{ route('type.destroy', $item->id) }}" method="POST">
                                                        @method('delete')
                                                        @csrf
                                                        <button style="scale: .9" type="submit"
                                                            class="btn btn-danger btn-icon btn-rounded">
                                                            <i class="icon-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
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
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 Indi
                    Rahmadani</span>
        </footer>
        <!-- partial -->
    </div>
@endsection
