<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use App\Models\Barang;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Dashboard';
        $url = 'home';
        $menu = 'Home';

        $data['penjualan'] = Penjualan::count();
        $data['pelanggan'] = Pelanggan::count();
        $data['barang'] = Barang::count();

        return view('home', compact('title', 'url', 'menu', 'data'));
    }
}
