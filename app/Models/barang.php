<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang',
        'harga',
        'deskripsi',
        'gambar'
    ];

    public function order() {
        return $this->hasMany(Order::class,'alat_id','id');
    }
}
