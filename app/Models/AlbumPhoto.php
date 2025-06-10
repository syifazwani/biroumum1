<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AlbumPhoto extends Model
{
    public $timestamps = false;
    protected $table = 'album_photos';
    protected $fillable = ['album_id', 'image_path'];

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
