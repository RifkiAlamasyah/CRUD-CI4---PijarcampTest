<?php

namespace App\Database\Seeds;
use CodeIgniter\I18n\Time;
use CodeIgniter\Database\Seeder;

class ProdukSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_produk' => 'Xbox One',
                'keterangan'    => 'Xbox one adalah console dari microsoft yang setara dengan PS 4',
                'harga'    => 4000000,
                'jumlah' =>100,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama_produk' => 'Playstation 4',
                'keterangan'    => 'PS4 adalah console dari Sony yang setara dengan Xbox one',
                'harga'    => 4000000,
                'jumlah' =>100,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama_produk' => 'Xbox Series',
                'keterangan'    => 'Xbox series adalah console dari microsoft untuk next gen',
                'harga'    => 8000000,
                'jumlah' =>50,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'nama_produk' => 'Playstation 5',
                'keterangan'    => 'PS 5 adalah console dari sony untuk next gen',
                'harga'    => 8000000,
                'jumlah' =>50,
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ]
        ];

        $this->db->table('produk')->insertBatch($data);
    }
}
