<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pret extends Model
{
    use HasFactory;

    protected $fillable = [
        "date_retour",
        "ouvrage_id",
        "adherent_id",
        "status",


    ];

    // Un prêt appartient à un adhérent
    public function adherent()
    {
        return $this->belongsTo(Adherent::class);
    }

    // Un prêt concerne un ouvrage
    public function ouvrage()
    {
        return $this->belongsTo(Ouvrage::class);
    }
}
