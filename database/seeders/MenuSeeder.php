<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("INSERT INTO menus (id, nama_menu, aksi_menu) VALUES
            ('1', 'Pelanggan', 'View'),
            ('2', 'Pelanggan', 'Create'),
            ('3', 'Pelanggan', 'Update'),
            ('4', 'Pelanggan', 'Delete'),
            ('5', 'Barang', 'View'),
            ('6', 'Barang', 'Create'),
            ('7', 'Barang', 'Update'),
            ('8', 'Barang', 'Delete'),
            ('9', 'User Management', 'View'),
            ('10', 'User Management', 'Create'),
            ('11', 'User Management', 'Update'),
            ('12', 'User Management', 'Delete'),
            ('13', 'Penjualan', 'View'),
            ('14', 'Penjualan', 'Create'),
            ('15', 'Penjualan', 'Update'),
            ('16', 'Penjualan', 'Delete'),
            ('17', 'Laporan', 'View'),
            ('18', 'Kategori Barang', 'View'),
            ('19', 'Kategori Barang', 'Create'),
            ('20', 'Kategori Barang', 'Update'),
            ('21', 'Kategori Barang', 'Delete'),
            ('22', 'Profil', 'Update')");
    }
}
