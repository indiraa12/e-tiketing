<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Pemesanan;
use App\Models\Rute;
use App\Models\Transportation;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index(Request $request)
    {
        $query = Rute::with('transportation');
        if ($request->filled('rute_awal') && $request->filled('rute_akhir') && $request->filled('transportation')) {
           $query->where('rute_awal',  $request->rute_awal)->where('rute_akhir', $request->rute_akhir)
            ->whereHas('transportation.type', function ($query) use ($request) {
            $query->where('nama_type', $request->transportation);
        });
        }
        // $ruteAwal = Rute::distinct()->pluck('rute_awal')->toArray();
        $ruteAwal = Rute::pluck('rute_awal')->unique();
        $ruteAkhir = Rute::pluck('rute_akhir')->unique();
        // return $ruteAkhir;
        return view('dashboard.home',[
            'users' => User::where('role_id', 2)->count(),
            'pendapatan' => Payment::sum('total_bayar'),
            'pendapatanHariIni' => Payment::whereDate('created_at', now())->sum('total_bayar'),
            'totalPemesanan' => Payment::count(),
            'ruteAwal' => $ruteAwal,
            'ruteAkhir' => $ruteAkhir,
            'rutes' => $query->latest()->get(),
            'transportations' => Type::pluck('nama_type')->unique(),
        ]);
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
