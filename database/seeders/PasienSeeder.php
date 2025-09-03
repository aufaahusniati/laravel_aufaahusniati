<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pasien;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pasien::create([
            'nama' => 'Budi Santoso',
            'alamat' => 'Jl. Merdeka No.1, Bandung',
            'telepon' => '081234567890',
            'rumah_sakit_id' => 1, // RS Umum Bandung
        ]);

        Pasien::create([
            'nama' => 'Siti Aminah',
            'alamat' => 'Jl. Cendana No.5, Jakarta',
            'telepon' => '082345678901',
            'rumah_sakit_id' => 2, // RS Jakarta
        ]);
    }
}
