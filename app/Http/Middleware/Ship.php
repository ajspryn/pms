<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Ship
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    // protected function redirectTo($request)
    // {
    //     if (!$request->session('ship_uuid')) {
    //         return view('pilih_kapal');
    //     }
    // }
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('ship_uuid')) {
            return $next($request);
        }
        return redirect('/');
    }
}
