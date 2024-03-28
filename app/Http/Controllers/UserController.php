<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Level;

class UserController extends Controller
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
        
        $title = "User";
        $url = "user";
        $menu = "User";

        $user = User::all();
        return view('user.index', compact('title', 'url', 'menu', 'user'));
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

        $title = "User";
        $url = "user";
        $menu = "User";

        $levels = Level::all();

        return view('user.create', compact('title', 'url', 'menu', 'levels'));
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
            'nama_user' => 'required',
            'email'=>'required|unique:users',
            'password' => 'required',
            'no_hp' => 'required',
            'level_id' => 'required',
        ]);
            
        try {
        $user = User::create([
            'level_id' => $request->level_id,
            'nama_user' => $request->nama_user,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'no_hp' => $request->no_hp,
        ]);

        \Helper::addUserLog('menambah data User '.$request->nama_user,$user->toArray());

        return redirect()->route('user.index')->with('success', 'Data Berhasil Ditambahkan');

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
        if(!\Helper::hakAkses('User Management','Update')){            
            return redirect()->back()->with('error', 'Anda Tidak Memiliki Hak Akses Untuk Membuka Halaman Ini');
        }
        
        $user = User::find($id);
        $title = "User";
        $url = "user";
        $menu = "User";

        $levels = Level::all();
        
        return view('user.edit', compact('title', 'url', 'menu', 'user', 'levels'));
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

        $request->validate([
            'nama_user' => 'required',
            'email'=>'required|unique:users,email,'.$id,
            'no_hp' => 'required',
            'level_id' => 'required',
        ]);

        try {
            $user = User::find($id);
            $old = $user->toArray();
            $user->update([
                'level_id' => $request->level_id,
                'nama_user' => $request->nama_user,
                'email' => $request->email,
                'password' => ($request->password) ? bcrypt($request->password) : $user->password,
                'no_hp' => $request->no_hp,
            ]);

            \Helper::addUserLog('Mengubah Data User '.$request->nama_user,[
                'old'=>$old,
                'update'=>$user->toArray()
            ]);

            return redirect(route('user.index'))->with('success', 'Data Berhasil Diubah');
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
            $user = User::find($id);            
            $nama = $user->nama_user;
            $user->delete();
            \Helper::addUserLog('Menghapus Data User '.$nama,$user->toArray());        
           
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Ada Masalah, ' . $th->getMessage())->withInput();
        }

        return redirect(route('user.index'))->with('success', 'Data Berhasil Dihapus');
    }
}
