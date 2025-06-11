<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemasukan extends Model
{
    use HasFactory;

    protected $table = 'pemasukan';

    protected $fillable = ['tanggal', 'keterangan', 'jumlah'];

    protected $dates = ['tanggal']; // Pastikan kolom tanggal ada di sini
}