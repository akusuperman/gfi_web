<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->user() && $request->user()->isAdmin()) {
            return $next($request);
        }

        // Jika bukan supervisor, mungkin akan diredirect ke halaman lain atau memberikan pesan kesalahan
        return redirect()->route('admin/dashboard')->with('error', 'Anda tidak memiliki akses sebagai supervisor.');
    }
}
