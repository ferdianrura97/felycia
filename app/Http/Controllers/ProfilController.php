<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profil;
use App\Helpers\Helper;

class ProfilController extends Controller
{
    public function index()
    {
        if(!Helper::hakAkses('Profil','Update')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $profil = Profil::first();
        $title = "Profil";
        $url = "profil";
        $menu = "profil";
        
        return view('profil.index', compact('title', 'url', 'menu', 'profil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Helper::hakAkses('Profil','Update')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        try {
            $profil = Profil::first();
            $logo = $profil->logo;
            if($request->hasFile('logo')){
                request()->validate([
                    
                    'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:5000',
                    
                ]);
                $logo = $request->nama.'.'.request()->logo->getClientOriginalExtension();
                $request->logo->move(public_path('assets/img/logo'), $logo);
            }

            $old = $profil->toArray();
            $profil->update([
                'nama'=>$request->nama,
                'alamat'=>$request->alamat,
                'no_hp'=>$request->no_hp,
                'keterangan'=>$request->keterangan,
                'npwp'=>$request->npwp,
                'email'=>$request->email,
                'logo'=>$logo,
            ]);

            Helper::addUserLog('Mengubah Data profil '.$request->nama_profil,[
                'old'=>$old,
                'update'=>$profil->toArray()
            ]);

            return redirect(route('profil.index'))->with('success', 'Data Berhasil Diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ada Masalah, ' . $th->getMessage())->withInput();
        }
    }
}
