<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ouvrage extends Model
{
    use HasFactory;

    protected $fillable = [
        "type",
        "titre",
        "thematique",
        "nb_page",
        "date_parution",
        "auteur",
    ];
}