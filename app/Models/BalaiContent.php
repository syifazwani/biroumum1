<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalaiContent extends Model
{
    protected $fillable = ['title', 'slug', 'content', 'image'];
}
