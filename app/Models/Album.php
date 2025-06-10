<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $timestamps = false; // tambahkan ini

    protected $fillable = ['title', 'cover_image'];

    public function photos()
    {
        return $this->hasMany(AlbumPhoto::class);
    }
}

