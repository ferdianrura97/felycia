<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Profil;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'level_id' => '1',
            'nama_user' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin1234'),
            'no_hp' => '08123124123',
        ]);

        Profil::create([
            'nama'=> "CV. Felycia",
            'alamat'=> "Jl.Damai Raya RT X Kel.Simpang Raya Kec.Barong Tongkok Kab.Kutai Barat - KalTim 75576",
            'no_hp'=> "082357682134",
            'keterangan'=> "-",
            'logo'=>"logo.png",
        ]);
    }
}
