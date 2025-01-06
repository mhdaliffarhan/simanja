<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'username' => 'supervisor',
            'role' => 'supervisor',
            'password' => Hash::make('password'),
        ]);

        User::factory()->create([
            'username' => 'pengentri1',
            'role' => 'pengentri',
            'password' => Hash::make('password'),
        ]);

        $this->call([
            AspekKinerjaSeeder::class,
        ]);
    }
}
