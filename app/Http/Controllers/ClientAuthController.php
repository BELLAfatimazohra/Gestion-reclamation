<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientAuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Vérifiez si l'utilisateur est un client
        $client = Client::where('email', $request->email)->first();
        
        if ($client && $client->password === $request->password) {
            auth()->guard('client')->login($client);
            return redirect()->route('client.home');
        }
    
        return redirect()->back()->withInput()->withErrors(['message' => 'Identifiants incorrects']);
    }
    

    public function home()
    {
        return view('client.home');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('client.login');
    }
}
