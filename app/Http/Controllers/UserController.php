<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Afficher la liste des utilisateurs
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Mettre à jour le rôle de l'utilisateur
    public function updateRole(Request $request, User $user)
    {
        $request->validate([
            'role' => 'required|in:admin,etudiant', // Assurez-vous que le rôle est valide
        ]);

        // Retirer tous les rôles existants
        $user->syncRoles([$request->role]);

        return redirect()->route('users.index')->with('success', 'Rôle mis à jour avec succès.');
    }
}