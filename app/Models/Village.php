<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Village extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom'
    ];

    public function arrondissement(): BelongsTo
    {
        return $this->belongsTo(Arrondissement::class , 'arrondissement_id');
    }
}
