<?php

namespace App\Http\Controllers;
use App\Models\Filiere;
use App\Models\Etudiant;
use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementC extends Controller
{
    public function index()
    {
        $departements = Departement::all();
        return view('Departement.index', compact('departements'));
    }

    public function create()
    {
        return view('Departement.create');
    }

    public function store(Request $request)
    {
        $request->validate(['nom' => 'required|string|max:255']);
        Departement::create($request->all());
        return redirect()->route('Departement.index')->with('success', 'Département créé avec succès.');
    }

    public function show($id)
    {
        $departement=Departement::findOrFail($id);
        return view('Departement.show', compact('departement'));
    }

    public function edit($id)
    {
        $departement=Departement::findOrFail($id);
      
        return view("Departement.edit",compact("departement"));
    }

    public function update(Request $request, $id)
    {
        $departement=Departement::findOrFail($id);
        $departement->nom=$request->get('nom');
      
      
        $departement->update();
        return redirect()->route("Departement.index");
    }

    public function destroy($id)
    {
        Departement::find($id)->delete();
        return redirect()->route("Departement.index");
    }
}
