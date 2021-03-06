<?php

namespace App\Http\Controllers;

use App;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PagesController extends Controller
{
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
}
