<?php

namespace App\Imports;

use App\Helpers\Helper;
use App\Models\Pelanggan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PelangganImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        $baris = 0;
        foreach ($rows as $data) 
        {
            $baris++;
            if ($data[0] != "Nama Pelanggan") {
                if ($data[0] && $data[1] && $data[2]) {
                    Pelanggan::create([
                        'nomor_pelanggan' => Helper::nomorPelanggan(),
                        'nama_pelanggan' => $data[0],
                        'alamat' => $data[1],
                        'no_hp' => $data[2],
                    ]);
                }
            }
        }
    }
}
