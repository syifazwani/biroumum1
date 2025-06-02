<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    protected $fillable = ['album_id', 'file_path', 'caption'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
