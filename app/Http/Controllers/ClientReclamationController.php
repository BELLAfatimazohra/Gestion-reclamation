<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientReclamationController extends Controller
{
    public function index()
    {
        // Logique pour afficher les réclamations
        return view('client.reclamations');
    }

    public function create()
    {
        // Logique pour afficher le formulaire de réclamation
        return view('client.create-reclamation');
    }
}
