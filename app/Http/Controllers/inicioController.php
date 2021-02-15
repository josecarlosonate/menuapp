<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class inicioController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return view('inicio');
    }

    public function menu ()
    {
        return view('menu.index');
    }
    public function show ()
    {
        return view('menu.show');
    }

    public function step (){
        return view('step1');
    }

}
