<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangPenjualan extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public function Penjualan(){
        return $this->belongsTo(Penjualan::class)->withTrashed();
    }

    public function Barang(){
        return $this->belongsTo(Barang::class)->withTrashed();
    }
}
