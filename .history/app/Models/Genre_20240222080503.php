<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ge extends Model
{
    use HasFactory;
    protected $table = 'ges';
    protected $fillable = ['nama_ge'];

    public function berita()
    {
        return $this->hasMany(Berita::class);
    }
}
