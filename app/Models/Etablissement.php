<?php

namespace App\Models;

use App\Models\Gang;
use App\Models\Quartier;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etablissement extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'adress',
        'type',
        'description',
        'quartier_id',
    ];

    public function quartier()
    {
        return $this->belongsTo(Quartier::class);
    }

    public function gang()
    {
        return $this->belongsTo(Gang::class);
    }
}
