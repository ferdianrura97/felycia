<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penjualan extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function pelanggan(){
        return $this->belongsTo(Pelanggan::class)->withTrashed();
    }

    public function barangRm(){
        return $this->hasMany(BarangPenjualan::class);
    }

    public function getBarangIdAttribute()
    {
        $barang_id = [];
        foreach ($this->barangRm as $barang) {
            $barang_id[] = $barang->barang_id;
        }

        return $barang_id;
    }

    public function getTotalDenganDiskonAttribute()
    {
        return $this->total - ($this->total * $this->diskon/100);
    }
}
