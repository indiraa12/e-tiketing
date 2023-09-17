@extends('dashboard/layouts/main')
@section('konten')
    <div class="main-panel">
        <div class="content-wrapper">
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                </div>
            @endif
            <div class="d-flex justify-content-center gap-2">
                <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Detail Pemesanan | <span
                                    class="font-weight-normal text-muted">{{ $pesanan->penumpang->name }}</span></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <address class="text-primary">
                                        <p class="font-weight-bold">
                                            Kode Pemesanan
                                        </p>
                                        <p class="mb-2">
                                            {{ $pesanan->kode_pemesanan }}
                                        </p>
                                        <p class="font-weight-bold">
                                            Tempat Pemesanan
                                        </p>
                                        <p class="mb-2">
                                            {{ $pesanan->tempat_pemesanan }}
                                        </p>
                                        <p class="font-weight-bold">
                                            Kode Kursi
                                        </p>
                                        <p class="mb-2">
                                            {{ $pesanan->kode_kursi }}
                                        </p>
                                        <p class="font-weight-bold">
                                            Dibuat Oleh
                                        </p>
                                        <p>
                                            {{ $pesanan->user->name }}
                                        </p>
                                    </address>
                                </div>
                                <div class="col-md-6">
                                    <address class="text-primary">
                                        <p class="font-weight-bold">
                                            Tanggal Pemesanan
                                        </p>
                                        <p class="mb-2">
                                            {{ Carbon\Carbon::parse($pesanan->tanggal_pemesanan)->translatedFormat('d/m/y') }}
                                        </p>
                                        <p class="font-weight-bold">
                                            Tanggal Berangkat
                                        </p>
                                        <p class="mb-2">
                                            {{ Carbon\Carbon::parse($pesanan->tanggal_berangkat)->translatedFormat('l, d F Y') }}
                                        </p>
                                        <p class="font-weight-bold">
                                            Jam Cekin
                                        </p>
                                        <p class="mb-2">
                                            {{ Carbon\Carbon::parse($pesanan->jam_cekin)->translatedFormat('H:i') }}
                                            WIB </p>
                                        <p class="font-weight-bold">
                                            Jam Berangkat
                                        </p>
                                        <p>
                                            {{ Carbon\Carbon::parse($pesanan->jam_berangkat)->translatedFormat('H:i') }}
                                            WIB </p>
                                    </address>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                Total Bayar : <b>{{ formatRupiah($pesanan->total_bayar) }} ✅</b>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 grid-margin">
                    <div class="card">
                        <div class="card-body pb-2">
                            <h4 class="card-title">Detail Pengguna</h4>
                            <div class="row">
                                <div class="col-md-5">
                                    <address class="text-primary">
                                        <p class="font-weight-bold">
                                            Name
                                        </p>
                                        <p class="mb-2">
                                            {{ $pesanan->penumpang->name }}
                                        </p>
                                        <p class="font-weight-bold">
                                            Alamat
                                        </p>
                                        <p class="mb-2">
                                            {{ $pesanan->penumpang->alamat_penumpang }}
                                        </p>
                                        <p class="font-weight-bold">
                                            Jenis Kelamin
                                        </p>
                                        <p>
                                            {{ $pesanan->penumpang->jenis_kelamin }}
                                        </p>
                                    </address>
                                </div>
                                <div class="col-md-5">
                                    <address class="text-primary">
                                        <p class="font-weight-bold">
                                            Username
                                        </p>
                                        <p class="mb-2">
                                            {{ $pesanan->penumpang->username }}
                                        </p>
                                        <p class="font-weight-bold">
                                            Phone
                                        </p>
                                        <p class="mb-2">
                                            {{ $pesanan->penumpang->telepon }}
                                        </p>
                                        <p class="font-weight-bold">
                                            Tanggal Lahir
                                        </p>
                                        <p>
                                            {{ $pesanan->penumpang->tgl_lahir }}
                                        </p>
                                    </address>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-bold mb-4">Detail Tujuan</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th class="pl-0 pb-2 border-bottom text-center">Tujuan</th>
                                            <th class="border-bottom pb-2 text-center">Rute Awal</th>
                                            <th class="border-bottom pb-2 text-center">Rute Akhir</th>
                                            <th class="border-bottom pb-2 text-center">Harga</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pl-0 text-center">{{ $pesanan->rute->tujuan }}</td>
                                            <td class="text-muted text-center">{{ $pesanan->rute->rute_awal }}</td>
                                            <td class="text-muted text-center">{{ $pesanan->rute->rute_akhir }}</td>
                                            <td class="text-muted text-center">{{ formatRupiah($pesanan->rute->harga) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="font-weight-bold mb-4">Detail Transportasi</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-sm">
                                    <thead>
                                        <tr>
                                            <th class="pl-0 pb-2 border-bottom text-center">Kode</th>
                                            <th class="border-bottom pb-2 text-center">Jumlah Kursi</th>
                                            <th class="border-bottom pb-2 text-center">Type Transportasi</th>
                                            <th class="border-bottom pb-2 text-center">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="pl-0 text-center">{{ $pesanan->rute->transportation->kode }}</td>
                                            <td class="text-muted text-center">
                                                {{ $pesanan->rute->transportation->jumlah_kursi }}</td>
                                            <td class="text-muted text-center">
                                                {{ $pesanan->rute->transportation->type->full_name }}
                                            </td>
                                            <td class="text-muted text-center">
                                                {{ $pesanan->rute->transportation->keterangan }}
                                            </td>
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
