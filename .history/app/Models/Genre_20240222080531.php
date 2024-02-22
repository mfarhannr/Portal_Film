<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $table = 'genres';
    protected $fillable = ['nama_genre'];

    public function berita()
    {
        return $this->hasMany(Film::class);
    }
}
