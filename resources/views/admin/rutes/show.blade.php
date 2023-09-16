@extends('dashboard/layouts/main')
@section('konten')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Form Pemesanan | {{ $rute->transportation->kode }}</h4>
                            <p class="card-description">
                                {{ Carbon\Carbon::now()->translatedFormat('l, d F Y') }}
                            </p>
                            <form class="forms-sample">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tujuan</label>
                                    <input type="text" value="{{ $rute->tujuan }}" class="form-control" id="tujuan"
                                        placeholder="Tujuan">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Tempat Pemesanan</label>
                                    <input type="text" class="form-control" id="tempatPemesanan"
                                        placeholder="Tempat Pemesanan">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Tanggal Berangkat</label>
                                    <input type="date" value="{{ date('Y-m-d') }}" class="form-control"
                                        id="tanggalBerangkat" placeholder="Tanggal Berangkat">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputUsername1">Total Bayar</label>
                                    <input type="number" value="{{ $rute->harga }}" class="form-control" id="totalBayar"
                                        placeholder="Total Bayar">
                                </div>

                                <button type="submit" class="btn btn-primary btn-sm mr-1">Pesan Tiket</button>
                                <a href="{{ route('dashboard') }}" class="btn btn-light btn-sm">Cancel</a>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-title mb-3">Detail Tujuan</p>
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <thead>
                                        <tr>
                                            <th class="pl-0 pb-2 border-bottom">Tujuan</th>
                                            <th class="border-bottom pb-2">Rute Awal</th>
                                            <th class="border-bottom pb-2">Rute Akhir</th>
                                            <th class="border-bottom pb-2">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pl-0">{{ $rute->tujuan }}</td>
                                            <td class="text-muted">{{ $rute->rute_awal }}</td>
                                            <td class="text-muted">{{ $rute->rute_akhir }}</td>
                                            <td class="text-muted">{{ formatRupiah($rute->harga) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="card-title mb-3">Detail Transportasi</p>
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <thead>
                                        <tr>
                                            <th class="pl-0 pb-2 border-bottom">Kode</th>
                                            <th class="border-bottom pb-2">Jumlah Kursi</th>
                                            <th class="border-bottom pb-2">Type Transportasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pl-0">{{ $rute->transportation->kode }}</td>
                                            <td class="text-muted">{{ $rute->transportation->jumlah_kursi }}</td>
                                            <td class="text-muted">{{ $rute->transportation->type->full_name }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
