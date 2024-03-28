<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pelanggan extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function Penjualan(){
        return $this->hasMany(Penjualan::class);
    }

    public function getTotalPermintaanPenjualanAttribute(){
        return count($this->Penjualan);
    }
}
