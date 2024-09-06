<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'kamar',
        'nama_lengkap',
        'telp',
        'umur',
        'alamat',
        'total',
    ];
}
