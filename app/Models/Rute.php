<?php

namespace App\Models;

use App\Http\Controllers\HomeController;
use App\Models\Bandara;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rute extends Model
{
    use HasFactory;
    protected $table = 'rutes';
    protected $fillable = [
        'tujuan', 'rute_awal', 'rute_akhir', 'harga', 'bandara_id'
    ];

    public function Bandara()
    {
        return $this->belongsTo(Bandara::class, 'bandara_id');
    }

    public function Rute()
    {
        return $this->hasOne(HomeController::class);
    }
}
