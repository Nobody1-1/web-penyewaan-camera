<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable = [
        'barang_id',
        'user_id',
        'durasi',
        'starts',
        'end',
        'harga',
    ];

    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }

    public function barang() {
        return $this->belongsTo(barang::class,'barang_id');
    }

    public function payment() {
        return $this->belongsTo(Payment::class,'payment_id');
    }
}
