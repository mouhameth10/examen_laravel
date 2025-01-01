<?php

namespace App\Http\Controllers;
use App\Models\Candidat;
use App\Models\Etudiant;
use Illuminate\Http\Request;

class CandidatC extends Controller
{
   // Afficher tous les candidats
   public function index()
   {
       $candidats = Candidat::with(['etudiant'])->get();
       return view('Candidat.index', compact('candidats'));
   }

   // Afficher le formulaire de création d'un candidat
   public function create()
   {
       $etudiants = Etudiant::all();
       return view('Candidat.create', compact('etudiants'));
   }

   // Enregistrer un nouveau candidat
   public function store(Request $request)
   {
       $request->validate([
           'etudiant_id' => 'required|exists:etudiants,id',
           'programme' => 'nullable|string', // Validation pour le programme
       ]);

       Candidat::create($request->all());

       return redirect()->route('Candidat.index')->with('success', 'Candidat créé avec succès.');
   }

   // Afficher un candidat spécifique
   public function show($id)
   {
       $candidat = Candidat::findOrFail($id);
       return view('Candidat.show', compact('candidat'));
   }

   public function edit($id)
   {
       $candidat = Candidat::findOrFail($id);
       $etudiants = Etudiant::all();
       return view('Candidat.edit', compact('candidat','etudiants'));
   }

   public function update(Request $request, $id)
   {
       $candidat = Candidat::findOrFail($id);
       $candidat->etudiant_id = $request->get('etudiant_id');
       $candidat->programme = $request->get('programme');
       // Ajoutez d'autres champs selon votre modèle

       $candidat->save(); // Utilisez save() au lieu de update()
       return redirect()->route('Candidat.index');
   }

   public function destroy($id)
   {
       Candidat::findOrFail($id)->delete();
       return redirect()->route('Candidat.index');
   }
}
