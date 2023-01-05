<?php

namespace App\Models;

use App\Models\Gang;
use App\Models\Etablissement;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quartier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    public function etablissements()
    {
        return $this->hasMany(Etablissement::class);
    }

    public function gangs()
    {
        return $this->belongsTo(Gang::class, 'gang_id');
    }
}
