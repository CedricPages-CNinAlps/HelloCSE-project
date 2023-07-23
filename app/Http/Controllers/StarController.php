<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Star;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

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
        $newStar->image = $request->input('image');
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
        $updateStar->image = $request->input('image');
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
