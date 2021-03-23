<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class ApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // RECUPERO IL TOKEN 
        $api_tokern = $request->header('authorization');
        if(empty($api_token)){
            return response()->json([
                'success' => false;
                'error' => 'Utente non autentificato';
            ]);
        }

        // TOGLIAMO LA PARTE BEARER PRIMA CON SUBSTR
        $api_token = substr($api_token,7);

        // CONTROLLO ESEGUITO SU DB PER VEDERE SE QUEL TOKEN E' PRESENTE
        $user = User::where('api_token',$api_token)->first();
        if(!$user){
            return response()->json([
                'success' => false,
                'error' => 'Utente non autentificato'
            ]);
        }

        return $next($request);
    }
}
