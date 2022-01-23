<?php

namespace Database\Factories;

use App\Models\Jabatan;
use App\Models\PangkatGolongan;
use App\Models\UnitKerja;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Carbon\Carbon;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $kelamin = ['Laki-laki', 'Perempuan'];
        $level = ['penilai', 'kontrak'];

        return [
            'nama' => $this->faker->name(),
            'nip' => $this->faker->numberBetween(100000000, 200000000),
            'email' => $this->faker->email(),
            'alamat' => $this->faker->address(),
            'tempat_lahir' => $this->faker->address(),
            'tgl_lahir' => $this->faker->dateTimeBetween(Carbon::now()->subYears(45), Carbon::now()->subYears(17)),
            'no_tlp' => $this->faker->e164PhoneNumber(),
            'jenis_kelamin' => $kelamin[rand(0, 1)],
            'level' => $level[rand(0,1)],
            'email_verified_at' => now(),
            'password' => bcrypt('asdasdasd'), // password
            'remember_token' => Str::random(10),
            'id_unit_kerja' => UnitKerja::inRandomOrder()->first()->id,
            'id_jabatan' => Jabatan::inRandomOrder()->first()->id,
            'id_pangkat_golongan' => PangkatGolongan::inRandomOrder()->first()->id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
