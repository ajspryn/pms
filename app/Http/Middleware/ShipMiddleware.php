<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ShipMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // if (!$request->session()->has('ship_uuid')) {
        //     return view('pilih_kapal');
        // }

        // return $next($request);
        if (session()->get('ship_uuid')) {
            return $next($request);
        } else {
            return view('pilih_kapal');
        }
    }
}
