<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Barang;

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

            // DB::table('users')->insert([
            //     'name' => 'albab',
            //     'email' => 'albab@gmail.com',
            //     'password' => Hash::make('admin12345'),
            //     'alamat' => 'jepara',
            //     'usertype' => 'admin'
            // ]);
            $cameras = [
                [
                    'nama_barang' => 'Kamera Canon EOS R5',
                    'harga' => 25000,
                    'gambar' => 'images/canon_eos_r5.jpg',
                    'deskripsi' => 'Kamera mirrorless full frame dengan kemampuan merekam video 8K.',
                ],
                [
                    'nama_barang' => 'Kamera Sony Alpha A7 III',
                    'harga' => 15000,
                    'gambar' => 'images/sony_alpha_a7iii.jpg',
                    'deskripsi' => 'Kamera mirrorless full frame dengan sensor 24MP dan performa autofokus yang cepat.',
                ],
                [
                    'nama_barang' => 'Kamera Nikon Z6 II',
                    'harga' => 10000,
                    'gambar' => 'images/nikon_z6ii.jpg',
                    'deskripsi' => 'Kamera mirrorless full frame dengan sistem stabilisasi gambar in-body dan video 4K.',
                ],
                // Tambahkan data kamera lainnya sesuai kebutuhan
            ];
    
            // Looping untuk memasukkan data ke tabel barangs
            foreach ($cameras as $camera) {
                Barang::create($camera);
            }
        // DB::table('barangs')->insert([
        //     [
        //         'nama_barang' => 'Sony a7ii',
        //         'kategori_id' => '1',
        //         'harga24' => '200000',
        //         'harga12' => '175000',
        //         'harga6' => '125000',
        //         'gambar' => '1649951685-Sony-A7-Mark-II-Body-Only-a.jpg'
        //     ],
        //     [
        //         'nama_barang' => 'Sony a6000',
        //         'kategori_id' => '1',
        //         'harga24' => '100000',
        //         'harga12' => '80000',
        //         'harga6' => '50000',
        //         'gambar' => '1649951696-21833_L_1.jpg'
        //     ],
        //     [
        //         'nama_barang' => 'Canon EOS 550D',
        //         'kategori_id' => '1',
        //         'harga24' => '85000',
        //         'harga12' => '75000',
        //         'harga6' => '60000',
        //         'gambar' => '1649951709-550d.jpg'
        //     ],
        //     [
        //         'nama_barang' => 'Sigma 30mm 1.4 for Sony',
        //         'kategori_id' => '2',
        //         'harga24' => '100000',
        //         'harga12' => '80000',
        //         'harga6' => '50000',
        //         'gambar' => '1649951742-sigma 30mm.jpg'
        //     ],
        //     [
        //         'nama_barang' => 'Sigma 16mm 1.4 for Sony',
        //         'kategori_id' => '2',
        //         'harga24' => '100000',
        //         'harga12' => '80000',
        //         'harga6' => '50000',
        //         'gambar' => '1649951751-images.jpg'
        //     ],
        //     [
        //         'nama_barang' => 'Canon EF 50mm 1.4 USM',
        //         'kategori_id' => '2',
        //         'harga24' => '75000',
        //         'harga12' => '60000',
        //         'harga6' => '50000',
        //         'gambar' => '1649951760-50mm canon usm.jpg'
        //     ],
        //     [
        //         'nama_barang' => 'Yongnuo 560 IV',
        //         'kategori_id' => '3',
        //         'harga24' => '125000',
        //         'harga12' => '90000',
        //         'harga6' => '75000',
        //         'gambar' => '1649951771-YONGNUO-YN560-IV-a.jpg'
        //     ],
        //     [
        //         'nama_barang' => 'DJI Ronin SC',
        //         'kategori_id' => '4',
        //         'harga24' => '175000',
        //         'harga12' => '150000',
        //         'harga6' => '100000',
        //         'gambar' => '1649951821-dji_rsc_2_ready_gan.jpg'
        //     ],
        // ]);
    }
}
