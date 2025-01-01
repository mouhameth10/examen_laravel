<?php

namespace App\Exports;

use App\Models\Vote;
use Maatwebsite\Excel\Excel as ExcelFacade; // Importer la façade Excel
use Maatwebsite\Excel\Concerns\FromArray; // Utiliser FromArray pour l'exportation

class VotesExport implements FromArray
{
    public function array(): array
    {
        return Vote::with(['candidat', 'etudiant'])->get()->toArray(); // Récupérer les votes sous forme de tableau
    }
}