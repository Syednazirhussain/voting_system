<?php

namespace App\Http\Middleware;

use Closure;

use Auth;

class AdminAuth
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
        // print_r(Auth::guard('admin')->user());
        // die;
        
        if(Auth::guard('admin')->check())
        {

        

           
           if( Auth::guard('admin')->user()->role == "admin" ) {

            return $next($request);
            
           }
           else {
                $request->session()->flush();
                return redirect()->route('admin.login');
            } 

        } else{

            return redirect()->route('admin.login');
        }



    }
}
