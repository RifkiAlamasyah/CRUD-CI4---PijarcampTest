<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Produk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true, //supaya nilai nya positif semua
                'auto_increment' => true, // supaya nambah sendiri
            ],
            'nama_produk'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'keterangan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'harga' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'jumlah' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'created_at' => [
                'type'  => 'DATETIME',
                'null' => TRUE
            ],
            'updated_at' => [
                'type'  => 'DATETIME',
                'null' => TRUE
            ]
        ]);
        $this->forge->addKey('id', true); //primary key
        $this->forge->createTable('produk'); //nama tabel
    }

    public function down()
    {
        $this->forge->dropTable('produk'); //tabel yg di hapus
    }

}
