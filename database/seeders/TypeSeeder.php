<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $type = [
            [
                'nama_type' => 'Pesawat',
                'keterangan' => 'Kelas Economy',
            ],
            [
                'nama_type' => 'Kereta Api',
                'keterangan' => 'Kelas Economy',
            ],
        ];
        foreach ($type as $value) {
            Type::create($value);
        }
    }
}
