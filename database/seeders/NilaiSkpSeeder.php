<?php

namespace Database\Seeders;

use App\Models\NilaiSkp;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class NilaiSkpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pegawai_kontrak = User::kontrak()->get();
        $faker = Faker::create('id_ID');

        foreach($pegawai_kontrak as $kontrak){
            $start_date = $faker->dateTimeBetween(Carbon::now()->subMonth(10), Carbon::now());
            $data_skp = [
                'id_pgw_kontrak' => $kontrak->id,
                'id_penilai' => User::penilai()->inRandomOrder()->first()->id,
                'tgl_mulai_penilaian' => $start_date,
                'tgl_selesai_penilaian' => $faker->dateTimeBetween($start_date, Carbon::now()->addMonth(3)),
                'permasalahan' => $faker->sentence(),
                'keberatan' => $faker->sentence(),
                'rekomendasi' => $faker->sentence(),
                'penjelasan_penilai' => $faker->sentence(),
                'keputusan_atasan' => $faker->sentence(),
            ];

            NilaiSkp::create($data_skp);
        }
    }
}
