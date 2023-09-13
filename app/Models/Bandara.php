<?php

namespace App\Models;

use App\Http\Controllers\RuteController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bandara extends Model
{
    use HasFactory;
    protected $table = 'bandara';
    protected $fillable = [
        'id', 'kode', 'type_id', 'jumlah_kursi', 'keterangan'
    ];

    public function Type()
    {
        return $this->belongsTo(Type::class, 'type_id');
    }
    public function Rute()
    {
        return $this->hasOne(RuteController::class);
    }
}
