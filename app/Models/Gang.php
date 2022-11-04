<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gang extends Model
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

    public function quartiers()
    {
        return $this->hasMany(Quartier::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
