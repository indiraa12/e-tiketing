@extends('dashboard/layouts/main')
@section('konten')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title" align="center">Data Pemesanan {{ auth()->user()->name }}</h4>
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
                                <div class="input-group">
                                    <div class="col-sm-4">
                                        <form action="/admin/pengguna" method="GET">
                                            <input type="text" class="form-control" name="search"
                                                placeholder="Cari Apaa..">
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
                                            <th>No</th>
                                            <th>Kode Pemesanan</th>
                                            <th>Nama</th>
                                            <th>Tujuan</th>
                                            <th>Tanggal Berangkat</th>
                                            <th>Jam Cekin</th>
                                            <th>Jam Berangkat</th>
                                            <th>Total Bayar</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    @foreach ($payments as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode_pemesanan }}</td>
                                            <td>{{ $item->penumpang->name }}</td>
                                            <td>{{ $item->rute->tujuan }}</td>
                                            <td>{{ $item->tanggal_berangkat }}</td>
                                            <td>{{ $item->jam_cekin }}</td>
                                            <td>{{ $item->jam_berangkat }}</td>
                                            <td>{{ formatRupiah($item->total_bayar) }}</td>
                                            <td>
                                                <label class="badge badge-success">Paid</label>
                                            </td>
                                            <td>
                                                <a href="{{ route('pesanan.show', $item->id) }}"
                                                    class="btn btn-outline-linkedin btn-sm">
                                                    <i class="ti-new-window"></i>
                                                    Detail</a>
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
