<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
    return view('register');
    }
    public function createUser(Request $request)
    {
                
        
       

        $validatedData = $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => [
        'required',
        'string',
        'min:8',
        'regex:/[a-z]/', // doit contenir au moins une lettre minuscule
        'regex:/[A-Z]/', // doit contenir au moins une lettre majuscule
        'regex:/[0-9]/', // doit contenir au moins un chiffre
        'confirmed'],
    
     ],);
        
        // Créez un nouvel utilisateur avec les données de la requête
        $user = new User();
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = Hash::make($validatedData['password']);
        $user->save();
        

        // Redirigez l'utilisateur vers la page de profil ou de connexion
        return view('login');
    }



    public function connectUser(Request $request)
    {
       
       
        $validatedData = $request->validate([
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => [
        'required',
        'string',
        'min:8',
        'regex:/[a-z]/', // doit contenir au moins une lettre minuscule
        'regex:/[A-Z]/', // doit contenir au moins une lettre majuscule
        'regex:/[0-9]/', // doit contenir au moins un chiffre
        ],
        ],);
        $user = array("email" => request("email"),"password" => request('password'));
        if(Auth::attempt($user))
        {
            if(Auth::check())
            {
                $user = Auth::user();
                Session::put('id', $user->id);
                Session::put('email', $user->email);
                Session::put('name', $user->name);
               

                return redirect('/');
               
            }
        }
        else
        {
            return redirect()->back()->with('message', 'Aucun utilisateur ne possède ces coordonnées.Veuillez réessayez');
        }
      
    }
    public function deconnectUser()
    {
        Session::forget('email');
        Session::forget('name');
        Session::forget('id');
        Auth::logout();
        return redirect('/');

        
    }
}
