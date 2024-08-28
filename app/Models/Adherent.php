<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adherent extends Model
{
    use HasFactory;

    protected $appends = ['full_name'];

    protected $fillable = [
        "nom",
        "prenom",
        "adresse",
        "contact",

    ];

    public function getFullNameAttribute()
    {
        return "{$this->nom} {$this->prenom}";
    }

    // Un adherent peut avoir plusieurs prêts
    public function prets()
    {
        return $this->hasMany(Pret::class);
    }
}
