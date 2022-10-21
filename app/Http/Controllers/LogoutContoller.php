<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutContoller extends Controller
{
    public function cerrarsesion(){
        auth()->logout();    


        return redirect()->route('index');
    }
   
}
