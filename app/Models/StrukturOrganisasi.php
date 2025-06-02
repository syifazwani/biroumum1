<?php

// app/Models/StrukturOrganisasi.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrukturOrganisasi extends Model
{
    use HasFactory;

    protected $fillable = ['file_path']; // <-- Ini yang penting
     protected $table = 'struktur_organisasi';
}
