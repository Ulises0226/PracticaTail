<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ValidarContoller extends Controller
{
    
    public function obtenerDatos(Request $request){

        //dd('datos obtenidos');
        $request->validate([
           'email' => 'required|email',
           'password' => 'required'
        ]);

      //  $nombre=$request->name;
       // $pass=$request->password;
       // $u="admin";
        //$p="123";

       // if ($u==$nombre && $p==$pass){
         //    return redirect()->route('post.index');
        //}else{
          //  return redirect()->route('index')->with('success','Error de datos');
           //return view('index');
        //}

       // validar datos en la BD
        
       if(!auth()->attempt($request->only('email','password'))){
         return back()->with('mensaje','Error de Datos');
       }
        return redirect()->route('post.index');
       
     }

     
}
