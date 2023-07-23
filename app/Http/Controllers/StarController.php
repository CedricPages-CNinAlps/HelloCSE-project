<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Star;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class StarController extends Controller
{
    // Méthode pour le front-office
    public function index()
    {
        $stars = Star::all();
        return response()->json($stars);
    }

    // Methode d'affichage des données dans le BO
    public function show(Request $request)
    {
        $stars = Star::all();
        $countStars = Star::count();
        return view('nos-stars.manageStars', compact('stars','countStars'));
    }

    public function add(): View
    {
        return view('nos-stars.addStar');
    }

    public function create(Request $request): RedirectResponse
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Récupérer le fichier image depuis le formulaire
        $image = $request->file('image');

        // Télécharger et enregistrer l'image dans le dossier /images/import
        $imagePath = $image->store('import', 'public');

        $newStar = new Star();
        $newStar->firstname = $request->input('firstname');
        $newStar->lastname = $request->input('lastname');
        $newStar->description = $request->input('description');
        $newStar->image = $imagePath; // Enregistrez le chemin de l'image dans la base de données
        $newStar->save();

        return Redirect::to('/nos-stars/manage');
    }

    public function edit($id): View
    {
        $editStar = Star::find($id);
        return view('nos-stars.editStar', compact('editStar'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:8048',
        ]);

        dd($request->all());

        $updateStar = Star::find($id);
        $updateStar->firstname = $request->input('firstname');
        $updateStar->lastname = $request->input('lastname');
        $updateStar->description = $request->input('description');
        $updateStar->image = $request->input('image');
        // Vérifier si une nouvelle image a été soumise dans le formulaire
        if ($request->hasFile('image')) {
            // Récupérer le fichier image depuis le formulaire
            $image = $request->file('image');

            // Supprimer l'ancienne image du dossier /images/import
            Storage::disk('public')->delete($updateStar->image);

            // Télécharger et enregistrer la nouvelle image dans le dossier /images/import
            $imagePath = $image->store('import', 'public');

            // Mettre à jour le chemin de l'image dans la base de données
            $updateStar->image = $imagePath;
        }
        $updateStar->save();

        return Redirect::to('/nos-stars/manage');
    }

    public function destroy($id): RedirectResponse
    {
        $deleteStar = Star::find($id);
        $deleteStar->delete();
        return Redirect::to('/nos-stars/manage');
    }
}
