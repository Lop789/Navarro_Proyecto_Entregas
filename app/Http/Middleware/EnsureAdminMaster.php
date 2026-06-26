<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureAdminMaster
{
    public function handle(Request $request, Closure $next): Response
    {
        $admin = Auth::guard('admin')->user();

        if (!$admin || !$admin->esMaster()) {
            abort(403, 'Solo el administrador Master puede realizar esta accion.');
        }

        return $next($request);
    }
}
