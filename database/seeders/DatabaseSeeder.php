<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\kategori;
use App\Models\produk;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        User::create([
            'name' => 'dzann',
            'email' => 'dzann@gmail.com',
            'password' => bcrypt('dzann123'),
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'dzaeys',
            'email' => 'dzaneys@gmail.com',
            'password' => bcrypt('dzaeys123'),
            'role' => 'customer',
        ]);
        User::create([
            'name' => 'zaey',
            'email' => 'd@gmail.com',
            'password' => bcrypt('d'),
            'role' => 'customer',
        ]);

        kategori::create([
            'name' => 'minuman',
        ]);

        kategori::create([
            'name' => 'makanan',
        ]);

        kategori::create([
            'name' => 'gaming gear',
        ]);

        kategori::create([
            'name' => 'electronic',
        ]);

        produk::create([
            'kategori_id' => '2',
            'name' => 'Dango',
            'harga' => '20000',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic exercitationem quis, vitae ipsa, corporis, aut quasi provident incidunt tempora aspernatur necessitatibus laudantium tempore! Pariatur, voluptatem exercitationem? Illum cupiditate officiis perspiciatis.',
            'foto' => 'img/dango.jpg'
        ]);

        produk::create([
            'kategori_id' => '4',
            'name' => 'Gigabyte G24F Monitor',
            'harga' => '2485000',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic exercitationem quis, vitae ipsa, corporis, aut quasi provident incidunt tempora aspernatur necessitatibus laudantium tempore! Pariatur, voluptatem exercitationem? Illum cupiditate officiis perspiciatis.',
            'foto' => 'img/Gigabyte G24F.jpeg'
        ]);

        produk::create([
            'kategori_id' => '1',
            'name' => 'Dancow',
            'harga' => '14500',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic exercitationem quis, vitae ipsa, corporis, aut quasi provident incidunt tempora aspernatur necessitatibus laudantium tempore! Pariatur, voluptatem exercitationem? Illum cupiditate officiis perspiciatis.',
            'foto' => 'img/dancow.jpeg'
        ]);

        produk::create([
            'kategori_id' => '3',
            'name' => 'Secret Lab Gaming Chair',
            'harga' => '1485000',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic exercitationem quis, vitae ipsa, corporis, aut quasi provident incidunt tempora aspernatur necessitatibus laudantium tempore! Pariatur, voluptatem exercitationem? Illum cupiditate officiis perspiciatis.',
            'foto' => 'img/gaming chair.jpeg'
        ]);
        
    }
}
