<?php
namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\Level;
use App\Models\UserLog;
use App\Models\Profil;

use Auth;

class Helper {

    public static function hakAkses($nama_menu,$aksi){
        $cek = Level::whereHas('Menu',function ($q) use($nama_menu,$aksi)
        {
            $q->where('nama_menu', $nama_menu)
                ->where('aksi_menu', $aksi);
        })->where('id',Auth::user()->level->id)->count();
        if ( $cek > 0 ) {
            return true;
        } else {
            return false;
        }
    }

    public static function getMyIP()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public static function addUserLog($action,$actionDetail = null,$ip = null)
    {
        
        if($ip == null){
            $ip = Helper::getMyIP();
        }
        

        UserLog::create([
            'action'=>$action,
            'action_detail'=>json_encode($actionDetail),
            'user_id'=>Auth::user()->id,
            'ip'=>$ip,
            'ip_detail'=>NULL
        ]);
        
    }

    public static function nomorPelanggan() {
        $pelanggan = Pelanggan::latest()->first();
        $nomor = "PSN-00000";
        if ($pelanggan) {
            $nomor = $pelanggan->nomor_pelanggan;
        }

        return ++$nomor;
    }

    public static function getNamaProfil() {
        $profil = Profil::first();

        if ($profil) {
            return $profil->nama;
        }else{
            return ENV("APP_NAME");
        }
    }

    public static function getLogo() {
        $profil = Profil::first();
        if ($profil) {
            return $profil->logo;
        }else{
            return "logo.png";
        }

    }

    public static function nomorPenjualan() {
        $penjualan = Penjualan::latest()->first();
        $nomor = "RM-00000";

        if ($penjualan) {
            $nomor = $penjualan->nomor_penjualan;
        }

        return ++$nomor;

    }

    public static function cleanPrice($price)
    {
        $new_price = preg_replace("/[^0-9]/", "", $price);
        return $new_price;
    }

    public static function chartPenjualan()
    {
        $result = [];

        for ($i=1; $i <= 12; $i++) { 
            $penjualan = Penjualan::whereMonth('tgl_penjualan', $i)->whereYear('tgl_penjualan', date('Y'))->get();
            $totalHarga = 0;
            foreach ($penjualan as $rm) {
                $totalHarga += $rm->total;
            }

            $result[] = $totalHarga;
        }
        
        return $result;
    }
    

}