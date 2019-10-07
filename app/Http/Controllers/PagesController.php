<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index () {
        $var = Auth::user();
        $var->xd = 'es';
        //dd($var);
        return view('welcome');
    }
    /**
     * Change Sesion language.
     *
     * @param  Request  $request
     * @return Response
     */
    public function lang(Request $request)
    {
        $var = Auth::user();
        $var->language = $request->input('lang');
        dd($var);
    }
}
