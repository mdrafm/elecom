<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class roleManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(!Auth::check()){
            return redirect()->route('login');
        }

        $authUserRole = Auth::user()->role;

        switch ($role) {
            case 'admin':
                if($authUserRole == 1){
                    return $next($request);
                }
                break;
            case 'vendor':
                if($authUserRole == 2){
                    return $next($request);
                }
                break;
            case 'customer':
                if($authUserRole == 3){
                    return $next($request);
                }
                break;


        }

        switch ($authUserRole) {
            case '1':
                return redirect()->route('admin');
                break;

           case '2':
                return redirect()->route('vendor');
                break;
            case '3':
                return redirect()->route('dashboard');
                break;
        }
        return redirect()->route('login');

    }
}
