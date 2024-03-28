<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBarang;
use App\Models\Barang;
use App\Helpers\Helper;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Helper::hakAkses('Barang','View')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $title = "Barang";
        $url = "barang";
        $menu = "Barang";

        $barang = Barang::all();
        return view('barang.index', compact('title', 'url', 'menu', 'barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Helper::hakAkses('Barang','Create')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        $title = "Barang";
        $url = "barang";
        $menu = "Barang";
        $kategori = KategoriBarang::all();

        return view('barang.create', compact('title', 'url', 'menu', 'kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Helper::hakAkses('Barang','Create')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $this->validate($request, [
            'nama_barang' => 'required',
            'keterangan' => 'required',
            'harga' => 'required',
            'satuan' => 'required',
            'kategori_barang_id' => 'required',
        ]);
            
        try {
        $barang = Barang::create([
            'nama_barang' => $request->nama_barang,
            'keterangan' => $request->keterangan,
            'harga' => Helper::cleanPrice($request->harga),
            'kategori_barang_id' => $request->kategori_barang_id,
            'satuan' => $request->satuan,
        ]);

        Helper::addUserLog('menambah data Barang '.$request->nama_barang,$barang->toArray());

        return redirect()->route('barang.index')->with('success', 'Data Berhasil Ditambahkan');

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
        if(!Helper::hakAkses('Barang','Update')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $barang = Barang::find($id);
        $title = "Barang";
        $url = "barang";
        $menu = "Barang";
        $kategori = KategoriBarang::all();
        
        return view('barang.edit', compact('title', 'url', 'menu', 'barang', 'kategori'));
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
        if(!Helper::hakAkses('Barang','Update')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        try {
            $this->validate($request, [
                'nama_barang' => 'required',
                'keterangan' => 'required',
                'harga' => 'required',
                'satuan' => 'required',
                'kategori_barang_id' => 'required',
            ]);
            
            $barang = Barang::find($id);
            $old = $barang->toArray();
            $barang->update([
                'nama_barang' => $request->nama_barang,
                'harga' => Helper::cleanPrice($request->harga),
                'keterangan' => $request->keterangan,
                'kategori_barang_id' => $request->kategori_barang_id,
                'satuan' => $request->satuan,
            ]);

            Helper::addUserLog('Mengubah Data Barang '.$request->nama_barang,[
                'old'=>$old,
                'update'=>$barang->toArray()
            ]);

            return redirect(route('barang.index'))->with('success', 'Data Berhasil Diubah');
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
        if(!Helper::hakAkses('Barang','Delete')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        try {    
            $barang = Barang::find($id);            
            $nama = $barang->nama_barang;
            $barang->delete();
            Helper::addUserLog('Menghapus Data Barang '.$nama,$barang->toArray());        
           
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ada Masalah, ' . $th->getMessage())->withInput();
        }

        return redirect(route('barang.index'))->with('success', 'Data Berhasil Dihapus');
    }
}
