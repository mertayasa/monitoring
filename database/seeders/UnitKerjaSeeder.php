<?php

namespace Database\Seeders;

use App\Models\UnitKerja;
use Illuminate\Database\Seeder;

class UnitKerjaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unit_kerja = [
            [
                'nama' => 'Unit Kerja 1'
            ],
            [
                'nama' => 'Unit Kerja 2'
            ],
            [
                'nama' => 'Unit Kerja 3'
            ],
            [
                'nama' => 'Unit Kerja 4'
            ],
        ];

        foreach($unit_kerja as $unit){
            UnitKerja::updateOrCreate(['nama' => $unit['nama']], $unit);
        }
    }
}
