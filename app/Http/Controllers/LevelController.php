<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Level;
use App\Models\Menu;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!\Helper::hakAkses('User Management','View')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $title = "Level";
        $url = "level";
        $menu = "Level";

        $level = Level::all();
        return view('level.index', compact('title', 'url', 'menu', 'level'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!\Helper::hakAkses('User Management','Create')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        $title = "Level";
        $url = "level";
        $menu = "Level";

        $menus = Menu::all();

        return view('level.create', compact('title', 'url', 'menu', 'menus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!\Helper::hakAkses('User Management','Create')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $this->validate($request, [
            'nama_level' => 'required',
        ]);

        try {
            $level = Level::create([
               'nama_level'=>$request->nama_level
            ]);

            $level->menu()->attach($request->menu_id);
            \Helper::addUserLog('menambah data Level '.$request->nama_level,$level->toArray());

            return redirect(route('level.index'))->with(['success'=>'Berhasil Menambah Data ' . $request->nama_level]);
        } catch (\Exception $e){
            return redirect()->back()->with(['error'=>'Gagal Menambah Data ' . $request->nama_level  . " " .$e->getMessage()])->withInput()->withErrors($request->all());
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
        if(!\Helper::hakAkses('User Management','Update')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $level = Level::find($id);
        $title = "Level";
        $url = "level";
        $menu = "Level";

        $menus = Menu::all();
        $levelMenus = $level->menu()->pluck('menu_id')->toArray();
        
        return view('level.edit', compact('title', 'url', 'menu', 'level', 'menus', 'levelMenus'));
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
        if(!\Helper::hakAkses('User Management','Update')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        try {
            $level = Level::find($id);
            $old = $level->toArray();
            $level->update([
                'nama_level' => $request->nama_level,
            ]);

            $level->Menu()->sync($request->menu_id);

            \Helper::addUserLog('Mengubah Data Level '.$request->nama_level,[
                'old'=>$old,
                'update'=>$level->toArray()
            ]);

            return redirect(route('level.index'))->with('success', 'Data Berhasil Diubah');
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
        if(!\Helper::hakAkses('User Management','Delete')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }

        try {    
            $level = Level::find($id);            
            $nama = $level->nama_level;
            $level->delete();
            \Helper::addUserLog('Menghapus Data Level '.$nama,$level->toArray());        
           
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ada Masalah, ' . $th->getMessage())->withInput();
        }

        return redirect(route('level.index'))->with('success', 'Data Berhasil Dihapus');
    }
}
