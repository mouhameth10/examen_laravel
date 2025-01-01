<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departement; // Importer le modèle Departement
use App\Models\Filiere;
class FiliereC extends Controller
{
     // Afficher toutes les filières
     public function index()
     {
         $filieres = Filiere::with('departement')->get(); // Charger la relation avec le département
         return view('Filiere.index', compact('filieres'));
     }
 
     // Afficher le formulaire de création d'une filière
     public function create()
     {
         $departements = Departement::all(); // Récupérer tous les départements
         return view('Filiere.create', compact('departements'));
     }
 
     // Enregistrer une nouvelle filière
     public function store(Request $request)
     {
         $request->validate([
             'nom' => 'required|string|max:255',
             'description' => 'nullable|string',
             'departement_id' => 'required|exists:departements,id', // Association avec un département
         ]);
 
         Filiere::create($request->all());
 
         return redirect()->route('Filiere.index')->with('success', 'Filière créée avec succès.');
     }
 
     // Afficher une filière spécifique
     public function show($id)
    {
        $filiere = Filiere::findOrFail($id);
        return view('Filiere.show', compact('filiere'));
    }

    public function edit($id)
    {
        $filiere = Filiere::findOrFail($id);
         $departements = Departement::all();
        return view('Filiere.edit', compact('filiere','departements'));
    }

    public function update(Request $request, $id)
    {
        $filiere = Filiere::findOrFail($id);
        $filiere->nom = $request->get('nom');
        $filiere->description = $request->get('description');
        $filiere->departement_id = $request->get('departement_id');
        // Ajoutez d'autres champs selon votre modèle

        $filiere->save(); // Utilisez save() au lieu de update()
        return redirect()->route('Filiere.index');
    }

    public function destroy($id)
    {
        Filiere::findOrFail($id)->delete();
        return redirect()->route('Filiere.index');
    }
}
