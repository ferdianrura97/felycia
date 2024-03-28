<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function kategori(){
        return $this->belongsTo(KategoriBarang::class, 'kategori_barang_id')->withTrashed();
    }

    public function penjualan(){
        return $this->hasMany(BarangPenjualan::class);
    }

    public function getTerlarisAttribute(){
        return count($this->penjualan);
    }
}
