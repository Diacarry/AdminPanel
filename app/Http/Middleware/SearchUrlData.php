<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Cache;

class SearchUrlData
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     * 
     * Este middleware consulta datos de un api externa y los persiste durante X segundos
     */
    public function handle($request, Closure $next)
    {
        /* Examina si es cache existe, de no ser asi lo crea */
        //if (!Cache::has('search')) {
            /*$url = "https://rickandmortyapi.com/api/character/";
            $body = file_get_contents($url);
            $json = json_decode($body);*/
            /*$json = json_decode(file_get_contents('https://rickandmortyapi.com/api/character/'));*/
            //Cache::put('search', $json, 5);/*Create Cache: name, data, seconds*/
            //$value = Cache::store('file')->get('search');/* Found Cache */
            //dd('Cache creado');
        //}
        /*else {
            dd('Chache persiste o no creado');
        }
        dd($value);*/
        return $next($request);
    }
}
