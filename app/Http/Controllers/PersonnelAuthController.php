<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personnel;

class PersonnelAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Vérifiez si l'utilisateur est un personnel
        $personnel = Personnel::where('email', $request->email)->first();
        
        if ($personnel && $personnel->password === $request->password) {
            auth()->guard('personnel')->login($personnel);
            return redirect()->route('personnel.home');
        }

        return redirect()->back()->withErrors(['message' => 'Identifiants incorrects']);
    }

    public function home()
    {
        return view('personnel.home');
    }
}
