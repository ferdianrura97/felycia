<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBarang;
use App\Helpers\Helper;

class KategoriBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!Helper::hakAkses('Kategori Barang','View')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $title = "Kategori Barang";
        $url = "kategori";
        $menu = "Kategori Barang";

        $kategori = KategoriBarang::all();
        return view('kategori.index', compact('title', 'url', 'menu', 'kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Helper::hakAkses('Kategori Barang','Create')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        $title = "Kategori Barang";
        $url = "kategori";
        $menu = "Kategori Barang";

        return view('kategori.create', compact('title', 'url', 'menu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Helper::hakAkses('Kategori Barang','Create')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $this->validate($request, [
            'nama_kategori' => 'required'
        ]);
            
        try {
        $kategori = KategoriBarang::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        Helper::addUserLog('menambah data Kategori '.$request->nama_kategori,$kategori->toArray());

        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Ditambahkan');

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
        if(!Helper::hakAkses('Kategori Barang','Update')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $kategori = KategoriBarang::find($id);
        $title = "Kategori Barang";
        $url = "kategori";
        $menu = "Kategori Barang";
        
        return view('kategori.edit', compact('title', 'url', 'menu', 'kategori'));
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
        if(!Helper::hakAkses('Kategori Barang','Update')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        try {
            $kategori = KategoriBarang::find($id);
            $old = $kategori->toArray();
            $kategori->update([
                'nama_kategori' => $request->nama_kategori
            ]);

            Helper::addUserLog('Mengubah Data Barang '.$request->nama_kategori,[
                'old'=>$old,
                'update'=>$kategori->toArray()
            ]);

            return redirect(route('kategori.index'))->with('success', 'Data Berhasil Diubah');
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
        if(!Helper::hakAkses('Kategori Barang','Delete')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        try {    
            $kategori = KategoriBarang::find($id);            
            $nama = $kategori->nama_kategori;
            $kategori->delete();
            Helper::addUserLog('Menghapus Data Barang '.$nama,$kategori->toArray());        
           
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ada Masalah, ' . $th->getMessage())->withInput();
        }

        return redirect(route('kategori.index'))->with('success', 'Data Berhasil Dihapus');
    }
}
