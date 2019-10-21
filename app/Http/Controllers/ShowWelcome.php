<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShowWelcome extends Controller
{
    /**
     * Handle the incoming request.(Metodo inicial unicamente para visualizar la vista de 'welcome')
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if (Auth::check()) {
            $usr = Auth::user();
            App::setLocale($usr->language);
        }
        return view('welcome');
    }
}
