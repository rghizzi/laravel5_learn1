<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    //
    public function show()
    {
        $persons = ['Roberto Ghizzi','Silvia Merlini','Nonno Nanni'];

        return view('about.show',compact('persons'));
    }

    public function testPaolo($nome)
    {
        return view('test.show', compact('nome'));
    }
}
