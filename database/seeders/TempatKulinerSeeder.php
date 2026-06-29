<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TempatKuliner;

class TempatKulinerSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_tempat' => 'Sate Ayam Madura Cak Lontong',
                'alamat' => 'Jl. Sudirman No. 45, Jakarta Selatan',
                'jenis_makanan' => 'Sate, Lontong, Madura',
                'jam_operasional' => '17:00 - 23:00',
                'gambar' => 'tempat_kuliners/sate_ayam.jpg',
            ],
            [
                'nama_tempat' => 'Warung Nasi Padang Sederhana',
                'alamat' => 'Jl. Thamrin No. 12, Jakarta Pusat',
                'jenis_makanan' => 'Nasi Padang, Rendang, Ayam Pop',
                'jam_operasional' => '10:00 - 21:00',
                'gambar' => 'tempat_kuliners/nasi_padang.jpg',
            ],
            [
                'nama_tempat' => 'Kopi Kenangan Senja',
                'alamat' => 'Ruko Emerald, Bintaro Jaya',
                'jenis_makanan' => 'Kopi, Roti Bakar, Snack',
                'jam_operasional' => '08:00 - 22:00',
                'gambar' => 'tempat_kuliners/kopi.jpg',
            ],
            [
                'nama_tempat' => 'Bakso Malang Cak Man',
                'alamat' => 'Jl. Merdeka No. 8, Bandung',
                'jenis_makanan' => 'Bakso, Pangsit, Mie',
                'jam_operasional' => '10:00 - 22:00',
                'gambar' => 'tempat_kuliners/bakso.jpg',
            ],
            [
                'nama_tempat' => 'Mie Ayam Bakso Gajah Mada',
                'alamat' => 'Jl. Gajah Mada No. 15, Jakarta Barat',
                'jenis_makanan' => 'Mie Ayam, Bakso, Pangsit Goreng',
                'jam_operasional' => '11:00 - 21:00',
                'gambar' => 'tempat_kuliners/mie_ayam.jpg',
            ],
            [
                'nama_tempat' => 'Martabak Pecenongan 78',
                'alamat' => 'Jl. Pecenongan No. 78, Jakarta Pusat',
                'jenis_makanan' => 'Martabak Manis, Martabak Telur',
                'jam_operasional' => '16:00 - 23:30',
                'gambar' => 'tempat_kuliners/martabak.jpg',
            ],
            [
                'nama_tempat' => 'Ayam Geprek Bensu',
                'alamat' => 'Jl. Margonda Raya, Depok',
                'jenis_makanan' => 'Ayam Geprek, Nasi, Sambal',
                'jam_operasional' => '10:00 - 22:00',
                'gambar' => 'tempat_kuliners/ayam_geprek.jpg',
            ],
            [
                'nama_tempat' => 'Seblak Jeletot Mpok Teki',
                'alamat' => 'Jl. Buah Batu No. 50, Bandung',
                'jenis_makanan' => 'Seblak, Kerupuk, Pedas',
                'jam_operasional' => '12:00 - 21:00',
                'gambar' => 'tempat_kuliners/seblak.jpg',
            ],
            [
                'nama_tempat' => 'Soto Betawi H. Husein',
                'alamat' => 'Jl. Padang Panjang No. 6, Manggarai',
                'jenis_makanan' => 'Soto Betawi, Daging, Emping',
                'jam_operasional' => '07:00 - 14:00',
                'gambar' => 'tempat_kuliners/soto.jpg',
            ],
            [
                'nama_tempat' => 'Nasi Goreng Kebon Sirih',
                'alamat' => 'Jl. Kebon Sirih, Menteng',
                'jenis_makanan' => 'Nasi Goreng Kambing, Sate Kambing',
                'jam_operasional' => '17:00 - 01:00',
                'gambar' => 'tempat_kuliners/nasi_goreng.jpg',
            ],
        ];

        foreach ($data as $item) {
            TempatKuliner::create($item);
        }
    }
}
