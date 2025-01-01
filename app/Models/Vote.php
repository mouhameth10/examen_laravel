<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['etudiant_id', 'candidat_id'];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
}
