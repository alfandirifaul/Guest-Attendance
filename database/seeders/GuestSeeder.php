<?php

namespace Database\Seeders;

use App\Models\Guest;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 1500; $i++) {
            Guest::create([
                'nama' => $faker->userName,
                'asal_instansi' => $faker->word,
                'tujuan' => $faker->word,
                'nomor_hp' => $faker->phoneNumber,
                'foto' => $faker->image('public/storage/image', 640, 480, null, false),
                'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
                'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
            ]);
        }
    }
}
