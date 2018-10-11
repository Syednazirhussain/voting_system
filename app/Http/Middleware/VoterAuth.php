<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class VoterAuth
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

        if( Auth::guard( 'voter' )->check() )
         {

           if( Auth::guard( 'voter' )->user()->role == 'user' ) {

            return $next($request);
            
           }else 
            {
                $request->session()->flush();
                return redirect()->route('voter.login');
            }
         

         }else{

            return redirect()->route('voter.login');
         }   
    }
}
