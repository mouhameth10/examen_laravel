<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    protected $fillable = ['etudiant_id', 'programme']; // Ajout de la colonne programme

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class); // Un candidat est un étudiant
    }

    public function votes()
    {
        return $this->hasMany(Vote::class); // Un candidat peut recevoir plusieurs votes
    }
}
