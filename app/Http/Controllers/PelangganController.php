<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;
use App\Imports\PelangganImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Helpers\Helper;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Helper::hakAkses('Pelanggan','View')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $title = 'Pelanggan';
        $url = 'pelanggan';
        $menu = 'Pelanggan';

        $pelanggan = Pelanggan::all();
        return view('pelanggan.index', compact('title', 'url', 'menu', 'pelanggan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Helper::hakAkses('Pelanggan','Create')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        $title = 'Pelanggan';
        $url = 'pelanggan';
        $menu = 'Pelanggan';

        return view('pelanggan.create', compact('title', 'url', 'menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if(!Helper::hakAkses('Pelanggan','Create')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $this->validate($request, [
            'nomor_pelanggan' => 'required',
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);
            
        try {
        $pelanggan = Pelanggan::create([
            'nomor_pelanggan' => $request->nomor_pelanggan,
            'nama_pelanggan' => $request->nama_pelanggan,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
        ]);

        \Helper::addUserLog('menambah data Pelanggan '.$request->nama_pelanggan,$pelanggan->toArray());

        return redirect()->route('pelanggan.index')->with('success', 'Data Berhasil Ditambahkan');

        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ada Masalah, ' . $th->getMessage())->withInput();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Helper::hakAkses('Pelanggan','Update')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $pelanggan = Pelanggan::find($id);
        $title = "Pelanggan";
        $url = "pelanggan";
        $menu = "Pelanggan";
        
        return view('pelanggan.edit', compact('title', 'url', 'menu', 'pelanggan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!Helper::hakAkses('Pelanggan','Update')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        try {
            $pelanggan = Pelanggan::find($id);
            $old = $pelanggan->toArray();
            $pelanggan->update([
                'nama_pelanggan' => $request->nama_pelanggan,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
            ]);

            \Helper::addUserLog('Mengubah Data Pelanggan '.$request->nama_pelanggan,[
                'old'=>$old,
                'update'=>$pelanggan->toArray()
            ]);

            return redirect(route('pelanggan.index'))->with('success', 'Data Berhasil Diubah');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ada Masalah, ' . $th->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Helper::hakAkses('Pelanggan','Delete')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        try {    
            $pelanggan = Pelanggan::find($id);            
            $nama = $pelanggan->nama_pelanggan;
            $pelanggan->delete();
            \Helper::addUserLog('Menghapus Data Pelanggan '.$nama,$pelanggan->toArray());        
           
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ada Masalah, ' . $th->getMessage())->withInput();
        }

        return redirect(route('pelanggan.index'))->with('success', 'Data Berhasil Dihapus');
    }

    public function upload()
    {
        if(!Helper::hakAkses('Pelanggan','Create')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        $title = 'Pelanggan';
        $url = 'pelanggan';
        $menu = 'Pelanggan';

        return view('pelanggan.upload', compact('title', 'url', 'menu'));
    }


    public function storeUpload(Request $request)
    {
        if(!Helper::hakAkses('Pelanggan','Create')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        $excel = new PelangganImport();
        Excel::import($excel, $request->file);
        
        return redirect(route('pelanggan.index'))->with('success', 'Berhasil Import Data!');
    }
}
