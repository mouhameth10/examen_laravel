<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement; // Importer le modèle Departement
use App\Models\Filiere; // Importer le modèle Filiere
use App\Models\Etudiant;
class EtudiantC extends Controller
{
      // Afficher tous les étudiants
      public function index()
      {
          $etudiants = Etudiant::with(['departement', 'filiere'])->get(); // Charger les relations
          return view('Etudiant.index', compact('etudiants'));
      }
  
      // Afficher le formulaire de création d'un étudiant
      public function create()
      {
          $departements = Departement::all(); // Récupérer tous les départements
          $filieres = Filiere::all(); // Récupérer toutes les filières
          return view('Etudiant.create', compact('departements', 'filieres'));
      }
  
      // Enregistrer un nouvel étudiant
      public function store(Request $request)
      {
          $request->validate([
              'nom' => 'required|string|max:255',
              'prenom' => 'required|string|max:255',
              'matricule' => 'required|string|max:255|unique:etudiants,matricule',
              'departement_id' => 'required|exists:departements,id', // Association avec un département
              'filiere_id' => 'required|exists:filieres,id', // Association avec une filière
              'lieu_naissance' => 'nullable|string|max:255',
          ]);
  
          Etudiant::create($request->all());
  
          return redirect()->route('Etudiant.index')->with('success', 'Étudiant créé avec succès.');
      }
  
      // Afficher un étudiant spécifique
      public function show($id)
      {
          $etudiant = Etudiant::findOrFail($id);
          return view('Etudiant.show', compact('etudiant'));
      }
  
      public function edit($id)
      {
          $etudiant = Etudiant::findOrFail($id);
          $departements = Departement::all();
          $filieres = Filiere::all();
          return view('Etudiant.edit', compact('etudiant','filieres','departements'));
      }
  
      public function update(Request $request, $id)
      {
          $etudiant = Etudiant::findOrFail($id);
          $etudiant->nom = $request->get('nom');
          $etudiant->prenom = $request->get('prenom');
          $etudiant->matricule = $request->get('matricule');
          $etudiant->departement_id = $request->get('departement_id');
          $etudiant->filiere_id = $request->get('filiere_id');
          $etudiant->lieu_naissance = $request->get('lieu_naissance');
          
          $etudiant->save(); // Utilisez save() au lieu de update()
          return redirect()->route('Etudiant.index');
      }
  
      public function destroy($id)
      {
          Etudiant::findOrFail($id)->delete();
          return redirect()->route('Etudiant.index');
      }
}
