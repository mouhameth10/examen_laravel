<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Candidat;
use App\Models\Etudiant;
use App\Models\Departement;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel; // Pour l'export CSV
use App\Exports\VotesExport; // Pour l'export
use PDF; // Pour l'export PDF
class VoteC extends Controller
{// Afficher tous les votes
    public function index()
    {
        $votes = Vote::with(['etudiant', 'candidat'])->get();
        return view('Vote.index', compact('votes'));
    }

    // Afficher le formulaire de vote
    public function create()
    {
        $candidats = Candidat::all(); // Récupérer tous les candidats

        $etudiants = Etudiant::all(); // Récupérer tous les étudiants
        return view('Vote.create', compact('candidats', 'etudiants'));
    }

    // Enregistrer un nouveau vote
    public function store(Request $request)
    {
        $request->validate([
            'etudiant_id' => 'required|exists:etudiants,id',
            'candidat_id' => 'required|exists:candidats,id',
        ]);

        if (Vote::where('etudiant_id', $request->etudiant_id)->exists()) {
            return redirect()->back()->with('error', 'Vous avez déjà voté.');
        }

        Vote::create($request->all());

        return redirect()->route('Vote.index')->with('success', 'Vote enregistré avec succès.');
    }

    // Afficher un vote spécifique
    public function show($id)
    {
        $vote = Vote::findOrFail($id);
        return view('Vote.show', compact('vote'));
    }
    public function edit($id)
{
    $vote = Vote::findOrFail($id);
    $candidats = Candidat::all();
    $etudiants = Etudiant::all();
    return view('Vote.edit', compact('vote', 'candidats', 'etudiants'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'candidat_id' => 'required|exists:candidats,id',
        'etudiant_id' => 'required|exists:etudiants,id',
    ]);

    $vote = Vote::findOrFail($id);
    $vote->update($request->all());

    return redirect()->route('Vote.index')->with('success', 'Vote mis à jour avec succès.');
}

    // Supprimer un vote
    public function destroy($id)
    {
        Vote::findOrFail($id)->delete();
        return redirect()->route('Vote.index');
    }



    public function statistics()
    {
        $departements = Departement::with(['filieres.candidats'])->get();
    
        // Autres logiques pour les votes
        $votesParCandidat = Vote::with('candidat.etudiant.filiere')
            ->select('candidat_id', DB::raw('count(*) as total'))
            ->groupBy('candidat_id')
            ->get();
    
        return view('Vote.statistics', compact('departements', 'votesParCandidat'));
    }


    public function exportCsv()
{
    return Excel::create('votes', function($excel) {
        $excel->sheet('Sheet 1', function($sheet) {
            $votes = Vote::with(['candidat', 'etudiant'])->get();
            $sheet->fromArray($votes->toArray()); // Convertir en tableau
        });
    })->download('csv');
}

public function exportPdf()
{
    // Récupérer tous les candidats avec le nombre de votes et l'étudiant associé
    $candidats = Candidat::with(['etudiant', 'votes'])->withCount('votes')->get();

    $pdf = PDF::loadView('exports.votes_pdf', compact('candidats'));
    return $pdf->download('votes.pdf');
}

}
