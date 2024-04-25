<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cluster extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom'
    ];

    public function filiere():BelongsTo
    {
        return $this->belongsTo(Filiere::class , 'filiere_id');
    }

    public function village():BelongsTo
    {
        return $this->belongsTo(Village::class , 'village_id');
    }
}
