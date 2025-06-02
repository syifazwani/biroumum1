<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['name'];
    public function photos() {
        return $this->hasMany(Photo::class);
    }
    public function videos() {
        return $this->hasMany(Video::class);
    }
}


