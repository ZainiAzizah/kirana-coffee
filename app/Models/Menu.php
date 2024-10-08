<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_menu',
        'gambar_menu',
        'nama_menu',
        'detail_menu',
        'harga',
        'stok',
        'id_kategori',
    ];

}
