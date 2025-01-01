<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departement extends Model
{
    protected $fillable = ['nom'];

    public function filieres()
    {
        return $this->hasMany(Filiere::class);
    }

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }
}
