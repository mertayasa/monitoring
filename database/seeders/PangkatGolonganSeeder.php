<?php

namespace Database\Seeders;

use App\Models\PangkatGolongan;
use Illuminate\Database\Seeder;

class PangkatGolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pangkat_golongan = [
            [
                'nama' => 'Golongan 1'
            ],
            [
                'nama' => 'Golongan 2'
            ],
            [
                'nama' => 'Golongan 3'
            ],
            [
                'nama' => 'Golongan 4'
            ],
        ];

        foreach($pangkat_golongan as $golongan){
            PangkatGolongan::updateOrCreate(['nama' => $golongan['nama']], $golongan);
        }
    }
}
