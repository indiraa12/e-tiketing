<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Rute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        // $rute = Rute::all();
        return view('dashboard/home');
    }

    public function search(Request $request)
    {
        $request->validate([
            'rute_awal' => 'required',
            'rute_akhir' => 'required',
            'tgl_berangkat' => 'required|date',
            'jumlah_tiket' => 'required',
        ]);

        // Ambil input dari formulir
        $ruteAwal = $request->input('rute_awal');
        $ruteAkhir = $request->input('rute_akhir');
        $tglBerangkat = $request->input('tgl_berangkat');
        $jumlahTiket = $request->input('jumlah_tiket');

        // Lakukan pencarian tiket berdasarkan input
        $tiket = Pemesanan::where('rute_awal', $ruteAwal)
            ->where('rute_akhir', $ruteAkhir)
            ->where('tgl_berangkat', $tglBerangkat)
            ->where('jumlah_tiket', '>=', $jumlahTiket)
            ->get();

        return view('dashboard/home', compact('tiket'));
    }
}
