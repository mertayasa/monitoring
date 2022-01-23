<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jabatan = [
            [
                'nama' => 'Jabatan 1'
            ],
            [
                'nama' => 'Jabatan 2'
            ],
            [
                'nama' => 'Jabatan 3'
            ],
            [
                'nama' => 'Jabatan 4'
            ],
        ];

        foreach($jabatan as $jabat){
            Jabatan::updateOrCreate(['nama' => $jabat['nama']], $jabat);
        }
    }
}
