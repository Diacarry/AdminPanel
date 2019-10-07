<?php

namespace App\Http\Controllers;

use App;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index () {
        $var = Auth::user();
        App::setLocale($var->language);
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
        $validatedData = $request->validate([
            'lang'    => 'required',
        ]);
        $var = Auth::user();
        $user = User::find($var->email);
        $user->language = $request->input('lang');
        $user->save();
        return redirect('/');
    }
}
