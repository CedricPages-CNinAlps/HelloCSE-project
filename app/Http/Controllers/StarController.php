<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Star;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

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
        $newStar = new Star();
        $newStar->firstname = $request->input('firstname');
        $newStar->lastname = $request->input('lastname');
        $newStar->description = $request->input('description');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Récupérer le fichier envoyé par l'utilisateur
            $image = $request->file('image');

            // Générer un nom unique pour l'image (pour éviter les conflits de noms)
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Enregistrer l'image vers le dossier public/images/import
            $image->move('images/import', $imageName);

            // Mettre à jour le champ de l'image dans le modèle
            $newStar->image = '/images/import/' . $imageName;
        }

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
        $updateStar = Star::find($id);
        $updateStar->firstname = $request->input('firstname');
        $updateStar->lastname = $request->input('lastname');
        $updateStar->description = $request->input('description');

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Récupérer le fichier envoyé par l'utilisateur
            $image = $request->file('image');

            // Générer un nom unique pour l'image (pour éviter les conflits de noms)
            $imageName = time() . '_' . $image->getClientOriginalName();

            // Supprimer l'ancienne image du dossier storage
            if ($updateStar->image) {
                File::delete('images/import/' . basename($updateStar->image));
            }

            // Déplacer l'image vers le dossier public/images/import
            $image->move('images/import', $imageName);

            // Mettre à jour le champ de l'image dans le modèle
            $updateStar->image = '/images/import/' . $imageName;
        }

        $updateStar->save();

        return Redirect::to('/nos-stars/manage');
    }

    public function destroy($id): RedirectResponse
    {
        $deleteStar = Star::find($id);
        if ($deleteStar->image) {
            File::delete('images/import/' . basename($deleteStar->image));
        }
        $deleteStar->delete();
        return Redirect::to('/nos-stars/manage');
    }
}
