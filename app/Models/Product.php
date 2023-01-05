<?php

namespace App\Models;

use App\Models\Gang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity'
    ];

    public function gang()
    {
        return $this->belongsTo(Gang::class);
    }

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }
}
