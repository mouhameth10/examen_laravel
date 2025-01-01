<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filiere extends Model
{
    protected $fillable = ['nom', 'description', 'departement_id'];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function etudiants()
    {
        return $this->hasMany(Etudiant::class);
    }
    public function candidats()
    {
        return $this->hasManyThrough(Candidat::class, Etudiant::class);
    }
}
