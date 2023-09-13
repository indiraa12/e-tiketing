<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanans';
    protected $fillable = [
        'kode_pemesanan', 'tgl_pemesanan', 'user_id', 'kode_kursi', 'rute_id', 'tgl_berangkat', 'total_bayar'
    ];


    public function Pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'rute_id');
    }
}
