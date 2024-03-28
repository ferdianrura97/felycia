<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Pelanggan;

use App\Models\Barang;

class LaporanController extends Controller
{
    public function show($id)
    {
        if(!\Helper::hakAkses('Laporan','View')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        $menu = "Laporan";
        $title = ucwords(str_replace('_', ' ', $id));
        $url = "laporan/";
        $view = "laporan." . $id;
        $datas = array();
        $url .= $id;

        $from = ($_GET['from']) ?? date("Y-m-01");
        $to = ($_GET['to']) ?? date("Y-m-t");
        $getPelanggan = ($_GET['pelanggan']) ?? null;
        $getTahun = ($_GET['tahun']) ?? date('Y');
        
        switch ($id) {
            case 'pelanggan':
                $datas = Pelanggan::all();
                $datas = $datas->sortByDesc(function($data){
                    return $data->total_kunjungan;
                });
                break;
            
            case 'barang':
                $datas = Barang::all();
                $datas = $datas->sortByDesc(function($data){
                    return $data->terlaris;
                });
                break;
            
            case 'penjualan':
                $datas = Penjualan::orderBy('created_at', 'DESC');
                if ($getPelanggan) {
                    $datas = $datas->where('pelanggan_id', $getPelanggan);
                }
                $datas = $datas->whereBetween('tgl_penjualan', [$from,$to])->get();
                break;

            default:
                # code...
                break;
        }
        $pelanggans = Pelanggan::all();

        return view($view, compact('menu', 'title', 'url', 'datas', 'pelanggans'));

    }
}
