<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    protected $fillable = ['nom', 'prenom', 'matricule', 'departement_id', 'filiere_id', 'lieu_naissance'];

    public function departement()
    {
        return $this->belongsTo(Departement::class);
    }

    public function filiere()
    {
        return $this->belongsTo(Filiere::class);
    }

    public function candidat()
    {
        return $this->hasOne(Candidat::class); // Un étudiant peut être un candidat
    }

    public function vote()
    {
        return $this->hasOne(Vote::class); // Un étudiant peut voter une seule fois
    }
}
