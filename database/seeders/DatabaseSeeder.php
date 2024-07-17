<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Supply;
use Illuminate\Database\Seeder;
use Database\Seeders\tourPlaces;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Supply::query()
            ->insert([
               [
                   'name' => 'wifi',
                   'created_at' => now(),
                   'updated_at' => now(),
               ],
                [
                    'name' => 'tv',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'free_parking',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'air_conditioner',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'pool',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'gym',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'refrigerator',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'long_term',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'kitchen',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'elevator',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'pet_allowed',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
                [
                    'name' => 'washing_machine',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            tourPlaces::class
        ]);
    }
}
