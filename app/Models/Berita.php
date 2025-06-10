<?php

// app/Models/Berita.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'beritas';
    protected $fillable = ['title', 'slug', 'content', 'image'];
    public $timestamps = true;
}
