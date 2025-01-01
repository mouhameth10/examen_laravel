<?php

namespace App\Http\Controllers;

use App\Models\User; // Assurez-vous que le modèle User est importé
use App\Notifications\ImportantUpdateNotification;
use Illuminate\Http\Request;
use App\Models\Update;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UpdateNotification;
use Illuminate\Support\Facades\Log;
class UpdateController extends Controller
{
    public function notifyStudents()
    {
        $students = User::role('etudiant')->get(); // Récupérer les utilisateurs ayant le rôle 'etudiant'
        $update = 'Votre mise à jour importante ici.';

        foreach ($students as $student) {
            $student->notify(new ImportantUpdateNotification($update));
        }

        return 'Notifications envoyées!';
    }
    public function create()
{
    return view('updates.create');
}

public function store(Request $request)
{
    // Validation des données
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    // Création de la mise à jour
    $update = Update::create($request->only('title', 'description'));

    // Récupérer les étudiants ayant le rôle 'etudiant'
    $students = User::role('etudiant')->get();

    if ($students->isEmpty()) {
        Log::info('Aucun étudiant trouvé pour la notification.');
    } else {
        // Envoyer la notification par e-mail à tous les étudiants
        Notification::send($students, new UpdateNotification($update));
        
        // Notifier les utilisateurs en ajoutant une entrée dans la table pivot
        foreach ($students as $student) {
            $student->updates()->attach($update->id, ['read' => false]);
        }
    }

    return redirect()->route('updates.index')->with('success', 'Mise à jour ajoutée et étudiants notifiés.');
}

public function index()
{
    // Récupérer les mises à jour ordonnées par date de création décroissante
    $updates = Update::orderBy('created_at', 'desc')->get();
    
    // Marquer les mises à jour comme lues pour l'utilisateur connecté
    if (auth()->check()) {
        $user = auth()->user();
        
        // Obtenir les mises à jour non lues
        $unreadUpdates = $user->updates()->where('read', false)->get();

        // Si des mises à jour non lues existent, les marquer comme lues
        if ($unreadUpdates->isNotEmpty()) {
            foreach ($unreadUpdates as $update) {
                $user->updates()->updateExistingPivot($update->id, ['read' => true]);
            }
        }
    }

    return view('updates.index', compact('updates'));
}
}
