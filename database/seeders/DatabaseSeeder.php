<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Feature;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\User::create([
            'name' => 'Super Admin',
            'username' => 'admin',
            'phone' => '0000',
            'password'=> Hash::make('admin'),
        ]);
        Feature::create([
            'feature_name' => 'Undangan Digital'
        ]);
        Feature::create([
            'feature_name' => 'Nama Tamu Undangan'
        ]);
        Feature::create([
            'feature_name' => 'Hitung Mundur Waktu Acara'
        ]);
        Feature::create([
            'feature_name' => 'Lagu'
        ]);
        Feature::create([
            'feature_name' => 'Google Maps'
        ]);
        Feature::create([
            'feature_name' => 'Cover Undangan'
        ]);
        Feature::create([
            'feature_name' => 'Gallery Foto'
        ]);
        Feature::create([
            'feature_name' => 'Konfirmasi Kedatangan'
        ]);
        Feature::create([
            'feature_name' => 'Ucapan Tamu Undangan'
        ]);
        Feature::create([
            'feature_name' => 'Google Kalender'
        ]);
        
        Feature::create([
            'feature_name' => 'Video'
        ]);

    }
}
