<?php

namespace App\Http\Controllers;

use App;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index () {
        if (Auth::check()) {
            $usr = Auth::user();
            App::setLocale($usr->language);
        }
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
        $usr = Auth::user();
        $user = User::find($usr->email);
        $user->language = $request->input('lang');
        $user->save();
        return redirect('/');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        return response()->json(['status' => 'OK']);
    }
}
