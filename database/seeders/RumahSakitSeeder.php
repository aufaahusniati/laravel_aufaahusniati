<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RumahSakit;

class RumahSakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RumahSakit::create([
            'nama' => 'RS Umum Bandung',
            'alamat' => 'Jl. Asia Afrika No.10, Bandung',
            'email' => 'rsbandung@example.com',
            'telepon' => '0221234567',
        ]);

        RumahSakit::create([
            'nama' => 'RS Jakarta',
            'alamat' => 'Jl. Sudirman No.20, Jakarta',
            'email' => 'rsjakarta@example.com',
            'telepon' => '0217654321',
        ]);
    }
}
