<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Evenement;
use App\Models\Organisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{

    $userId = Auth::id();
//dd( $userId );
    $events = Evenement::where('id_organisateur', $userId)->paginate(5);

    return view('organisateur.Event', compact('events'));

}
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        
    }
 
    public function assignOrganisateur(User $user)
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);
        $user->assignRole('organisateur');

        return redirect()->back()->with('success', 'Role "organisateur" assigned successfully.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
        
}

    /**
     * Display the specified resource.
     */
    public function show(Organisateur $organisateur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Organisateur $organisateur)
    {
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Organisateur $organisateur)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Organisateur $organisateur)
    {
        //
    }

 
}
