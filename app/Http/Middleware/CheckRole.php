<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next , $role): Response
    {

        // if ($request->user()->role !== $role)
        // {
        //     return response(
        //         "<div style='display: flex; justify-content: center; align-items: center; height: 100vh;'>
        //             <div class=\"error-message\" style='text-align: center;'>
        //                 <p style='font-size: 27px;'>You are not allowed to do this action!</p>
        //             </div>
        //         </div>"
        //     );
        // }
        return $next($request);
    }
}

