<?php

namespace Database\Seeders;

use Exception;
use App\Models\Unit;
use App\Models\User;
use App\Models\Guest;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Inventory;
use App\Models\UnitGroup;
use Illuminate\Database\Seeder;
use Database\Seeders\GuestSeeder;
use Database\Seeders\UnitSeeder;
use Database\Seeders\UnitGroupSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            KategoriSeeder::class,
            produkSeeder::class,
            KontakSeeder::class,

        ]);

    }
}
