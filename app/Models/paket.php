<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class paket extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_paket',
        'deskripsi',
        'harga_total',
        'destination_id',
        'hotel_id',
        'transportation_id',
        'rating',
        'ulasan',
        'total_pembelian',
    ];
    // Relationship with Destination
    public function destination()
    {
        return $this->belongsTo(destination::class);
    }

    // Relationship with Hotel
    public function hotel()
    {
        return $this->belongsTo(hotel::class);
    }

    // Relationship with Transport
    public function transportation()
    {
        return $this->belongsTo(transportation::class);
    }
    public function detailpembeli(): HasMany
    {
        return $this->hasMany(detailpembeli::class);
    }
    public function pembeli(): BelongsToMany
    {
        return $this->belongsToMany(pembeli::class, 'detailpembeli');
    }
}
