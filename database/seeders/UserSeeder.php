<?php

namespace Database\Seeders;

use App\Models\UnitKerja;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{

    public function run()
    {
        User::factory()->count(20)->create();

        $faker = Faker::create('id_ID');
        $kelamin = ['Laki-laki', 'Perempuan'];
        $users = [
            [
                'nama' => 'Admin',
                'nip' => $faker->numberBetween(100000000, 200000000),
                'email' => 'admin@demo.com',
                'alamat' => $faker->address(),
                'tempat_lahir' => $faker->address(),
                'tgl_lahir' => $faker->dateTimeBetween(Carbon::now()->subYears(45), Carbon::now()->subYears(17)),
                'no_tlp' => $faker->e164PhoneNumber(),
                'jenis_kelamin' => $kelamin[rand(0, 1)],
                'level' => 'admin',
                'email_verified_at' => now(),
                'password' => bcrypt('asdasdasd'), // password
                'remember_token' => Str::random(10),
                // 'id_unit_kerja' => UnitKerja,
                // 'id_jabatan' => ,
                // 'id_pangkat_golongan' => ,
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['email' => $user['email']], $user);
        }
    }
}
