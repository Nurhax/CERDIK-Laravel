<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Panduan extends Model
{
    use HasFactory;

    // Nama tabel secara eksplisit
    protected $table = 'panduans';

    // Kolom yang dapat diisi secara massal
    protected $fillable = ['title', 'description'];
}
