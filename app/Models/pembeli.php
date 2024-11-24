<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class pembeli extends Model
{
    use HasFactory;
    protected $table = "pembelis";
    protected $primaryKey = "id";
    protected $fillable = ["id", "namapembeli"];

    public function detailpembeli(): HasMany
    {
        return $this->hasMany(detailpembeli::class);
    }

    public function paket(): BelongsToMany
    {
        return $this->belongsToMany(paket::class, 'detailpembelis');
    }
}
