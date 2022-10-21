<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CrearCuentaContoller extends Controller
{
    public function crearDatos(Request $request){

        //dd('datos obtenidos');
        $request->validate([
            'name'=>'required|max:30',
            'email'=>'required|unique:users|email|max:60',
            'password'=>'required|confirmed|min:3'
        ]);

        //dd('Usuario creado');
        //Esto es igual que si escribieramos INSERT INTO Usuarios...
        User::create([
               'name' => $request->name,
               'email' => $request->email,
               'password' => Hash::make( $request->password )

        ]);   
        
        
     /*   auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);*/

        //otra forma

        auth()->attempt($request->only('email','password'));
        
        //return redirect()->route('post.index');

        return redirect()->route('post.index')->with('creado','Creado');
       
     }
    
    
    public function mostrarDatos(){
        //dd('acceso');
        return view('crear');
   }
}
