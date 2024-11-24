<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class destination extends Model // Ubah dari Destinations menjadi Destination
{
    use HasFactory;

    protected $fillable = [
        'nama_destinasi',
        'deskripsi',
        'lokasi',
        'htm',
        'image',
    ];
    public function transportations()
    {
        return $this->hasMany(transportation::class);
    }

    public function hotels()
    {
        return $this->hasMany(Hotel::class);
    }
}
