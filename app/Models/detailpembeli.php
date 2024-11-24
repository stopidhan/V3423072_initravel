<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class detailpembeli extends Model
{
    use HasFactory;
    protected $table = "detailpembelis";
    protected $primaryKey = "id";
    protected $fillable = ["id", "pembeli_id", "paket_id"];

    public function paket(): BelongsTo
    {
        return $this->belongsTo(paket::class);
    }
    public function pembeli(): BelongsTo
    {
        return $this->belongsTo(pembeli::class);
    }
}
