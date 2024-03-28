<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\KategoriBarang;
use App\Models\Barang;

use App\Models\BarangPenjualan;
use App\Models\Profil;
use App\Helpers\Helper;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Helper::hakAkses('Penjualan','View')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $title = "Penjualan";
        $url = "penjualan";
        $menu = "Penjualan";

        $penjualan = Penjualan::orderBy('created_at', 'DESC')->get();
        return view('penjualan.index', compact('title', 'url', 'menu', 'penjualan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Helper::hakAkses('Penjualan','Create')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        $title = "Penjualan";
        $url = "penjualan";
        $menu = "Penjualan";

        $pelanggans = Pelanggan::all();
        $kategori = KategoriBarang::all();

        return view('penjualan.create', compact('title', 'url', 'menu', 'pelanggans', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Helper::hakAkses('Penjualan','Create')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $this->validate($request, [
            'nomor_penjualan' => 'required',
            'tgl_penjualan' => 'required',
            'pelanggan_id' => 'required',
            'barang_id' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'harga' => 'required',
            'diskon' => 'required',
        ]);

        try {
            $penjualan = Penjualan::create([
                'nomor_penjualan' => $request->nomor_penjualan,
                'pelanggan_id' => $request->pelanggan_id,
                'tgl_penjualan' => $request->tgl_penjualan,
                'total' => $request->total,
                'diskon' => $request->diskon,
            ]);

            for ($i=0; $i < count($request->barang_id); $i++) { 
                // $findHargaBarang = Barang::find($request->barang_id)->first()->harga;
                $barang = BarangPenjualan::create([
                    'penjualan_id' => $penjualan->id,
                    'barang_id' => $request->barang_id[$i],
                    'jumlah' => $request->jumlah[$i],
                    'harga' => $request->harga[$i],
                ]);
            }

            Helper::addUserLog('menambah data Penjualan '.$request->nama_penjualan,$penjualan->toArray());

            return redirect()->route('penjualan.index')->with('success', 'Data Berhasil Ditambahkan');

        } catch (\Throwable $th) {
            if (@$penjualan) {
                $penjualan->delete();
            }
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
        if(!Helper::hakAkses('Penjualan','View')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $title = "Penjualan";
        $url = "penjualan";
        $menu = "Penjualan";

        $data = Penjualan::find($id);
        return view('penjualan.show', compact('title', 'url', 'menu', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!Helper::hakAkses('Penjualan','Update')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $penjualan = Penjualan::find($id);
        $title = "Penjualan";
        $url = "penjualan";
        $menu = "Penjualan";

        $pelanggans = Pelanggan::all();
        $barangs = Barang::all();
        
        return view('penjualan.edit', compact('title', 'url', 'menu', 'penjualan', 'pelanggans', 'barangs'));
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
        if(!Helper::hakAkses('Penjualan','Update')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        $this->validate($request, [
            'nomor_penjualan' => 'required',
            'tgl_penjualan' => 'required',
            'pelanggan_id' => 'required',
            'barang_id' => 'required',
            'jumlah' => 'required',
            'total' => 'required',
            'harga' => 'required',
            'diskon' => 'required',
        ]);
        
        try {
            $penjualan = Penjualan::find($id);
            $penjualan->update([
                'nomor_penjualan' => $request->nomor_penjualan,
                'pelanggan_id' => $request->pelanggan_id,
                'tgl_penjualan' => $request->tgl_penjualan,
                'total' => $request->total,
                'diskon' => $request->diskon,
            ]);

            $penjualan->barangRm()->delete();
            for ($i=0; $i < count($request->barang_id); $i++) { 
                // $findHargaBarang = Barang::find($request->barang_id)->first()->harga;
                $barang = BarangPenjualan::create([
                    'penjualan_id' => $penjualan->id,
                    'barang_id' => $request->barang_id[$i],
                    'jumlah' => $request->jumlah[$i],
                    'harga' => $request->harga[$i],
                ]);
            }

            Helper::addUserLog('Mengubah data Penjualan '.$request->nama_penjualan,$penjualan->toArray());

            return redirect()->route('penjualan.index')->with('success', 'Data Berhasil Diubah');

        } catch (\Throwable $th) {
            // if (@$penjualan) {
            //     $penjualan->delete();
            // }
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
        if(!Helper::hakAkses('Penjualan','Delete')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        try {    
            $penjualan = Penjualan::find($id);            
            $nama = $penjualan->nama_penjualan;
            $penjualan->delete();
            Helper::addUserLog('Menghapus Data Penjualan '.$nama,$penjualan->toArray());        
           
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ada Masalah, ' . $th->getMessage())->withInput();
        }

        return redirect(route('penjualan.index'))->with('success', 'Data Berhasil Dihapus');
    }

    public function print($id)
    {
        if(!Helper::hakAkses('Penjualan','View')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $title = "Penjualan";
        $url = "penjualan";
        $menu = "Penjualan";

        $data = Penjualan::find($id);
        $profil = Profil::first();
        return view('penjualan.print', compact('title', 'url', 'menu', 'data', 'profil'));
    }
}
