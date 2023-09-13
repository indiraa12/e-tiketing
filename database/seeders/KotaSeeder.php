<?php

namespace Database\Seeders;

use App\Models\Kota;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kota = [
            [
                'kota' => 'Jakarta',
            ],
            [
                'kota' => 'Purwokerto',
            ],
            [
                'kota' => 'Yogyakarta',
            ],
            [
                'kota' => 'Bandung',
            ],
        ];
        foreach ($kota as $value) {
            Kota::create($value);
        }
    }
}
