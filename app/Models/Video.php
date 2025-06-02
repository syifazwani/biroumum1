<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = ['album_id', 'filename'];
    public function album() {
        return $this->belongsTo(Album::class);
    }
}

